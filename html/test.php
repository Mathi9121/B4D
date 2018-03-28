<?php



//$liste = "SELECT DISTINCT BD.id_BD, titre_BD, couverture_BD, pseudo_Utilisateur FROM BD, Utilisateur WHERE BD.id_Utilisateur = Utilisateur.id_Utilisateur AND titre_BD LIKE '".$abc."%' ORDER BY titre_BD;";

/*$BD = new BD();
$user = new Utilisateur();
$b = $BD->getListAlpha("%");

for ($i=0; $i < sizeof($b); $i++) {
			echo $b[$i]->couverture_BD;
			echo $b[$i]->titre_BD;
}*/

include ("menu.php");

/*$genre = "SELECT * FROM Genre";
$bdd = new connexion();
$repG = $bdd->query($genre);
$annee = "SELECT * FROM BD";
$repA = $bdd->query($annee);

$langue = "SELECT * FROM Langue";
$repL = $bdd->query($langue);*/

$repG = $genre->getList();
$repA = $bd->getList();
$repL = $langue->getList();

if(isset($_POST["cmdRechercher"])){
	if (isset($_POST['genre'])) {
		$repg = $genre->getById((int)$_POST['genre']);
		$cat = $repg[0]->libelle_Genre;
	}
	else{ $cat = '%'; }
	$stat = (isset($_POST["statut"])) ? $_POST["statut"] : "%";
	$aut = (!empty($_POST["txtAuteur"])) ? $_POST["txtAuteur"] : "%";
	$tit = (isset($_POST["txtTitre"])) ? $_POST["txtTitre"] : "%";
	if (isset($_POST['annee'])) {
		$a = "SELECT date_Fin_BD, date_Creation_BD FROM BD WHERE id_BD = ".$_POST['annee'].";";
		$repa = $bdd->query($a);
		$ann = $repa[0]->date_Fin_BD;
	}
	else{ $ann = '%'; }
	if (isset($_POST['langue'])) {
		$l = "SELECT libelle_Langue FROM Langue WHERE id_Langue = ".$_POST['langue'].";";
		$repl = $bdd->query($l);
		$lang = $repl[0]->libelle_Langue;
	}
	else{ $lang = '%'; }

	//Par titre
	$rech = $bd->getByTitre($tit);
	for ($i=0; $i < sizeof($rech); $i++) {
		echo $rech[$i]->titre_BD;
	}

	//Par auteur
	$sel = $utilisateur->getByLogin($aut);
	//var_dump((int)$sel[0]->id_Utilisateur);
	for ($i=0; $i < sizeof($rech); $i++) { 
		for ($j=0; $j < sizeof($sel); $j++) { 
			$idU = $bd->getByUtilisateur((int)$sel[$j]->id_Utilisateur);
			var_dump($idU);
			//echo $idU[$i]->titre_BD;
		}
	}
	//var_dump($idU);
	//Par catégorie
	//$sel = $bg->getByBdEtGenre();
	/*for ($i=0; $i < sizeof(); $i++) { 
		# code...
	}*/
	
	/*$rech = "SELECT DISTINCT BD.id_BD, couverture_BD, titre_BD, pseudo_Utilisateur FROM BD, Utilisateur WHERE BD.id_Utilisateur = Utilisateur.id_Utilisateur  libelle_Genre LIKE '%".$cat."%' AND pseudo_Utilisateur LIKE '%".$aut."%' AND titre_BD LIKE '%".$tit."%' AND libelle_Langue LIKE '%".$lang."%'";*/

	//$rech = $bd->getByUtilisateurEtTitre($aut, $tit); //recupere les BDs selon auteur et titre
	//recuperer les genres selon l'id des BD de $rech
	/*for ($i=0; $i < sizeof($rech); $i++) {
		//$rechBG = $bg->getById((int)$rech[$i]->id_BD, "BD"); //recupere id_bd et id_genre de chaque bdd
		//SELECT * FROM BD_Genre WHERE id_BD = (int)$rech[$i]->id_BD AND id_Genre = $cat;
		$sel[$i] = $bg->getByBdEtGenre((int)$rech[$i]->id_BD, (int)$cat); //$sel recupere les bd_genre d'une certaine cat
		//obtenir les bd ou lid genre = $cat
		//echo $sel[0]->id_Genre;
		
		var_dump($sel[$i]);
	}
	for ($i=0; $i < sizeof($sel); $i++) { 
			//$rech = $bd->getById($sel[0]->id_BD); //obtient les bd en fct du genre
	}*/
	
	//$rech = "SELECT DISTINCT BD.id_BD, couverture_BD, titre_BD, pseudo_Utilisateur FROM BD, Utilisateur WHERE BD.id_Utilisateur = Utilisateur.id_Utilisateur  AND pseudo_Utilisateur LIKE '%".$aut."%' AND titre_BD LIKE '%".$tit."%'";
	//$repR = $bdd->query($rech);
}
?>

