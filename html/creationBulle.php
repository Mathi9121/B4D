<?php
session_start();
include ("menu.php");

if (isset($_SESSION['id'])) {
	if (isset($_SESSION['idChapitre'])) {
		$selBD = $bd->getById($_SESSION['idBD']);
		$selChap = $chapitre->getById($_SESSION['idChapitre']);
		$selImage = $image->getByChapitre($_SESSION['idChapitre']);
		if (isset($_POST['cmdSuivant'])) {
			
			
		}
		if (isset($_POST['cmdValider'])) {
			
		}
	}
}
?>

<div id="bulle"> 
	<form method="post" action="creationBulle.php">
		<div id="headTitre">
			<label><?php echo $selBD[0]->titre_BD." - ".$selChap[0]->titre_Chapitre." - Image n°".$selImage[0]->numero_Image; ?></label>
		</div>
		<div id="lstBulles">
			<label>Liste des bulles</label>
		</div>
		<div id="divImg">
			<?php
				echo "<img src='images/".$selImage[0]->source_Image."'>";
			?>
		</div>
		<div id="lstStyles">
			<label>Polices</label>
			<input type="" name="">
			<label>Taille</label>
			<input type="" name="">
			<label>Couleur</label>
			<input type="" name="">
		</div>
		<div id="lstImages">
			<table>
				<tr>
					<?php
						for ($i=0; $i < sizeof($selImage); $i++) { 
							echo "<td><img src='images/".$selImage[$i]->source_Image."'></td>";
						}
					?>
				</tr>
			</table>
		</div>
		<input type="submit" name="cmdSuivant" value="Suivant">
		<input type="submit" name="cmdValider" value="Valider">
	</form>
</div>

<?php
include("footer.php");
?>