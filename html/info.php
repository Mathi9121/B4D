<?php
session_start();
include ("menu.php");


if (isset($_SESSION['id'])) {
	include ("viewProfil.php");
	
	/*Infos perso*/
	$dess = ""; $trad = "";
	for ($i=0; $i < sizeof($selT); $i++) {
		if ($selT[$i]->id_Type==3) { $dess = "checked = 'checked'"; }
		if ($selT[$i]->id_Type==4) { $trad = "checked = 'checked'"; }		
	}
	
	if (isset($_POST['Enregistrer'])) {
		if ($repA[0]->mdp_Utilisateur == $_POST['txtMdpActuel']) {
			if ($_POST['txtNvMdp'] == $_POST['txtNvMdp2']) {
				$repU = $utilisateur->maj($_POST['txtLogin'], $_POST['txtNvMdp'], $_POST['txtMail'], NULL, $_SESSION['id']);
			}
		}
	}

	if (isset($_POST['ajoutBD'])) {
		header('Location:creationBD.php');
	}
}
else{
	header('Location: connect.php');
}
?>

<div id="info" class="divPrincipale">
	<form method="post" action="info.php">
		<?php include("viewSecondMenu.php") ?>

		<div class="detailProfil" id="infoPerso">
				<input type="submit" name="ajoutBD" value="Ajouter une BD"><br>
				<label for="txtLogin" class="labelCheck">Login</label>
				<input type="text" id="txtLogin" name="txtLogin" value="<?php echo $repA[0]->pseudo_Utilisateur;?> ">

				<label for="txtMdpActuel" class="labelCheck">Mot de passe actuel</label>
				<input type="password" id="txtMdpActuel" name="txtMdpActuel">
				<input type="checkbox" name="affichertxtMdpActuel" id="affichertxtMdpActuel" onchange="montreMdp('txtMdpActuel', this);">
				<label for="affichertxtMdpActuel" class="labelCheck">Afficher le mot de passe</label><br />

				<label for="txtNvMdp" class="labelCheck">Nouveau mot de passe</label>
				<input type="password" id="txtNvMdp" name="txtNvMdp">
				<input type="checkbox" name="affichertxtNvMdp" id="affichertxtNvMdp" onchange="montreMdp('txtNvMdp', this);">
				<label for="affichertxtNvMdp" class="labelCheck">Afficher le mot de passe</label><br />

				<label for="txtNvMdp2" class="labelCheck">Confirmer le mot de passe</label>
				<input type="password" id="txtNvMdp2" name="txtNvMdp2">
				<input type="checkbox" name="affichertxtNvMdp2" id="affichertxtNvMdp2" onchange="montreMdp('txtNvMdp2', this);">
				<label for="affichertxtNvMdp2" class="labelCheck">Afficher le mot de passe</label><br />

				<label for="txtMail" class="labelCheck">Mail</label>
				<input type="text" name="txtMail" id="txtMail" value="<?php echo $repA[0]->mail_Utilisateur;?> ">
				<label>Profil</label>
				<input type="checkbox" name="profil[]" id="dess" value="dessinateur" <?php echo $dess; ?>>
				<label for="dess" class="labelCheck">Dessinateur</label>
				<input type="checkbox" id="trad" name="profil[]" value="traducteur" <?php echo $trad; ?>>
				<label for="trad" class="labelCheck">Traducteur</label><br>
				<label for="txtNote" class="labelCheck">Note</label>
				<input type="text" id="txtNote" name="txtNote" value="<?php echo $repA[0]->note_Utilisateur; ?>">
				<input type="submit" name="Enregistrer" value="Enregistrer les modifications">
		</div>
	</form>	
</div>
<script type="text/javascript">
	active("menuMC");
</script>
<?php
include("footer.php");
?>