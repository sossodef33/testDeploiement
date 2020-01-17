<?php 
class Identification{

	private $server="localhost";
	private $login="root";
	private $pass="LaReussite";

    private $nomchef = array();
	private $codechef = array();
	
	
	public $codeEnseignant = array();
	public $nomEnseignant = array();
	public $gradeEnseignant = array();
	public $niveauCours = array();	
	
	public $tabmatricule = array();
	public $nomEtudiant = array();
	public $studentLevel = array();

    private $password;
    private $peuVoter = array();


	public function connexion(){

		$connexion = new PDO("mysql:host=$this->server;dbname=evaluation_db",$this->login,$this->pass);
		$connexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//preparation des requetes selectrices de code et matricule pour la comparaison ulterieure avec $_POST['password']

		$sql1= $connexion->prepare("SELECT nomchef,codechef FROM departement");
        $sql2 = $connexion->prepare("SELECT code,nom,grade,niveaux FROM enseignant");
        $sql3 = $connexion->prepare("SELECT matricule,nom,niveau FROM etudiant");
        $sql4 = $connexion->prepare("SELECT code FROM enseignant WHERE avote=0");
        $sql5 = $connexion->prepare("SELECT matricule FROM etudiant WHERE avote=0");

  //excution des requetes

		$sql1->execute();
		$sql2->execute();
		$sql3->execute();
		$sql4->execute();
		$sql5->execute();

 //copie des valeurs de requetes dans les tableaux sur les lesquels on fera la recherche de $_POST['password']
		$i=0;

		//1-tableau de codes des chefs de departement
          
		$res1= $sql1->fetchAll(PDO::FETCH_ASSOC); 
        // print_r($res1);echo '<br/>';
		foreach ($res1 as $value) {
		       foreach ($value as $key => $valeur) {
		       	# code...
		       	switch ($key) {
		       		case 'nomchef': $this->nomchef[$i] = $valeur;
		       			# code...
		       			break;
		       	    case 'codechef': $this->codechef[$i] = $valeur;
		       		
		       		default: 
		       			# code...
		       			break;
		       	}
		       	 
		       }
		    $i +=1;
		}
          // print_r($this->codechef);
          // echo '<br/><br/>';

		//2-tableaux de donnees sur les enseignants

         $res2= $sql2->fetchAll(PDO::FETCH_ASSOC);
       // print_r($res2);echo '<br/>';
        $i =0;
		foreach ($res2 as $value) {
		    foreach ($value as $key => $valeur) {

		    	switch ($key) {
		    		case 'code': $this->codeEnseignant[$i] = $valeur;
		    			break;
		    	    case 'nom': $this->nomEnseignant[$i] = $valeur;
		    			break;
		    		
		    		case 'grade': $this->gradeEnseignant[$i] = $valeur;
		    			break;
		    		case 'niveaux': $this->niveauCours[$i] = $valeur;
		    			break;
		    		
		    		default:
		    			# code...
		    			break;
		    	}
		    	
		    	
		    }	
			$i+=1;
		}
      /* echo '<br/><br/> code enseignant';
       print_r($this->codeEnseignant);
       echo '<br/><br/> nom denseignants';
       print_r($this->nomEnseignant);
       echo '<br/><br/> grade des enseignants';
       print_r($this->gradeEnseignant);
       echo '<br/><br/> niveau de cours';
       print_r($this->niveauCours);
        echo '<br/><br/>';*/
       
		//3-tableau des matricules d'etudiants

         $res3= $sql3->fetchAll(PDO::FETCH_ASSOC);
       // print_r($res3);echo '<br/>';
        $i =0;
		foreach ($res3 as $value) {
		    foreach ($value as $key => $valeur) {
		    	switch ($key) {
		    		case 'matricule': $this->tabmatricule[$i] = $valeur;
		    			break;
		    	    case 'nom': $this->nomEtudiant[$i] = $valeur;
		    			break;
		    		case 'prenom': $this->prenomEtudiant[$i] = $valeur;
		    			break;
		    		case 'niveau': $this->studentLevel[$i] = $valeur;
		    			break;
		    		
		    		default:
		    			# code...
		    			break;
		    	}
		    	
		    	
		    }
			$i +=1;
		}
        //  print_r($this->tabmatricule);
        $res4 = $sql4->fetchAll(PDO::FETCH_ASSOC);
        $res5 = $sql5->fetchAll(PDO::FETCH_ASSOC);
         $i=0;
        foreach ($res4 as $key => $value){
        	# code...
            $enseignantElecteur[$i] = $value['code'];
            $i++;
        }
        $i=0;
        foreach ($res5 as $key => $value){
        	# code...
            $etudiantElecteur[$i] = $value['matricule'];
            $i++;
        }
        $this->peuVoter =array_replace($this->peuVoter, array_merge($enseignantElecteur,$etudiantElecteur));
	$connexion = null;	 
	}


