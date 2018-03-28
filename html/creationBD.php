<?php
session_start();
include ("menu.php");

$lstGenre = $genre->getList();
$lstLangue = $langue->getList();

if (isset($_SESSION['id'])) {
	if (isset($_POST['cmdAjoutBD'])) {
		if (isset($_POST['url'])) {
			$_POST['url'] = "";
		}
		$nvBD = $bd->ajouter($_POST['txtTitre'], $_POST['txtSynopsis'], $_POST['url'], $_SESSION['id']);
		$selBD = $bd->getByUtilisateurEtTitre($_SESSION['id'], $_POST['txtTitre']);
		for ($i=0; $i < sizeof($_POST['lstGenre']); $i++) { 
			$nvBD = $bg->ajouter($selBD[0]->id_BD, $_POST['lstGenre'][$i]);
		}
		$nvBD = $bl->ajouter($selBD[0]->id_BD, $_POST['lstLangue']);
		$nvForum = $forum->ajouter($_POST['txtTitre'], $selBD[0]->id_BD);
		$_SESSION["idBD"] = $selBD[0]->id_BD;
		header('Location:creationChapitre.php');
	}
}
else{
	header('Location:connect.php');
}
?>

<div id="bd" class="divPrincipale">
	<form method="post" action="creationBD.php">
		<label>Titre de la BD</label>
		<input type="text" name="txtTitre" required="required"><br>
		<label for="fileCover" id="labelCover">Cover</label><br>
		<!--<input type="file" name="txtCover"><br>-->
		<input type="file" id="fileCover" name="fileCover" accept=".jpg, .jpeg, .png"><br>
		<div id="divCover">
			
		</div>
		<label>Genre(s)</label>
		<select name="lstGenre[]" multiple required="required">
			<?php
			for ($i=0; $i < sizeof($lstGenre); $i++) { 
				echo ("<option value='".$lstGenre[$i]->id_Genre."'>".$lstGenre[$i]->libelle_Genre."</option>");
			}
			?>
		</select>
		<label>Langue</label>
		<select name="lstLangue" required="required">
			<option disabled selected>Choisir une langue</option>
			<?php
			for ($i=0; $i < sizeof($lstLangue); $i++) { 
				echo("<option value='".$lstLangue[$i]->id_Langue."'>".$lstLangue[$i]->libelle_Langue."</option>");
			}
			?>
		</select>
		<label>Synopsis</label>
		<textarea rows="4" name="txtSynopsis"></textarea>
		<input type="submit" name="cmdAjoutBD" value="Ajouter la BD">
	</form>
</div>

<script type="text/javascript">
	affichageImage('BD');
</script>
<?php
include("footer.php");
?>