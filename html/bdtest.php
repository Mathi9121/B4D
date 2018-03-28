<?php
include ("menu.php");

$abc = "";
if (isset($_POST['Tous']))	$abc = "";
if (isset($_POST['A']))	$abc = "A";
if (isset($_POST['B']))	$abc = "B";
if (isset($_POST['C']))	$abc = "C";
if (isset($_POST['D']))	$abc = "D";
if (isset($_POST['E']))	$abc = "E";
if (isset($_POST['F']))	$abc = "F";
if (isset($_POST['G']))	$abc = "G";
if (isset($_POST['H']))	$abc = "H";
if (isset($_POST['I']))	$abc = "I";
if (isset($_POST['J']))	$abc = "J";
if (isset($_POST['K']))	$abc = "K";
if (isset($_POST['L']))	$abc = "L";
if (isset($_POST['M']))	$abc = "M";
if (isset($_POST['N']))	$abc = "N";
if (isset($_POST['O']))	$abc = "O";
if (isset($_POST['P']))	$abc = "P";
if (isset($_POST['Q']))	$abc = "Q";
if (isset($_POST['R']))	$abc = "R";
if (isset($_POST['S']))	$abc = "S";
if (isset($_POST['T']))	$abc = "T";
if (isset($_POST['U']))	$abc = "U";
if (isset($_POST['V']))	$abc = "V";
if (isset($_POST['W']))	$abc = "W";
if (isset($_POST['X']))	$abc = "X";
if (isset($_POST['Y']))	$abc = "Y";
if (isset($_POST['Z']))	$abc = "Z";

$lstBd = new BD();
$s = $lstBd->getList();
for ($i=0; $i < sizeof($s); $i++) { 
	echo $s[$i]->titre_BD." ";
}

$liste = "SELECT DISTINCT BD.id_BD, titre_BD, couverture_BD, pseudo_Utilisateur FROM BD, Utilisateur WHERE BD.id_Utilisateur = Utilisateur.id_Utilisateur AND titre_BD LIKE '".$abc."%' ORDER BY titre_BD;";
$bdd = new connexion();
$repListe = $bdd->query($liste);

$genre = "SELECT * FROM Genre ORDER BY libelle_Genre;";
$repG = $bdd->query($genre);
?>

<div id="listeBD">
	<form method="post" action="listeBD.php">
		<h1>Toutes les BD</h1>
		<div id="abc">
			<input type="submit" name="Tous" value="Tous" class="btn">
			<input type="submit" name="A" value="A" class="btn">
			<input type="submit" name="B" value="B" class="btn">
			<input type="submit" name="C" value="C" class="btn">
			<input type="submit" name="D" value="D" class="btn">
			<input type="submit" name="E" value="E" class="btn">
			<input type="submit" name="F" value="F" class="btn">
			<input type="submit" name="G" value="G" class="btn">
			<input type="submit" name="H" value="H" class="btn">
			<input type="submit" name="I" value="I" class="btn">
			<input type="submit" name="J" value="J" class="btn">
			<input type="submit" name="K" value="K" class="btn">
			<input type="submit" name="L" value="L" class="btn">
			<input type="submit" name="M" value="M" class="btn">
			<input type="submit" name="N" value="N" class="btn">
			<input type="submit" name="O" value="O" class="btn">
			<input type="submit" name="P" value="P" class="btn">
			<input type="submit" name="Q" value="Q" class="btn">
			<input type="submit" name="R" value="R" class="btn">
			<input type="submit" name="S" value="S" class="btn">
			<input type="submit" name="T" value="T" class="btn">
			<input type="submit" name="U" value="U" class="btn">
			<input type="submit" name="V" value="V" class="btn">
			<input type="submit" name="W" value="W" class="btn">
			<input type="submit" name="X" value="X" class="btn">
			<input type="submit" name="Y" value="Y" class="btn">
			<input type="submit" name="Z" value="Z" class="btn">
		</div>
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
			for ($i=0; $i < sizeof($s); $i++) { 
				echo "<tr>";
				echo ("<td><img src='images/".$s[$i]->couverture_BD."' alt='".$s[$i]->titre_BD."'/></td>");
				echo ("<td>".$s[$i]->titre_BD."</td>") ;
				echo ("<td>".$s[$i]->pseudo_Utilisateur."</td>");
				echo ("<td>");
				echo "</tr>";
			}
			?>
		</table>
	</form>
	
</div>
<div id="listeCateg">
	<form action="listeBD.php" method="post">
		<?php
		for ($i=0; $i < sizeof($repG); $i++) { 
			echo ("<ul>");
			echo ("<li><a href=''>".$repG[$i]->libelle_Genre."</a></li>");
			echo ("</ul>");
		}
		?>
	</form>
		
</div>

<?php
include("footer.php");
?>