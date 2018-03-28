<?php
session_start();
include ("menu.php");


if (isset($_SESSION['id'])) {
	include ("viewProfil.php");
		
	if (isset($_POST['newMail'])) {
		header('Location:message.php');
	}
}
else{
	header('Location: connect.php');
}
?>

<div class="mail divPrincipale">
	<form method="post" action="mail.php">
		<?php include("viewSecondMenu.php") ?>

		<div id="boite" class="detailProfil">
			<input type="submit" name="newMail" value="Nouveau message">
			<input type="submit" name="boiteRecep" value="Boite de Reception">
			<input type="submit" name="boiteEnv" value="Boite d'Envoi"><br>
			<table>
				<tr>
					<th>Destinataire</th>
					<th>Objet</th>
					<th>Date</th>
					<th>Supprimer</th>
				</tr>
				<?php 
					if (isset($_POST['boiteRecep']) || !isset($_POST['boiteEnv'])) {
						$repR = $mail->getByDestinataire($_SESSION['id']);
						for ($i=0; $i < sizeof($repR); $i++) { 
							$selU = $utilisateur->getById($repR[$i]->id_Utilisateur);
							echo "<tr>";
							echo ("<td><a href='message.php?idM=".$repR[$i]->id_Mail."'>".$selU[0]->pseudo_Utilisateur." < ".$selU[0]->mail_Utilisateur." ></a></td>");
							echo ("<td>".$repR[$i]->objet_Mail."</td>") ;
							echo ("<td>".$repR[$i]->date_Envoi_Mail."</td>");
							echo ("<td><a href='.php?idM='><img src='../images/supprimer.png' alt=''/></a></td>");
							echo "</tr>";
						}
					}
				?>
				<?php 
					if (isset($_POST['boiteEnv'])) {
						$repR = $mail->getByUtilisateur($_SESSION['id']);
						for ($i=0; $i < sizeof($repR); $i++) { 
							$selU = $utilisateur->getById($repR[$i]->id_Dest_Utilisateur);
							echo "<tr>";
							echo ("<td>".$selU[0]->pseudo_Utilisateur." < ".$selU[0]->mail_Utilisateur." > </td>");
							echo ("<td>".$repR[$i]->objet_Mail."</td>") ;
							echo ("<td>".$repR[$i]->date_Envoi_Mail."</td>");
							echo ("<td><a href='.php?idM='><img src='../images/supprimer.png' alt=''/></a></td>");
							echo "</tr>";
						}
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