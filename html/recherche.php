<?php
include ("menu.php");

$repG = $genre->getList();
$repA = $bd->getListAnnée();
$repL = $langue->getList();

if(isset($_POST["cmdRechercher"])){
	if (isset($_POST['genre'])) {
		$repg = $genre->getById($_POST['genre']);
		//var_dump();
		//$g = "SELECT libelle_Genre FROM Genre WHERE id_Genre = ".$_POST['genre'].";";
		//$repg = $bdd->query($g);
		$cat = $repg[0]->id_Genre;
		//echo $cat;
	}
	else{ $cat = '%'; }
	$stat = (isset($_POST["statut"])) ? $_POST["statut"] : "%";
	if (!empty($_POST["txtAuteur"])) {
		$selAuteur = $utilisateur->getByLogin($_POST["txtAuteur"]);
		$aut = $selAuteur[0]->id_Utilisateur;
	} 
	else{ $aut = "NULL"; }
	$tit = (isset($_POST["txtTitre"])) ? $_POST["txtTitre"] : "%";
	if (isset($_POST['annee'])) {
		$a = "SELECT date_Fin_BD, date_Creation_BD FROM BD WHERE id_BD = ".$_POST['annee'].";";
		$repa = $bdd->query($a);
		$ann = $repa[0]->date_Fin_BD;
	}
	else{ $ann = '%'; }
	if (isset($_POST['langue'])) {
		$l = "SELECT libelle_Langue FROM Langue WHERE id_Langue = ".$_POST['langue'].";";
		$repl = $bdd->query($l);
		$lang = $repl[0]->libelle_Langue;
	}
	else{ $lang = '%'; }
	
	/*$rech = "SELECT DISTINCT BD.id_BD, couverture_BD, titre_BD, pseudo_Utilisateur FROM BD, Utilisateur WHERE BD.id_Utilisateur = Utilisateur.id_Utilisateur  libelle_Genre LIKE '%".$cat."%' AND pseudo_Utilisateur LIKE '%".$aut."%' AND titre_BD LIKE '%".$tit."%' AND libelle_Langue LIKE '%".$lang."%'";*/

	$rech = $bd->getByUtilisateurEtTitre($aut, $tit); //recupere les BDs selon auteur et titre
	//recuperer les genres selon l'id des BD de $rech
	for ($i=0; $i < sizeof($rech); $i++) {
		//$rechBG = $bg->getById((int)$rech[$i]->id_BD, "BD"); //recupere id_bd et id_genre de chaque bdd
		//SELECT * FROM BD_Genre WHERE id_BD = (int)$rech[$i]->id_BD AND id_Genre = $cat;
		$sel[$i] = $bg->getByBdEtGenre($rech[$i]->id_BD, $cat); //$sel recupere les bd_genre d'une certaine cat
		//obtenir les bd ou lid genre = $cat
		//echo $sel[0]->id_Genre;
		
		var_dump($sel[$i]);
	}
	for ($i=0; $i < sizeof($sel); $i++) { 
			//$rech = $bd->getById($sel[0]->id_BD); //obtient les bd en fct du genre
	}
	
	//$rech = "SELECT DISTINCT BD.id_BD, couverture_BD, titre_BD, pseudo_Utilisateur FROM BD, Utilisateur WHERE BD.id_Utilisateur = Utilisateur.id_Utilisateur  AND pseudo_Utilisateur LIKE '%".$aut."%' AND titre_BD LIKE '%".$tit."%'";
	//$repR = $bdd->query($rech);
}
?>

