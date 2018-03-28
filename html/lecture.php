<?php
session_start();
include ("menu.php");

if (isset($_GET['idL'])) {
	$selBD = $bd->getById($_GET['idL']);
	$selChap = $chapitre->getByBD($_GET['idL']);
	$selU = $utilisateur->getById($selBD[0]->id_Utilisateur);
	$selBG = $bg->getById($_GET['idL'], "BD");
	$selBL = $bl->getById($_GET['idL'], "BD");
	
	/*$selChapitre = $chapitre->getByBD($selBD[0]->id_BD);
	$selImage = $image->getByChapitre($selChapitre[$i]->id_Chapitre);
	$selBulle = $bulle->getByImage($selImage[$i]->id_Image);*/
	if (isset($_POST['cmdCommenter'])) {
		
	}
	if (isset($_POST['cmdPartager'])) {
		
	}
	if (isset($_POST['cmdSuivre'])) {
		
	}
	if (isset($_POST['cmdNoter'])) {
		
	}
	if (isset($_POST['cmdAimer'])) {
		echo "string";
	}
	if (isset($_POST['cmdTelecharger'])) {
		
	}

}
else{
	header('Location:connect.php');
}
?>

<div id="lecture" class="divPrincipale">
	<form action="lecture.php" method="post">
		<input type="submit" id="cmdCommenter" name="cmdCommenter" value="Commenter">
		<input type="submit" id="cmdPartager" name="cmdPartager" value="Partager">
		<input type="submit" id="cmdSuivre" name="cmdSuivre" value="Suivre">
		<input type="submit" id="cmdNoter" name="cmdNoter" value="Noter">
		<input type="submit" id="cmdAimer" name="cmdAimer" value="Aimer">
		<input type="submit" id="cmdTelecharger" name="cmdTelecharger" value="Telecharger">
		<div id="infoBD">
			<div id="divImgInfoBD">
				<img src="../images/<?php echo $selBD[0]->couverture_BD; ?> " alt="">
			</div>
			<div id="divInfoBD">
				<label>Titre : <?php echo $selBD[0]->titre_BD; ?></label><br>
				<label>Auteur : <?php echo $selU[0]->pseudo_Utilisateur; ?></label><br>
				<label>Genre(s) : 
					<?php 
						for ($i=0; $i < sizeof($selBG); $i++) { 
							$selG = $genre->getById($selBG[$i]->id_Genre);
							echo $selG[0]->libelle_Genre." - "; 
						} 
					?>
				</label><br>
				<label>Langue(s) : 
					<?php 
						for ($i=0; $i < sizeof($selBL); $i++) { 
							$selL = $langue->getById($selBL[$i]->id_Langue);
							echo $selL[0]->libelle_Langue." - "; 
						} 
					?>
				</label><br>
				<label>Date de Création : <?php echo $selBD[0]->date_Creation_BD; ?></label><br>
				<label>Date de Fin : <?php echo $selBD[0]->date_Fin_BD; ?></label><br>
				<label>Synopsis : <?php echo $selBD[0]->synopsis_BD; ?></label><br>
				<label>Chapitre(s) : </label>
				<select name="lstChapitres">
					<?php
					if (isset($_GET['idL'])) {
						for ($i=0; $i < sizeof($selChap); $i++) {
							echo "<option value='".$selChap[$i]->numero_Chapitre."'>".$selChap[$i]->titre_Chapitre."</option>";
						}
					}
					?>
				</select>
			</div>
			<div id="infoChapitre">
				<h1><?php //echo $_POST['lstChapitres']; ?></h1>
			</div>
		</div>
	</form>
</div>
<script type="text/javascript">
	apparenceButton();
	
</script>

<?php
include("footer.php");
?>