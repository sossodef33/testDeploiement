<?php 

    class Vote{

    
   public  function voteEtudiant( $level,$pass,$critere,$critereCache){

     
    $identifi = new Identification;
    $identifi->connexion();

        echo '<br/>
             <div id="listeEnseignant" class="listeEnseignant">
  	            <form method="POST" action="index.php">';
  	           
    	foreach ($identifi->niveauCours as $key => $code) {
    		# code...
    		if (is_numeric(strpos($code, $level))) {
    			# code...
    			echo '<div class="w3-row w3-padding  nomEnseignant w3-hover-green">
    			       <div class="w3-half">'.$identifi->nomEnseignant[$key].'('.$identifi->gradeEnseignant[$key].'): 
    			       </div> 
    			       <div class="w3-half"> <input class="w3-input w3-animate-input" type="range" name="'.$identifi->nomEnseignant[$key].'" min="0" max="10" step="1"><span class="valeurCritere">
                        0 1 2 3 4 5 6 7 8 9 10</span>
    			         </div>
    			     </div>';
    		}
    	}  
    	  $critereCache=$critereCache.$this->numCritere($critere);
    	  echo   '<input type="hidden" name="pass" value="'.$pass.'">
    	          <input type="hidden" name="critereAvoter" value="'.$critere.'">
    	          <input type="hidden" name="critereCache" value="'.$critereCache.'">
    	         <input type="submit" name="insertion" value="submit">
    	      </form>
  	        </div>';


    }

    //fonction pour encadreurs


  public function voteEncadreur($code,$typeCritere,$critereCache){

     
     
    $identifi = new Identification;
    $identifi->connexion();

     echo '<br/>
            <div id="listeEnseignant" class="listeEnseignant"><div class="w3-row w3-padding  nomEnseignant w3-animate-zoom">
  	            <form method="POST" action="index.php">';
  	           
  	foreach ($identifi->nomEnseignant as $key => $name) {
  		# code...
  		  echo '<div class="w3-row w3-padding  nomEnseignant w3-hover-green">
  		        <div class="w3-half" >'.$name.'('.$identifi->gradeEnseignant[$key].'):</div>
  		        <div class="w3-half "> <input class="w3-input w3-animate-input" type="range" name="'.$name.'" min="0" max="10" step="1"><span class="valeurCritere"> 0 1 2 3 4 5 6 7 8 9 10</span></div>
  		  </div>';
  		 
  	}     $critereCache .= $this->numCritere($typeCritere);
  	      echo  '<input type="hidden" name="pass" value="'.$code.'">
  	            <input type="hidden" name="critereAvoter" value="'.$typeCritere.'">
  	            <input type="hidden" name="critereCache" value="'.$critereCache.'">
  	            <input type="submit" name="insertion" value="submit">
    	      </form>
  	        </div>';
  }

  public function Insertion($critere){

  	$identifi = new Identification;
  	$identifi->connexion();
  	$connexion = new PDO("mysql:host=localhost;dbname=evaluation_db;charset=utf8","root","LaReussite");
  	$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);var_dump($_POST);

    foreach ($_POST as $key => $value) {
    	# code...

    	if( $key!='critereAvoter'&& $key!='pass'&& $key!='insertion' && $key!='critereCache'){ 
    	 $code = $identifi->codeEnseignant[array_search(str_replace('_',' ' ,$key), $identifi->nomEnseignant)];
        $sql = $connexion->prepare("SELECT $critere FROM performance WHERE code ='$code'");
        $sql->execute();
        $result = $sql->fetchAll(PDO::FETCH_ASSOC);
         
         if(count($result) !=0){
        $value = $value + $result[0][$critere];

    	$sql = "UPDATE performance SET $critere = '$value' WHERE code ='$code'";
    	$connexion->exec($sql);
           }
       }
     }

  	$connexion = null;
  }

   public function numCritere($critere){

   	switch ($critere) {
   		case 'pec1': return "01";break;
   		case 'pec2': return "02";break;
   		case 'pec3': return "03";break;
   		case 'pec4': return "04";break;
   		case 'pec5': return "05";break;
   		case 'pec6': return "06";break;
   		case 'pec7': return "07";break;
   		case 'pec8': return "08";break;
   		case 'pec9': return "09";break;
   		case 'pec10': return "10";break;
   		case 'pec11': return "11";break;
   		default:
   			# code...
   			break;
   	}
   }

 }

?>