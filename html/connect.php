<?php
session_start();
include ("menu.php");

$tropCourt = "";
if(isset($_POST["cmdConnecter"])){
	$auth = $utilisateur->getByLoginEtMdp($_POST["login"], $_POST["mdp"]);
	if(isset($auth[0])){
		$_SESSION['id'] = $auth[0]->id_Utilisateur;
		$selT = $tu->getById($_SESSION['id'], "Utilisateur");
		include("viewTypeUtilisateur.php");
	}
}
if (isset($_POST["cmdValider"])) {
	if ($_POST['txtmdp'] == $_POST['mdp2']) {
		if((strlen($_POST['txtmdp']) >= 8) && (strlen($_POST['txtmdp']) <= 30)){
			$auth = $utilisateur->ajouter($_POST['txtlogin'], $_POST['txtmdp'], $_POST['txtMail']);
			$selA = $utilisateur->getByLogin($_POST['txtlogin']);
			foreach($_POST['profil'] as $valeur)
			{
				$i=0;
				$selP = $typeU->getByLibelle($valeur);
				$authStatut = $tu->ajouter($selA[0]->id_Utilisateur, $selP[$i]->id_Type);
			   	$i++;
			}
			$_SESSION['id'] = $selA[0]->id_Utilisateur;

			$selT = $tu->getById($selA[0]->id_Utilisateur, "Utilisateur");
			include("viewTypeUtilisateur.php");
		}
		else{
			$tropCourt = "Votre mot de passe doit être compris entre 8 et 30 caractères.";
		}
	}
}
?>

<div id="connexion" class="divPrincipale">
	<div id="seConnecter">
		<h1>Se connecter</h1>
		<form method="post" action="connect.php">
			<label>Login</label>
			<input type="text" name="login" required="required"><br />
			<label>Mot de passe</label>
			<input type="password" name="mdp" id="mdp" required="required"><br />
			<input type="checkbox" name="afficherMdp" id="afficherMdp" onchange="montreMdp('mdp', this);">
			<label for="afficherMdp" class="labelCheck">Afficher le mot de passe</label><br />
			<input type="submit" name="cmdConnecter" value="Se connecter">
		</form>
	</div>
	<div id="inscrire">
	<h1>S'inscrire</h1>
		<form method="post" action="connect.php">
			<label>Login</label>
			<span class="element">?
				<div class="infobulle">
					Votre login doit être compris entre 5 et 25 caractères.
				</div>	
			</span>
			<input type="text" name="txtlogin" required="required"><br />
			<label>Mot de passe</label>
			<span class="element">?
				<div class="infobulle">
					Votre mot de passe doit être compris entre 8 et 30 caractères.
				</div>	
			</span>
			<input type="password" name="txtmdp" id="txtmdp" required="required"><br />
			<input type="checkbox" name="affichertxtMdp" id="affichertxtMdp" onchange="montreMdp('txtmdp', this);">
			<label for="affichertxtMdp" class="labelCheck">Afficher le mot de passe</label><br />
			<div id="avert"><?php echo $tropCourt; ?></div>
			<label>Confirmer votre mot de passe</label>
			<input type="password" name="mdp2" id="mdp2" required="required"><br />
			<input type="checkbox" name="afficherMdp2" id="afficherMdp2" onchange="montreMdp('mdp2', this);">
			<label for="afficherMdp2" class="labelCheck">Afficher le mot de passe</label><br />
			<label>Profil</label>
			<input type="checkbox" name="profil[]" id="dessinateur" value="dessinateur">
			<label for="dessinateur" class="labelCheck">Dessinateur</label>
			<input type="checkbox" name="profil[]" id="traducteur" value="traducteur">
			<label for="traducteur" class="labelCheck">Traducteur</label><br />
			<label>Mail</label>
			<input type="text" name="txtMail" required="required"><br />
			<input type="submit" name="cmdValider" value="S'inscrire">
		</form>
	</div>
</div>
<script type="text/javascript">
	active("menuC");
	
</script>
<?php
include("footer.php");
?>