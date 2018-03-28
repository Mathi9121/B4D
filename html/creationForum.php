<?php
session_start();
include ("menu.php");

if (isset($_SESSION['id'])) {
		$selBD = $bd->getList();
		if (isset($_POST['ajouter'])) {
			$selTB = $bd->getByTitre($_POST['titreBD']);
			$nvF = $forum->ajouter($_POST['txtTitreF'], $selTB[0]->id_BD);
			$selFor = $forum->getByTitreAndBD($_POST['txtTitreF'], $selTB[0]->id_BD);
			$_SESSION['idF'] = $selFor[0]->id_Forum;
			header('Location:creationPost.php');
		}
}
else{
	header('Location: connect.php');
}

?>

<div id="nvforum" class="divPrincipale">
	<form method="post" action="creationForum.php">
		<label>Titre du forum</label>
		<input type="text" name="txtTitreF" required="required">
		<label>Titre de la BD</label>
		<select name="titreBD" required="required">
			<option disabled selected>Choisir une BD</option>
			<?php
				for ($i=0; $i < sizeof($selBD); $i++) { 
					echo ("<option value='".$selBD[$i]->titre_BD."'>".$selBD[$i]->titre_BD."</option>");
				}
			?>
		</select>
		<input type="submit" name="ajouter" value="Ajouter le forum">
	</form>
</div>

<?php
include("footer.php");
?>