<div id="recherche">
	<h1>Recherche avancée</h1>
	<form method="post" action="test.php">
		<div id="rechGauche">
			<label>Auteur</label>
			<input type="text" name="txtAuteur"><br />
			<label>Titre</label>
			<input type="text" name="txtTitre"><br />
			<label>Catégorie</label>
			<select name="genre">
				<option disabled selected>Choisir une genre</option>
				<?php
					for ($i=0; $i < sizeof($repG); $i++) { 
						echo ("<option value=".$repG[$i]->id_Genre.">".$repG[$i]->libelle_Genre."</option>");
					}
				?>
			</select>
			<label>Note</label><br>
			<label class="container">1
			  <input type="checkbox" name="note[]" value="1" class="">
			</label>
			<label class="container">2
			  <input type="checkbox" name="note[]" value="2">
			</label>
			<label class="container">3
			  <input type="checkbox" name="note[]" value="3">
			</label>
			<label class="container">4
			  <input type="checkbox" name="note[]" value="4">
			</label>
			<label class="container">5
			  <input type="checkbox" name="note[]" value="5">
			</label>
		</div>
		<div id="rechDroite">
			<label>Statut</label><br>
			<label class="container">Terminé
			  <input type="radio" name="statut" value="termine">
			</label>
			<label class="container">En cours
			  <input type="radio" name="statut" value="enCours">
			</label>
			<br />
			<label>Année</label>
			<select name="annee">
				<option disabled selected>Choisir une année</option>
				<?php
					for ($i=0; $i < sizeof($repA); $i++) {
						if(isset($repA[$i]->date_Fin_BD)){
							echo ("<option value=".$repA[$i]->id_BD.">".$repA[$i]->date_Fin_BD."</option>");
						}
						else{
							echo ("<option value=".$repA[$i]->id_BD.">".$repA[$i]->date_Creation_BD."</option>");
						}
					}
				?>
			</select>
			<label>Langue</label>
			<select name="langue">
				<option disabled selected>Choisir une langue</option>
				<?php
					for ($i=0; $i < sizeof($repL); $i++) { 
						echo ("<option value=".$repL[$i]->id_Langue.">".$repL[$i]->libelle_Langue."</option>");
					}
				?>
			</select><br>
			<label>Traducteur</label>
			<input type="text" name="txtTraducteur">
		</div>
		<input type="submit" name="cmdRechercher" value="Rechercher">
	</form>
</div>

<?php

/*$user = new Utilisateur();
$bd = new BD();
$lst = $bd->getListMois();

for ($i=0; $i < sizeof($lst); $i++) {
	echo $lst[$i]->couverture_BD. " ";
	echo $lst[$i]->titre_BD;
	$ps = $user->getById((int)$lst[$i]->id_Utilisateur);
	echo $ps[0]->pseudo_Utilisateur."<br>";
}


$listeCat = "SELECT libelle_Genre FROM Genre, BD_Genre WHERE Genre.id_Genre = BD_Genre.id_Genre AND id_BD = ".$repListe[$i]->id_BD.";";
$genre = new Genre();
$bdG = new BD_Genre();

$idG = $bdG->getById($repListe[$i]->id_BD, "BD");
for ($i=0; $i < sizeof($idG); $i++) { 
	$p = $genre->getById($idG[$i]->id_Genre);
	echo $p[]->libelle_Genre;
}

//$listeLang = "SELECT libelle_Langue FROM Langue, BD_Langue WHERE Langue.id_Langue = BD_Langue.id_Langue AND id_BD = ".$repListe[$i]->id_BD.";";
//				$repListeLang = $bdd->query($listeLang);

$langue = new Langue();
$op = $langue->getById(1);
for ($i=0; $i < sizeof($op); $i++) { 
	echo $op[$i]->libelle_Langue;
}

$bl = new BD_Langue();
$pant = $bl->getById(1,"BD");
for ($i=0; $i < sizeof($pant); $i++) { 
	echo $pant[$i]->id_Langue;
}*/
/*$idL = $bl->getById((int)$repListe[$i]->id_BD, "BD");
for ($j=0; $j < sizeof($idL); $j++) { 
	$p = $langue->getById((int)$idL[$j]->id_Langue);
	echo $p[$j]->libelle_Langue;
}*/
//$u->ajouter("test1", "test1", "test@test.com");
//$u->supprimer(7);
//$u->maj("test2", "test2", "", 5, 6);
/*$s = $u->getList();
for ($i=0; $i < sizeof($s); $i++) { 
	echo $s[$i]->pseudo_Utilisateur." ";
}

if (1 == 1) 
	echo "Peace out";


echo "string";*/


?>