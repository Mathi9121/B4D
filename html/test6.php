<?php
if (isset($_POST['txtAuteur'])) {
	$aut = $_POST['txtAuteur'];
	$req = $utilisateur->getByLogin($aut); //LIKE
	$aut = $req[0]->id_Utilisateur;
	/*for ($i=0; $i < sizeof($req); $i++) { 
		$aut[$i] = $req[$i]->id_Utilisateur;
	}*/
}
else{ $aut = ""; }

if (isset($_POST['txtTitre'])) {
	$tit = $_POST['txtTitre'];
	$req = $bd->getByTitre($tit); //LIKE
	$tit = $req[0]->id_BD;
}
else{ $tit = ""; }

if (isset($_POST['txtTraduc'])) {
	$trad = $_POST['txtTraduc'];
	$req = $utilisateur->getByLogin($trad); //LIKE
	$trad = $req[0]->id_Utilisateur;
}
else{ $trad = ""; }

if (isset($_POST['genre'])) {
	for ($i=0; $i < sizeof($_POST['genre']); $i++) { 
		$gen[$i] = $_POST['genre'];
		$req = $bg->getById($gen[$i], "Genre");
		$gen[$i] = $req[0]->id_BD;
	}
}
else{ $gen = ""; }

if (isset($_POST['note'])) {
	for ($i=0; $i < sizeof($_POST['note']); $i++) { 
		$note[$i] = $_POST['note'];
		$req = $bd->getByNote($note[$i]);
		$note[$i] = $req[0]->note_BD;
	}
}
else{ $note = ""; }

if (isset($_POST['statut'])) {
	$statut = $_POST['statut'];
	$req = $bd->getByDateFin();
	for ($i=0; $i < sizeof($req); $i++) {
		$k=0;
		if ($statut == "termine") {
			if ($req[$i] == NULL) {
				$stat[$k] = $req[$i]->date_Fin_BD;
				$k++;
			}
		}
		else{
			if ($req[$i] != NULL) {
				$stat[$k] = $req[$i]->date_Fin_BD;
				$k++;
			}
		}
		
	}
}
else{ $stat = ""; }

if (isset($_POST['annee'])) {
	for ($i=0; $i < sizeof($_POST['annee']); $i++) { 
		$annee[$i] = $_POST['annee'];
		$req = $bd->getByDateDebut($annee[$i]);
		$annee[$i] = $req[0]->date_Creation_BD;
	}
}
else{ $annee = ""; }

if (isset($_POST['langue'])) {
	for ($i=0; $i < sizeof($_POST['langue']); $i++) { 
		$langue[$i] = $_POST['langue'];
		$req = $bl->getById($langue[$i], "Langue");
		$langue[$i] = $req[0]->id_BD;
	}
}
else{ $langue = ""; }

$requet = "SELECT * FROM BD WHERE id_Utilisateur = ".$aut." AND titre_BD LIKE ".$tit." AND id_BD IN (SELECT id_BD FROM BD_Genre WHERE id_Genre = ".$gen.") AND "


?>