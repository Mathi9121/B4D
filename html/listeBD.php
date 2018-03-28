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
//if (isset($_POST['lstABC'])) $abc = $_POST['lstABC'];


$repListe = $bd->getListAlpha($abc);
$lstGenre = $genre->getList();

?>

<div id="listeBD" class="divPrincipale">
	<form method="post" action="listeBD.php">
		<h1>Toutes les BD</h1>
		<select class="petitMenu" name="lstABC">
			<option value="Tous">Tous</option>
			<?php
			foreach(range('A','Z') as $i) {
			    echo ("<option value='".$i."'>".$i."</option>");
			}
			?>
		</select>
		<div id="abc" class="grandMenu">
			<input type="submit" name="Tous" value="Tous" class="btn">
			<?php
			foreach(range('A','Z') as $i) {
			    echo ("<input type='submit' name='".$i."' value='".$i."' class='btn'>");
			}
			?>
		</div>

		<ul>
			<?php
			if (isset($_GET['genre'])) {
				$lstBD = $bg->getById($_GET['genre'], 'Genre');
				for ($i=0; $i < sizeof($lstBD); $i++) {
					$repListe = $bd->getById($lstBD[$i]->id_BD);
					$k=0;
					include ('viewListeBD.php');
				}
			}
			else{
				for ($i=0; $i < sizeof($repListe); $i++) {
					$k=$i;
					include ('viewListeBD.php');
				}
			}
			?>
		</ul>
	</form>
</div>
<div id="listeCateg">
	<form action="listeBD.php" method="post">
		<select class="petitMenu">
			<?php
			for ($i=0; $i < sizeof($lstGenre); $i++) {
				echo ("<option value='".$lstGenre[$i]->id_Genre."'>".$lstGenre[$i]->libelle_Genre."</option>");
			}
			?>
		</select>
		<ul class="grandMenu">
		<?php
		for ($i=0; $i < sizeof($lstGenre); $i++) { 
			echo ("<li><a href='listeBD.php?genre=".$lstGenre[$i]->id_Genre."'>".$lstGenre[$i]->libelle_Genre."</a></li>");
		}
		?>
		</ul>
	</form>	
</div>
<script type="text/javascript">
	active("menuLB");
</script>

<?php
include("footer.php");
?>