   	public function askpassword(){
     
    if($this->verification($this->getpassword())){
     echo ' 
            <div class = "nomvotant w3-panel w3-pale-green w3-leftbar w3-border-green w3-animate-zoom" id="nomvotant" >PARTICIPANT:' .$this->getNomParticipant().' </i></div><br/>';
              // $this->redirection($this->password);
                }
    else{

       	if( isset($_POST['password']) && !($this->verification($this->getpassword()))){
       echo '<div class="error w3-animate-zoom" ><img src="images/error1.jpg" width="50px">ATTENTION...<br/>Le code saisi n\'est pas  valide! veuillez saisir votre code ou alors vous avez deja voté</div>'; }
       echo '<div class="formulaireIdentification " id="formulaireIdentification">
             <div class="logo w3-spin"><img src="images/logo1.png" width="250px" height="300px"> </div>
             <div class="profil "> <img class= "w3-circle" src="images/profil.jpg" width="200px" height="190px">
   		  <form class="w3-container" method="POST" action="index.php">
   		  <input type="password" name="password" class="password w3-light-grey" id="password" placeholder="password" required><br/>
   		  <input type="submit" value="submit" class="w3-btn w3-hover-green w3-round w3-orange">
   		  </form>
   		  </div>
   		  </div>';

   		}
   	}

    public function getNomParticipant(){
    	switch ($this->verification($this->getpassword())) {
    		case 'etudiant': $participant =  $this->nomEtudiant[array_search($this->getpassword(), $this->tabmatricule)].'<br/>(etudiant: niveau '.$this->studentLevel[array_search($this->getpassword(), $this->tabmatricule)].' )';
    			# code...
    			break;
            case 'enseignant' : $participant = $this->nomEnseignant[array_search($this->getpassword(), $this->codeEnseignant)].'<br/>('.$this->gradeEnseignant[array_search($this->getpassword(), $this->codeEnseignant)].')';
                 break;
            case 'chef' : $participant = $this->nomchef[array_search($this->getpassword(), $this->codechef)].' <br/>(chef de departement)';
                 break;         		
    		default:   return 'NON IDENTIFIE';
    			# code...
    			break;
    	}

    	return $participant;
    }

   	public function getpassword(){
   		if (isset($_POST['password'])) 
   			 $this->password =strtoupper($_POST['password']); 
   		return $this->password;
   	}


   	public function setpassword($pass){
   		$this->password = $pass;
   	}



	public function verification($pass){

      
	  if(in_array($pass, $this->tabmatricule) && in_array($pass, $this->peuVoter)){ 
       
   	  //echo 'matricule valide tu est un etudiant';  
	  return 'etudiant';}
	  if(in_array($pass, $this->codeEnseignant) && in_array($pass, $this->peuVoter)){ //echo 'code valide tu est un enseignant'; 
	  return 'enseignant';}
	  if(in_array($pass, $this->codechef)){ //echo 'code valide tu est un chef de departement'; 
	  return 'chef';}
      return false;
	}

	
	}

	/*$ident = new Identification;
	$ident->connexion();
    $ident->redirection();*/
?>