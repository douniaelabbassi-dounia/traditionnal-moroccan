
<?php

//--------- BDD
$mysqli = new mysqli("localhost", "root", "", "site");
if ($mysqli->connect_error) die('Un problème est survenu lors de la tentative de connexion à la BDD : ' . $mysqli->connect_error);
 $mysqli->set_charset("utf8");
 
//--------- SESSION
session_start();

//--------- CHEMIN
define("RACINE_SITE","/site/");
 
//--------- VARIABLES
$contenu = '';

function executeRequete($req)
{
    global $mysqli; 
    $resultat = $mysqli->query($req); 
    if (!$resultat)
    {
        die("Erreur sur la requete sql.<br />Message : " . $mysqli->error . "<br />Code: " . $req);
    }
    return $resultat;
}
// //------------------------------------

//--------------------------------- TRAITEMENTS PHP ---------------------------------//
if(isset($_GET['action']) && $_GET['action'] == "deconnexion") 
{
	session_destroy(); 
}
if(internauteEstConnecte()) 
{
	header("location:profil.php");
}
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
if($_POST)
{
    $resultat = executeRequete("SELECT * FROM membre WHERE pseudo='$_POST[pseudo]'");
    if($resultat->num_rows != 0)
    {
        $membre = $resultat->fetch_assoc();
        if($membre['mdp'] == $_POST['mdp'])
        {
            foreach($membre as $indice => $element)
            {
                if($indice != 'mdp')
                {
                    $_SESSION['membre'][$indice] = $element; 
                }
            }
            header("location:profil.php"); 
        }
        else
        {
            $contenu .= '<div class="erreur">Erreur de MDP</div>';
        }       
    }
    else
    {
        $contenu .= '<div class="erreur">Erreur de pseudo</div>';
    }
}
//--------------------------------- AFFICHAGE HTML ---------------------------------//
?>
<?php echo $contenu; ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel ="stylesheet" href="style2.css">
        <script src="https://kit.fontawesome.com/982530e068.js" crossorigin="anonymous"></script>
</head>
<body>
   <div class="top-nav-bar">
    <div class="search-box">
        <i class="fa fa-bars" id="menu-btn" onclick="openmenu()"></i>
        <i class="fa fa-times" id="close-btn" onclick="closemenu()"></i>

   <a href="index.php"> <img src="LOGO.PNG"  class="logo" ></a>
    </div>
    <div class="menu-bar">
        <ul>
            <li> <a href="panier.php" > <i class="fa fa-shopping-basket" ></i>  panier </a> </li>
            <li> <a href="connexion.php" >se connecter </a></li>
            <li> <a href="inscription.php" >s'inscrire </a></li>
        </ul>

    </div>
   </div>

    <div id="container">
    <h1>Connexion</h1>
 
<form method="post" action="">
    <label for="pseudo">Pseudo</label><br />
    <input type="text" id="pseudo" name="pseudo" /><br /> <br />
         
    <label for="mdp">Mot de passe</label><br />
    <input type="text" id="mdp" name="mdp" /><br /><br />
 
     <input type="submit" value="Se connecter"/>
</form>
</div>
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
 

</body>
</html>

