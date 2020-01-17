<!DOCTYPE html>
<html>
<head>
	<title>accueil_vote</title> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="w3.css">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<header>
	<?php 
include 'nom_logiciel.php';
include 'nom_departement.php';
include 'identification.php';
include  'choix_critere.php';
$identifi = new Identification;
$crit = new Critere;
 
?>
<div class=" nav-bar  w3-dark-grey">
  <a href="index.php" class="w3-bar-item w3-button w3-mobile w3-green" >Home</a>
  <a href="#" class="w3-bar-item w3-button w3-mobile" >CONTACT</a>
  <a href="#" class="w3-bar-item w3-button w3-mobile ">ABOUT</a>
</div>
</header>
<div class="choix-appreciation">

<?php 
   
    $identifi->connexion();
    if(isset($_POST['password'])) $identifi->setpassword($_POST['password']);
    if(isset($_POST['pass'])) $identifi->setpassword($_POST['pass']);
    $critereCache = isset($_POST['critereCache'])? $_POST['critereCache'] : ''; 
    $visiteur = $identifi->verification($identifi->getpassword());
   /*if(empty($_POST['critereEtudiant']) && empty($_POST['critereEnseignant']) && empty($_POST['critereChef']) && empty($_POST['critereAvoter']))*/
    $identifi->askpassword();
    switch ($visiteur){
    case 'etudiant' :  $crit->critEtudiant($identifi->getpassword(),$critereCache);
       break;
     case 'enseignant': $crit->critEnseignant($identifi->getpassword(),$critereCache);
       break;
       case 'chef':  $crit->critChef($identifi->getpassword(),$critereCache);
       break;
       default:
       break;
    }
    if(isset($_POST['critereEtudiant'])){ echo $_POST['critereEtudiant'];
       include 'vote.php';
       $vote = new Vote;
    $vote->voteEtudiant($identifi->studentLevel[array_search($identifi->getpassword(),$identifi->tabmatricule)],
                        $_POST['pass'], $crit->transformPerformance($_POST['critereEtudiant']),$critereCache);
                                                                             
    }

   
    if(isset($_POST['critereEnseignant'])){
    include 'vote.php';
    $vote = new Vote;
    $vote->voteEncadreur($_POST['pass'],$crit->transformPerformance($_POST['critereEnseignant']),$critereCache);
        }


    if(isset($_POST['critereChef'])){ echo $_POST['critereChef'];
    include 'vote.php';
    $vote = new Vote; 
    $vote->voteEncadreur($_POST['pass'],$crit->transformPerformance($_POST['critereChef']),$critereCache);
    }

    if(isset($_POST['insertion'])) { 
     include 'vote.php';
    $vote = new Vote;
    echo 'valeur du pec sur lequel on veut faire des mises a jours ='.$_POST['critereAvoter'];
    $vote->Insertion($_POST['critereAvoter']);
             }
?>
</div>
</body>
<footer class="w3-container  w3-blue w3-center w3-padding-16">
	@copyright 2017 tout droit reserve	
</footer>
</html>