<!DOCTYPE html>
<html>
<head>
	<title></title>
	  <link rel ="stylesheet" href="index.css">
	     <script src="https://kit.fontawesome.com/982530e068.js" crossorigin="anonymous"></script>
</head>
<body>

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

//--------- BDD
$mysqli = new mysqli("localhost", "root", "", "site");
if ($mysqli->connect_error) die('Un problème est survenu lors de la tentative de connexion à la BDD : ' . $mysqli->connect_error);
// $mysqli->set_charset("utf8");
 
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
if(isset($_GET['id_produit'])) 	{ $resultat = executeRequete("SELECT * FROM produit WHERE id_produit = '$_GET[id_produit]'"); }
if($resultat->num_rows <= 0) { header("location:boutique.php"); exit(); }

$produit = $resultat->fetch_assoc();
?>
<section class="single-product">
  <div class="conatiner">
    <div class="row">
    <div class="col-md-5">
      <div class="slider">
    <div id="product-slider" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block" src='<?php echo $produit["photo"] ; ?>' />
    </div>
    

    
  </div>
  
</div>
    
    
  </div>
    </div> 

    <div class="col-md-7">
      <p class="new-arrival text-center"> New</p>

      <h2><?php echo $produit["titre"] ; ?></h2>
      <i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<i class="fa fa-star"></i>
<?php if($produit['stock'] > 0)
{?>
<form method="post" action="panier.php">
  <input type='hidden' name='id_produit' value='$produit["id_produit"]'>
<p> <b>Categorie : </b><?php echo $produit["categorie"] ; ?> </p>
<p class="price">  <b> Prix : </b> <?php echo $produit["prix"] ; ?> MAD</p>
<p> <b> Couleur : </b> <?php echo $produit["couleur"] ; ?> </p>
<p> <b> Taille : </b> <?php echo $produit["taille"] ; ?> </p>
<p> <b> Couleur : </b> <?php echo $produit["couleur"] ; ?> </p>
<p> <b> disponibilité : </b> <?php echo $produit["stock"]; ?> </p>

<p> <b> brand : </b> Morroco </p>
 
<b><label for="quantite">Quantité : </label></b>
<select id="quantite" name="quantite">
     <?php for($i = 1; $i <= $produit['stock'] && $i <= 5; $i++)
      {
        ?><option><?php echo $i ; ?></option>";
      <?php } ?> 
    </select> <br>


 


<input type="submit" name="ajout_panier" value=" Ajouter au panier" class="btn-primary"  />
 
</form>
<?php } ?>


    </div>
    </div>
  </div>
</section>
<hr>

<!-- decription du produit -->
<section class="product-decription">
  <div class="container">
    <h6> Description du produit</h6> <p>
    <?php echo $produit["description"] ; ?></p>
    <hr> 
  </div>

<pre>
	









</pre>
<div class="footer">
      <div class="partie">
       
         <h2 style ="color : rgb(204,153,0) ;"> Suivez nous : </h2>
      <ul class = "socialmedia">
        <li><i  class="fab fa-instagram" ><a  id ="icones"  target ="blank1" style ="color :   #979a9a  ; "> </a> </i></li> <br> <br>
        <li><i   class="fab fa-facebook-f"><a  id ="icones"  target ="blank2"  style ="color :  #979a9a  ; "> </a> </i></li> <br> <br>
        <li><i   class="fab fa-tiktok"><a id ="icones" href="https://vm.tiktok.com/ZS9mSTmk/" target ="blank3"  style ="color : #979a9a  ; "> </a> </i></li> <br> <br>
        <li><i  class="fas fa-envelope" ><a id ="email"   style ="color : #979a9a  ; "> </a> </i></li> <br>
             </ul>
         </div>
       </div>

