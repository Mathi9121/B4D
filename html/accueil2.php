<?php
include ("menu.php");

$repListe = $bd->getListMois();
$nbBD = $bd->getList();
//var_dump($nbBD);

?>

<div id="accueil" class="divPrincipale">

	<div class="slideshow-container">
<?php
$k = 1;
while ($k <= 3) {
	for ($i=0; $i < sizeof($nbBD); $i++) {
		$r = rand(1, sizeof($nbBD));
		if ($r == $nbBD[$i]->id_BD) {
			$k++;
	?>
			<div class="mySlides fade">
			  <img src="../images/<?php echo $nbBD[$i]->couverture_BD; ?>">
			  <div class="text"><?php echo $nbBD[$i]->titre_BD; ?></div>
			</div>
<?php	
		}
	}
}
?>
	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
	<a class="next" onclick="plusSlides(1)">&#10095;</a>

	</div>
	<br>

	<div id="divDot">
	  <span class="dot" onclick="currentSlide(1)"></span> 
	  <span class="dot" onclick="currentSlide(2)"></span> 
	  <span class="dot" onclick="currentSlide(3)"></span> 
	</div>

	<h3>Dernières lectures</h3>
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
		for ($i=0; $i < sizeof($repListe); $i++) {
			$ps = $utilisateur->getById($repListe[$i]->id_Utilisateur);
			echo "<tr>";
			echo ("<td><img src='../images/".$repListe[$i]->couverture_BD."' alt='".$repListe[$i]->titre_BD."'/></td>");
			echo ("<td>".$repListe[$i]->titre_BD."</td>") ;
			echo ("<td>".$ps[0]->pseudo_Utilisateur."</td>");
			echo ("<td>");
			$idG = $bg->getById($repListe[$i]->id_BD, "BD");
			for ($j=0; $j < sizeof($idG); $j++) { 
				$p = $genre->getById($idG[$j]->id_Genre);
				echo $p[0]->libelle_Genre." - ";
			}
			echo ("</td>");
			echo ("<td>");
			$idL = $bl->getById($repListe[$i]->id_BD, "BD");
			for ($j=0; $j < sizeof($idL); $j++) { 
				$p = $langue->getById($idL[$j]->id_Langue);
				echo $p[0]->libelle_Langue." - ";
			}
			echo ("</td>");
			echo ("<td><a href='lecture.php?idL=".$repListe[$i]->id_BD."'>Lire</a></td>");
			echo "</tr>";
		}
		?>
	</table>
</div>
<script type="text/javascript">
showSlides(slideIndex);
active("menuA");
</script>
<?php
include("footer.php");
?>