<div id="recherche" class="divPrincipale">
	<h1>Recherche avancée</h1>
	<form method="post" action="recherche.php">
		<?php
		if (isset($_POST['cmdRechercher'])) {
			if (sizeof($repR)>0) {
			?>
				<div id="lstRech">
					<table>
						<tr>
							<th>Cover</th>
							<th>Titre</th>
							<th>Auteur</th>
							<th>Genre(s)</th>
							<th>Langue(s)</th>
							<th>Lire</th>
						</tr>
						<?php
						for ($i=0; $i < sizeof($repR); $i++) { 
							echo "<tr>";
							echo ("<td><img src='images/".$repR[$i]->couverture_BD."' alt='".$repR[$i]->titre_BD."'/></td>");
							echo ("<td>".$repR[$i]->titre_BD."</td>") ;
							echo ("<td>".$repR[$i]->pseudo_Utilisateur."</td>");
							echo ("<td>");
							/*$listeCat = $bg->getById($repR[$i]->id_BD, 'BD');*/
							
							$listeCat = "SELECT libelle_Genre FROM Genre, BD_Genre WHERE Genre.id_Genre = BD_Genre.id_Genre AND libelle_Genre LIKE '%".$cat."%' AND id_BD = ".$repR[$i]->id_BD.";";
							$repListeCat = $bdd->query($listeCat);
							echo $repListeCat[0]->libelle_Genre;
							
							echo ("</td>");
							echo ("<td>");
							$listeLang = "SELECT libelle_Langue FROM Langue, BD_Langue WHERE Langue.id_Langue = BD_Langue.id_Langue AND id_BD = ".$repR[$i]->id_BD.";";
							$repListeLang = $bdd->query($listeLang);
							for ($j=0; $j < sizeof($repListeLang); $j++) { 
								echo($repListeLang[$j]->libelle_Langue." - ");
							}
							echo ("</td>");
							echo ("<td><a href='.php?id=".$repR[$i]->id_BD."'>Lire</a></td>");
							echo "</tr>";
						}
						?>
					</table>
				</div>
				<?php
			}
		}
		?>
		<div id="rechGauche">
			<label for="txtMot">Mots</label>
			<input type="text" name="txtMot" id="txtMot">
			<label for="txtAuteur">Auteur</label>
			<input type="text" id="txtAuteur" name="txtAuteur"><br />
			<label for="txtTraducteur">Traducteur</label>
			<input type="text" id="txtTraducteur" name="txtTraducteur">
			<label for="txtTitre">Titre</label>
			<input type="text" id="txtTitre" name="txtTitre"><br />
			<label>Catégorie</label>
			<select name="genre[]" multiple="multiple">
				<?php
					for ($i=0; $i < sizeof($repG); $i++) { 
						echo ("<option value=".$repG[$i]->id_Genre.">".$repG[$i]->libelle_Genre."</option>");
					}
				?>
			</select>
		</div>
		<div id="rechDroite">
			<label>Note</label><br>
			<label for="txtNote1">1</label>
			<input type="checkbox" id="txtNote1" name="note[]" value="1">
			<label for="txtNote2">2</label>
			<input type="checkbox" id="txtNote2" name="note[]" value="2">
			<label for="txtNote3">3</label>
			<input type="checkbox" id="txtNote3" name="note[]" value="3">
			<label for="txtNote4">4</label>
			<input type="checkbox" id="txtNote4" name="note[]" value="4">
			<label for="txtNote5">5</label>
			<input type="checkbox" id="txtNote5" name="note[]" value="5"><br>
			<label>Statut</label><br>
			<label for="termine">Terminé</label>
			<input type="radio" id="termine" name="statut" value="termine">
			<label for="enCours">En cours</label>
			<input type="radio" id="enCours" name="statut" value="enCours">
			<br />
			<label>Année</label>
			<select name="annee[]" multiple="multiple">
				<?php
					for ($i=0; $i < sizeof($repA); $i++) {
						echo ("<option value=".$repA[$i]->year.">".$repA[$i]->year."</option>");	
					}
				?>
			</select>
			<label>Langue</label>
			<select name="langue[]" multiple="multiple">
				<?php
					for ($i=0; $i < sizeof($repL); $i++) { 
						echo ("<option value=".$repL[$i]->id_Langue.">".$repL[$i]->libelle_Langue."</option>");
					}
				?>
			</select><br>
		</div>
		<input type="submit" name="cmdRechercher" value="Rechercher">
	</form>
</div>
<script type="text/javascript">
	active("menuR");
</script>
<?php
include("footer.php");
?>