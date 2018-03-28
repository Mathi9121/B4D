<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../style/style.css"/>
	<link rel="stylesheet" href="../style/menu.css"/>
	<link rel="stylesheet" href="../style/compte.css"/>
	<link rel="stylesheet" href="../style/slider.css"/>
	<link rel="stylesheet" href="../style/liste.css"/>
	<link rel="stylesheet" href="../style/media.css"/>
	<script type="text/javascript" src="../js/script.js"></script>
</head>
<body>
<?php
require("../class/autoloader.class.php");
Autoloader::register();
//include ("header.php");

$bd = new BD();
$bg = new BD_Genre();
$bl = new BD_Langue();
$bulle = new Bulle();
$chapitre = new Chapitre();
$commentaire = new Commentaire();
$forum = new Forum();
$genre = new Genre();
$image = new Image();
$langue = new Langue();
$mail = new Mail();
$modification = new Modification();
$post = new Post();
$traduire = new Traduire();
$tu = new Type_U();
$typeU = new Type_Utilisateur();
$utilisateur = new Utilisateur();
?>
<div id="menu" class="menu">
	<a href="accueil.php" id="logo">B4D</a>
	<a href="accueil.php" id="menuA">Accueil</a>
	<a href="listeBD.php" id="menuLB">Liste BD</a>
	<a href="recherche.php" id="menuR">Recherche</a>
	<a href="connect.php" id="menuC">Connexion</a>
	<?php
	/*if(isset($_SESSION['id'])){
	
	}
	else{
		echo "<a href='connect.php' id='menuMC'>Mon compte</a>";
	}
	*/
	if (isset($lecteur)) { 
		if (isset($dessinateur) || isset($traducteur)) {
			if (isset($administrateur)) { echo "<a href='validationBD.php' id='menuMC'>Mon compte</a>"; }
			else{ echo "<a href='travaux.php' id='menuMC'>Mon compte</a>"; }
		}
		elseif (isset($administrateur)) { echo "<a href='validationBD.php' id='menuMC'>Mon compte</a>"; }
		else{ echo "<a href='suivis.php' id='menuMC'>Mon compte</a>"; }
	}
	else{ echo "<a href='info.php' id='menuMC'>Mon compte</a>"; }
	?>
	<a href="forum.php" id="menuF">Forum</a>
	<a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="menuResponsive()">&#9776;</a>
</div>

