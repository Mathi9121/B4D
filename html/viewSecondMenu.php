<div class="secondMenu">
	<ul>
		<li><input type="submit" class="btnSm" name="info" value="Mes informations personnelles"></li>
		<?php if (isset($dessinateur) || isset($traducteur)) {
			echo "<li><input type='submit' class='btnSm' name='trav' value='Mes travaux'></li>";
		} ?>
		<?php if (isset($administrateur)) {
			echo "<li><input type='submit' class='btnSm' name='validationBD' value='Validation BD'></li>";
		} ?>
		<li><input type="submit" class="btnSm" name="suivis" value="Mes suivis"></li>
		<li><input type="submit" class="btnSm" name="mail" value="Mail"></li>
		<li><input type="submit" class="btnSm" name="decnx" value="Deconnexion"></li>
	</ul>
</div>