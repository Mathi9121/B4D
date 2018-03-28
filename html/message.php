<?php
session_start();
include ("menu.php");

if (isset($_SESSION['id'])) {
	include ("viewProfil.php");
		
	if (isset($_POST['Envoyer'])) {
		$repMD = $utilisateur->getByLogin($_POST['txtDest']);
		$repM = $mail->ajouter($_POST['txtObjet'], $_POST['message'], $_SESSION['id'], $repMD[0]->id_Utilisateur);
		header('Location:message.php');
	}

	if (isset($_POST['boiteRecep']) || isset($_POST['boiteEnv'])) {
		header('Location:mail.php');
	}

	if (isset($_GET['idM'])) {
		$selM = $mail->getById($_GET['idM']);
		$selU = $utilisateur->getById($selM[0]->id_Utilisateur);
	}
}
else{
	header('Location: connect.php');
}
?>

<div class="mail divPrincipale">
	<form method="post" action="message.php">
		<?php include("viewSecondMenu.php") ?>

		<div id="message" class="detailProfil">
			<input type="submit" name="newMail" value="Nouveau message">
			<input type="submit" name="boiteRecep" value="Boite de Reception">
			<input type="submit" name="boiteEnv" value="Boite d'Envoi"><br>
			<label for="choixPseudo" class="labelCheck">Destinataire</label>
			<input type="text" list="pseudo" name="txtDest" id="choixPseudo" value="<?php if(isset($_GET['idM'])){ echo $selU[0]->pseudo_Utilisateur." <".$selU[0]->mail_Utilisateur.">"; } ?>">
			<datalist id="pseudo">
				<?php
					$selPseudo = $utilisateur->getList();
					for ($i=0; $i < sizeof($selPseudo); $i++) { 
						echo "<option value='".$selPseudo[$i]->pseudo_Utilisateur."'></option>";
					}
				?>
			</datalist>
			<label for="txtObjet" class="labelCheck">Objet</label>
			<input type="text" name="txtObjet" id="txtObjet" value="<?php if(isset($_GET['idM'])){ echo $selM[0]->objet_Mail; } ?>">
			<label for="txtMessage" class="labelCheck">Message</label><br>
			<textarea rows="10" cols="180" id="txtMessage" name="message"><?php if(isset($_GET['idM'])){ echo $selM[0]->message_Mail; } ?></textarea>
			<?php
				if (isset($_GET['idM'])) {
					echo "<input type='submit' name='Repondre' value='Repondre'>";
					echo "<input type='submit' name='Supprimer' value='Supprimer'>";
				}
				else{
					echo "<input type='submit' name='Envoyer' value='Envoyer'>";
				}
			?>
			
		</div>
	</form>	
</div>
<script type="text/javascript">
	active("menuMC");
</script>
<?php
include("footer.php");
?>