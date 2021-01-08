<html>
  <head>
  	<title>E-commerce website  </title>
  	<meta charset="utf-8">
  	<meta name = "description " content = " à discuter après .......">
  	<meta name = "keywords " content = "(traditionnel , amazigh , bijoux , babouches , maroc , tradition , tapis traditionnel, site , e-commerce , website , maquillage , naturel ">
  	<link rel ="stylesheet" href="index.css"> 
    <meta charset="utf-8">
    <script src="https://kit.fontawesome.com/982530e068.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link  rel ="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
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
   <section class="header">
   	<div class="side-menu" id="side-menu"> 
   		
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
//--------------------------------- TRAITEMENTS PHP ---------------------------------//
//--- AFFICHAGE DES CATEGORIES ---//
$categories_des_produits = executeRequete("SELECT DISTINCT categorie FROM produit");
$contenu .= '<div class="boutique-gauche">';
$contenu .= "<ul>";
while($cat = $categories_des_produits->fetch_assoc())
{
  $contenu .= "<li><a href='?categorie="  . $cat['categorie'] . "'>" . $cat['categorie'] . "</a></li>";
}
$contenu .= "</ul>";
$contenu .= "</div>";
//--- AFFICHAGE DES PRODUITS ---//
$a = '<div class="boutique-droite">';
if(isset($_GET['categorie']))
{
  $donnees = executeRequete("SELECT id_produit,reference,titre,photo,prix FROM produit WHERE categorie='$_GET[categorie]'");  
  while($produit = $donnees->fetch_assoc())
  {
    $a .= '<div class="boutique-produit">';
    $a .= "<h3>$produit[titre]</h3>";
    $a .= "<a href=\"fiche_produit.php?id_produit=$produit[id_produit]\"><img src=\"$produit[photo]\" width=\"130\" height=\"100\" /></a>";
    $a .= "<p>$produit[prix] MAD</p>";
    $a .= '<a href="product.php?id_produit=' . $produit['id_produit'] . '">Détail de l\'article</a>';
    $a .= '</div>';
  }
}
$a .= '</div>';
//--------------------------------- AFFICHAGE HTML ---------------------------------//

echo $contenu;
?>


   	</div>
     
     <div class="slider">
    <div id="slider" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="aa.jpg" >
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="1.jpg" >
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="2.jpg">
    </div>
  </div>
  <ol class="carousel-indicators">
    <li data-target="#slider" data-slide-to="0" class="active"></li>
    <li data-target="#slider" data-slide-to="1"></li>
    <li data-target="#slider" data-slide-to="2"></li>
  </ol>
</div>
    
    
  </div>


</div>
     </div>  <br>
     <br><br><br><br>


   </section>
   <div class="produits" >
   
   <?php echo $a ; ?>
 </div>
<!-----------------------Footer--------------->
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
       </div>


 <!-- 66666666666666 -->
<script> 
   	function openmenu(){
   		document.getElemntById("side-menu").style.display="block" ;
   		document.getElemntById("menu-btn").style.display="none" ;
   		document.getElemntById("close-btn").style.display="block" ;
   	}
   	function closemenu(){
   		document.getElemntById("side-menu").style.display="none" ;
   		document.getElemntById("menu-btn").style.display="block" ;
   		document.getElemntById("close-btn").style.display="none" ;
   	}
   	
   	
   </script>





   		
   	
   	</body>
</html>