<?php 

   class Critere{
    

    	public function transformPerformance($performance){

            switch ($performance) {
                case 'research productivity and publication': return 'pec1';
                    break;
                case 'proficiency in teaching': return 'pec2';
                    break;
                case 'supervision and creativity': return 'pec3';
                    break;
                case 'students satisfaction and performance': return 'pec4';
                    break;
                case 'head of department satisfaction': return 'pec5';
                    break;
                case 'ponctuality and responsibilities': return 'pec6';
                    break;
                case 'academic awards and achievements': return 'pec7';
                    break;
                case 'colleagues opinion': return 'pec8';
                    break;
                case 'professional ethics': return 'pec9';
                    break;
                case 'opportunities for professional development': return 'pec10';
                    break;
                case 'contribution to institutional development': return 'pec11';
                    break;
                
                default:
                    # code...
                    break;
            }
        }

//generation des pecs de vote pour les etudiants
     
    public function critEtudiant($mat,$critereCache){

        $critereMasque = str_split($critereCache , 2); 

      	  echo '
              	<div id="critere" class="critere ">
                <form method="POST" action="index.php">';
                   if (!in_array("02", $critereMasque)) {
                     echo '  
                     <div class="w3-row w3-section"> 
                        <input class="w3-input w3-round-xxlarge w3-hover-green w3-animate-top" type="submit" name="critereEtudiant" value="proficiency in teaching">
                     </div>';
                    }
                     if (!in_array("03", $critereMasque)) {
                     echo '  
                      <div class="w3-row w3-section"> 
                        <input class="w3-input w3-round-xxlarge w3-hover-green w3-animate-left" type="submit" name="critereEtudiant" value="supervision and creativity">
                     </div>';
                    }  
                     if (!in_array("04", $critereMasque)) {
                     echo '  
                      <div class="w3-row w3-section"> 
                        <input class="w3-input w3-round-xxlarge w3-hover-green w3-animate-zoom" type="submit" name="critereEtudiant" value="students satisfaction and performance">
                     </div>';
                    }
                     if (!in_array("06", $critereMasque)) {
                     echo '  
                      <div class="w3-row w3-section"> 
                        <input class="w3-input w3-round-xxlarge w3-hover-green w3-animate-right" type="submit" name="critereEtudiant" value="ponctuality and responsibilities">
                     </div>';
                    }
                     if (!in_array("09", $critereMasque)) {
                     echo '  
                      <div class="w3-row w3-section"> 
                        <input class="w3-input w3-round-xxlarge w3-hover-green w3-animate-bottom" type="submit" name="critereEtudiant" value="professional ethics">
                     </div>';
                    }
                     echo ' 
                      <input type="hidden" name="pass" value="'.$mat.'">
                      <input type="hidden" name="critereCache" value="'.$critereCache.'">
         	        </form>
                </div>';

         }

        
//generation des pecs de vote pour les enseignants
         public function critEnseignant($code,$critereCache){
            $critereMasque = str_split($critereCache,2);
          echo  '
                 <div id="critere" class="critere"> 
                 <form method="POST" action="index.php">';
                  if (!in_array('01', $critereMasque)) {
                     echo '  
                      <div class="w3-row w3-section"> 
                        <input class="w3-input w3-round-xxlarge w3-hover-green w3-animate-bottom" type="submit" name="critereEnseignant" value="research productivity and publication">
                     </div>';
                    }
                          if (!in_array('03', $critereMasque)) {
                     echo '  
                     <div class="w3-row w3-section"> 
                        <input class="w3-input w3-round-xxlarge w3-hover-green w3-animate-bottom" type="submit" name="critereEnseignant" value="supervision and creativity">
                     </div>';
                    }
                          if (!in_array('08', $critereMasque)) {
                     echo '  
                     <div class="w3-row w3-section"> 
                        <input class="w3-input w3-round-xxlarge w3-hover-green w3-animate-bottom" type="submit" name="critereEnseignant" value="colleagues opinion">
                     </div>';
                    }
                          if (!in_array('09', $critereMasque)) {
                     echo '  
                     <div class="w3-row w3-section"> 
                        <input class="w3-input w3-round-xxlarge w3-hover-green w3-animate-bottom" type="submit" name="critereEnseignant" value="professional ethics">
                     </div>';
                    }
                      if (!in_array('11', $critereMasque)) {
                     echo '  
                     <div class="w3-row w3-section"> 
                        <input class="w3-input w3-round-xxlarge w3-hover-green w3-animate-bottom" type="submit" name="critereEnseignant" value="contribution to institutional development">
                     </div>';
                    } 
                     echo '
                      <input type="hidden" name="pass" value="'.$code.'">
                      <input type="hidden" name="critereCache" value="'.$critereCache.'">
         	        </form>
                </div>';

                
         }

//generation des pecs de vote pour le chef de departement

         public function critChef($code,$critereCache){
         	$critereMasque = str_split($critereCache,2);
          echo '
             <div id="critere" class="critere">
             <form method="POST" action="index.php">';
                      
                    if (!in_array('05', $critereMasque)) {
                     echo '  
                     <div class="w3-row w3-section"> 
                        <input class="w3-input w3-round-xxlarge w3-hover-green w3-animate-bottom" type="submit" name="critereChef" value="head of department satisfaction">
                     </div>';
                    }
                    if (!in_array('07', $critereMasque)) {
                     echo '  
                     <div class="w3-row w3-section"> 
                        <input class="w3-input w3-round-xxlarge w3-hover-green w3-animate-bottom" type="submit" name="critereChef" value="academic awards and achievements">
                     </div>';
                    }
                    if (!in_array('10', $critereMasque)) {
                     echo '    
                     <div class="w3-row w3-section"> 
                        <input class="w3-input w3-round-xxlarge w3-hover-green w3-animate-bottom" type="submit" name="critereChef" value="opportunities for professional development">
                     </div>';
                    }
                   if (!in_array('11', $critereMasque)) {
                     echo '  
                     <div class="w3-row w3-section"> 
                        <input class="w3-input w3-round-xxlarge w3-hover-green w3-animate-bottom" type="submit" name="critereChef" value="contribution to institutional development">
                     </div>';
                    }
                     echo '
                      <input type="hidden" name="pass" value="'.$code.'">
                      <input type="hidden" name="critereCache" value="'.$critereCache.'">
         	        </form>
               </div>';
   }

  

}

?>