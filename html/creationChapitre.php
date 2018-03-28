<?php
session_start();
include ("menu.php");

if (isset($_SESSION['id'])) {
	//Si on passe par modifier
	if (isset($_GET['idB'])) {
		unset($_SESSION['idBD']);
		//recupere l'id de la BD
		$idBD = $_GET['idB'];
		//Recupere tous les chapitres de la BD
		$selBD = $chapitre->getByBD($idBD);
		if (isset($_GET['idC'])) {
			//Recupere les infos d'un chapitre
			$selChap = $chapitre->getById($_GET['idC']);
		}
		if (isset($_POST['cmdModifierChapitre'])) {
			//echo "string";
			$upChapitre = $chapitre->maj($_POST['txtTitre'], $_POST['lstNumero'], $_GET['idB']);
			header("Location:creationChapitre.php?idB=".$idBD);
		}
		if (isset($_POST['cmdSupprimerChapitre'])) {
			$selC = $image->getByChapitre($_GET['idC']);
			for ($i=0; $i < sizeof($selC); $i++) {
				$selBulle = $bulle->getByImage($selC[$i]->id_Image);
				for ($j=0; $j < sizeof($selBulle); $j++) { 
					$suppBulle = $bulle->supprimerById($selBulle[$j]->id_Image, 'Image');
				}
				$suppImg = $image->supprimerById($_GET['idC'], 'Chapitre');
			}
			$supChapitre = $chapitre->supprimerById($_GET['idC'], "Chapitre");
			//header("Location:creationChapitre.php?idB=".$idBD);
		}
	}
	//Si on vient de creer la BD
	if (isset($_SESSION['idBD'])) {
		$idBD = $_SESSION['idBD'];
		if (isset($_POST['cmdAjoutChapitre'])) {
			if ($_POST['txtTitre'] == "") { $_POST['txtTitre'] = "Chapitre ".$_POST['lstNumero']; }
			$nvChapitre = $chapitre->ajouter($_POST['txtTitre'], $_POST['lstNumero'], $_SESSION['idBD']);
			$selChapitre = $chapitre->getByBDEtTitre($_SESSION['idBD'], $_POST['txtTitre']);
			//Ajout des images
			/*for ($i=0; $i < sizeof(); $i++) { 
				$nvImage = $image->ajouter($_POST[''], $_POST[''], $selChapitre[0]->id_Chapitre);
			}*/
			
			$_SESSION["idChapitre"] = $selChapitre[0]->id_Chapitre;
			header('Location:creationBulle.php');
		}
	}
}
?>

<div id="chapitre" class="divPrincipale">
	<form method="post" action="creationChapitre.php">
		<?php
		if (isset($_GET['idB'])) {
		?>
			<div id="lstChap">
				<label>Liste des chapitres</label>
				<ul>
					<?php 
						for ($i=0; $i < sizeof($selBD); $i++) { 
							echo "<li><a href='creationChapitre.php?idB=".$idBD."&idC=".$selBD[$i]->id_Chapitre."' alt=''>".$selBD[$i]->titre_Chapitre."</a></li>";
						} 
					?>
				</ul>
			</div>
		<?php
		}
		?>
		<div id="infoChap">
			<label>Titre du chapitre (Facultatif)</label>
			<input type="text" name="txtTitre" value="<?php if(isset($_GET['idC'])){ echo $selChap[0]->titre_Chapitre; } ?>"><br>
			<label>Numéro du chapitre</label>
			<select name="lstNumero">
				<?php
				if (isset($_SESSION['idBD'])) {			
				?>
					<option value="1">Chapitre 1</option>
				<?php
				}
				if (isset($_GET['idB'])) {
					if (isset($_GET['idC'])) {
						echo "<option disabled selected value='".$selChap[0]->numero_Chapitre."'>Chapitre ".$selChap[0]->numero_Chapitre."</option>";
					}
					else{
						echo "<option disabled selected value='".(sizeof($selBD)+1)."'>Chapitre ".(sizeof($selBD)+1)."</option>";
					}
					for ($i=0; $i < sizeof($selBD); $i++) {
						echo "<option value='".$selBD[$i]->numero_Chapitre."'>Chapitre ".$selBD[$i]->numero_Chapitre."</option>";
					}
				}
				?>
			</select>
			<label for="fileImages" id="labelImages">Ajout des images</label><br>
			<input type="file" id="fileImages" name="fileImages" accept=".jpg, .jpeg, .png" multiple="multiple"><br>
			<div id="divImages">
				<?php
					if (isset($_GET['idC'])) {
						$selI = $image->getByChapitre($_GET['idC']);
						echo "<table>";
						echo "<tr><td>Numéro</td><td>Images</td><td>Nom</td></tr>";
						for ($i=0; $i < sizeof($selI); $i++) { 
							echo "<tr>";
							echo "<td>".($i+1)."</td>";
							echo "<td><img src='../images/".$selI[$i]->source_Image."' alt=''</td>";
							echo "<td>".$selI[$i]->source_Image."</td>";
							echo "</tr>";
						}
						echo "</table>";
					}
					else{
						echo "<p>Aucun fichier selectionné</p>";
					}
				?>
			</div>
			<input type="submit" name="cmdAjoutChapitre" value="Ajouter le chapitre">
			<?php
			if (isset($_GET['idB'])) {			
			?>
				<input type="submit" name="cmdModifierChapitre" value="Modifier le chapitre">
				<input type="submit" name="cmdSupprimerChapitre" value="Supprimer le chapitre">
			<?php
			}
			?>
		</div>
		
	</form>
</div>
<script type="text/javascript">
	affichageImage('Chapitre');
</script>
<?php
include("footer.php");
?>