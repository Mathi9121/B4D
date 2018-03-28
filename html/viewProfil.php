<?php
	$repA = $utilisateur->getById($_SESSION['id']);
	$selT = $tu->getById($repA[0]->id_Utilisateur, "Utilisateur");

	for ($i=0; $i < sizeof($selT); $i++) { 
		if ($selT[$i]->id_Type == 1) {
			$lecteur = "";
		}
		if ($selT[$i]->id_Type == 2) {
			$administrateur = "";
		}
		if ($selT[$i]->id_Type == 3) {
			$dessinateur = "";
		}
		if ($selT[$i]->id_Type == 4) {
			$traducteur = "";
		}
	}
	

	/*Infos perso*/
	if (isset($_POST['info'])) {
		header('Location:info.php');
	}

	/*Validation BD*/
	if (isset($_POST['validationBD'])) {
		header('Location:validationBD.php');
	}

	/*Suivi*/
	if (isset($_POST['suivis'])) {
		header('Location:suivis.php');
	}

	/*Travaux*/
	if (isset($_POST['trav'])) {
		header('Location:travaux.php');
	}

	/*Mail*/
	if (isset($_POST['mail'])) {
		header('Location:mail.php');
	}

	// JS ??
	if (isset($_POST['decnx'])) {
		unset($_SESSION['id']);
		header('Location:connect.php');
		/*?> 
			<div id="decnx" class="detailProfil">
			Merci de votre visite. A bientôt.
			</div>
		<?php*/	
	}
	




?>