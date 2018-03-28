<div id="nvpost" class="divPrincipale">
	<form method="post" action="creationPost.php">
		<?php
			if (sizeof($repF)>0) {
				echo "<h1>".$selF[0]->titre_Forum."</h1>";
				for ($i=0; $i < sizeof($repF); $i++) { 
					$selU = $utilisateur->getById($repF[$i]->id_Utilisateur);
					echo "<label>".$selU[0]->pseudo_Utilisateur." - ".$repF[$i]->date_Post."</label>";
					echo "<textarea rows='5' cols='30' name='txtMessage' readonly='readonly'>".$repF[$i]->message_Post."</textarea>";
				}
			}
		?>
		<label>Titre du forum</label>
		<input type="text" name="txtTitreF" value="<?php echo $selF[0]->titre_Forum ?>">
		<label>Message</label>
		<textarea rows="10" cols="30" name="txtMessage" required="required"></textarea>
		<input type="submit" name="ajouterP" value="Ajouter un post">
	</form>
</div>