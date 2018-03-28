<?php
session_start();
include ("menu.php");


if (isset($_SESSION['id'])) {
	include ("viewProfil.php");

	if (isset($_POST['ajoutBD'])) {
		header('Location:creationBD.php');
	}

	if (isset($_GET['idB'])) {
		$selC = $chapitre->getByBD($_GET['idB']);
		for ($i=0; $i < sizeof($selC); $i++) {
			$selI = $image->getByChapitre($selC[$i]->id_Chapitre);
			for ($j=0; $j < sizeof($selI); $j++) { 
				$suppBulle = $bulle->supprimerById($selI[$j]->id_Image, 'Image');
			}
			$suppImg = $image->supprimerById($selC[$i]->id_Chapitre, 'Chapitre');
		}
		$suppChap = $chapitre->supprimerById($_GET['idB'],'BD');
		$suppGenre = $bg->supprimerById($_GET['idB'],'BD');
		$suppLangue = $bl->supprimerById($_GET['idB'],'BD');
		$selForum = $forum->getByBD($_GET['idB']);
		for ($i=0; $i < sizeof($selForum); $i++) {
			$selPost = $post->getByForum($selForum[$i]->id_Forum);
			for ($j=0; $j < sizeof($selPost); $j++) { 
				$suppP = $post->supprimerById($selPost[$j]->id_Forum, 'Forum');	
			}
			$suppF = $forum->supprimerById($selForum[$i]->id_Forum, 'Forum');
		}
		$suppBD = $bd->supprimerById($_GET['idB'],'BD');
	}
}
else{
	header('Location: connect.php');
}
?>

<div id="trav" class="divPrincipale">
	<form method="post" action="travaux.php">
		<?php include("viewSecondMenu.php") ?>

		<div id="dash" class="detailProfil">
			<input type="submit" name="ajoutBD" value="Ajouter une BD">
			<table>
				<tr>
					<th>Cover</th>
					<th>Titre</th>
					<th>Genre(s)</th>
					<th>Nombre de Chapitre</th>
					<th>Date de création</th>
					<th>Date de fin</th>
					<th>Note</th>
					<th>Rang</th>
					<th>Modifier</th>
					<th>Supprimer</th>
				</tr>
				<?php
				$repT = $bd->getByUtilisateur($_SESSION['id']);
					for ($i=0; $i < sizeof($repT); $i++) { 
						echo "<tr>";
						echo ("<td><img src='../images/".$repT[$i]->couverture_BD."' alt='".$repT[$i]->titre_BD."'/></td>");
						echo ("<td>".$repT[$i]->titre_BD."</td>") ;
						echo ("<td>");
						$idG = $bg->getById($repT[$i]->id_BD, "BD");
						for ($j=0; $j < sizeof($idG); $j++) { 
							$p = $genre->getById($idG[$j]->id_Genre);
							echo $p[0]->libelle_Genre." - ";
						}
						$repC = $chapitre->getCountByBD($repT[$i]->id_BD);
						echo ("</td>");
						echo ("<td>".$repC[0]->num."</td>");
						echo ("<td>".$repT[$i]->date_Creation_BD."</td>");
						echo ("<td>".$repT[$i]->date_Fin_BD."</td>");
						echo ("<td>".$repT[$i]->note_BD."</td>");
						echo ("<td>".$repT[$i]->rang_BD."</td>");
						echo ("<td><a href='creationChapitre.php?idB=".$repT[$i]->id_BD."'><img src='../images/editer.png' alt=''/></a></td>");
						echo ("<td><a href='travaux.php?idB=".$repT[$i]->id_BD."'><img src='../images/supprimer.png' alt=''/></a></td>");
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</form>	
</div>
<script type="text/javascript">
	active("menuMC");
</script>
<?php
include("footer.php");
?>