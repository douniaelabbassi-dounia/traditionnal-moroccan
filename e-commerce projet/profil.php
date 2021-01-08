<!DOCTYPE html>
<html>
<head>
	<title>Profil</title>
  <script src="https://kit.fontawesome.com/982530e068.js" crossorigin="anonymous"></script>
	  <link rel ="stylesheet" href="style2.css">
    <meta charset="utf-8">
</head>
<body>
   </div>
	<div class="top-nav-bar">
    <div class="search-box">
    <i class="fa fa-bars" id="menu-btn" onclick="openmenu()"></i>
    <i class="fa fa-times" id="close-btn" onclick="closemenu()"></i>

    <a href="index.php"><img src="LOGO.PNG"  class="logo" ></a>
    
    </div>
    <div class="menu-bar">
    <ul>
    <li> <a href="panier.php" > <i class="fa fa-shopping-basket" ></i>  panier </a> </li>
    <li> <a href="connexion.php" >se connecter </a></li>
    <li> <a href="inscription.php" >s'inscrire </a></li>
        </ul>

    </div>
   </div>


</body>
</html>
<?php
$mysqli = new mysqli("localhost", "root", "", "site");
if ($mysqli->connect_error) die('Un problème est survenu lors de la tentative de connexion à la BDD : ' . $mysqli->connect_error);
$mysqli->set_charset("utf8");
 
//--------- SESSION
session_start();

//--------- CHEMIN
define("RACINE_SITE","/site/");
 
//--------- VARIABLES
$contenu = '';
 function internauteEstConnecte()
{  
	if(!isset($_SESSION['membre'])) 
	{
		return false;
	}
	else
	{
		return true;
	}
}
//----
//--------------------------------- TRAITEMENTS PHP ---------------------------------//

if(!internauteEstConnecte()) 
{
	header("location:connexion.php");
}

$contenu .= '<p class="centre">Bonjour <strong>' . $_SESSION['membre']['pseudo'] . '</strong></p>'; 



$contenu .= '<div class="cadre"><h2> Voici vos informations de profil </h2>';
$contenu .= '<p> votre email est: ' . $_SESSION['membre']['email'] . '<br>';
$contenu .= 'votre ville est: ' . $_SESSION['membre']['ville'] . '<br>';
$contenu .= 'votre cp est: ' . $_SESSION['membre']['code_postal'] . '<br>';
$contenu .= 'votre adresse est: ' . $_SESSION['membre']['adresse'] . '</p></div><br /><br />';


//--------------------------------- AFFICHAGE HTML ---------------------------------//

echo $contenu;
?>
<pre>
	






















</pre>

<div class="footer">
      <div class="partie">
       
         <h2 style ="color : rgb(204,153,0) ;"> Suivez nous : </h2>
      <ul class = "socialmedia">
        <li><i  class="fab fa-instagram" ><a  id ="icones"  target ="blank1" style ="color :   #979a9a  ; ">Traditionnal Moroccan</a> </i></li> <br> <br>
        <li><i   class="fab fa-facebook-f"><a  id ="icones"  target ="blank2"  style ="color :  #979a9a  ; "> Traditionnal Moroccan</a> </i></li> <br> <br>
        <li><i   class="fab fa-tiktok"><a id ="icones" href="https://vm.tiktok.com/ZS9mSTmk/" target ="blank3"  style ="color : #979a9a  ; "> Traditionnal Moroccan</a> </i></li> <br> <br>
        <li><i  class="fas fa-envelope" ><a id ="email"   style ="color : #979a9a  ; "> Traditionnalmorocca@gmail.comn</a> </i></li> <br>
             </ul>
         </div>