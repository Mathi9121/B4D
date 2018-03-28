<?php
session_start();
include ("menu.php");

$repF = $forum->getList();

if (isset($_POST['nvForum'])) {
	if (isset($_SESSION['id'])) {
		header('Location: creationForum.php');
	}
	else{
		header('Location: connect.php');
	}
}
?>

<div id="forum" class="divPrincipale">
	<form action="forum.php" method="post">
		<input type="submit" name="nvForum" value="Nouveau Forum">
		<table>
			<tr>
				<th>Titre</th>
				<th>BD</th>
				<th>Date de création</th>
			</tr>
			<?php
			for ($i=0; $i < sizeof($repF); $i++) { 
				$selBD = $bd->getById($repF[$i]->id_BD);
				echo "<tr>";
				echo ("<td><a href='creationPost.php?idP=".$repF[$i]->id_Forum."'>".$repF[$i]->titre_Forum."</a></td>");
				echo ("<td>".$selBD[0]->titre_BD."</td>") ;
				echo ("<td>".$repF[$i]->date_Creation_Forum."</td>");
				echo "</tr>";
			}
			?>
		</table>
	</form>
</div>
<script type="text/javascript">
	active("menuF");
</script>
<?php
include("footer.php");
?>