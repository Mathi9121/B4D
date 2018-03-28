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

	<div id="container">
		<?php
		for ($i=0; $i < sizeof($repListe); $i++) {
			$ps = $utilisateur->getById($repListe[$i]->id_Utilisateur);
			echo "<div class='iconeImg'>";
			echo "<a href='lecture.php?idL=".$repListe[$i]->id_BD."'>";
			echo ("<div id='iconeGauche'><img src='../images/".$repListe[$i]->couverture_BD."' alt='".$repListe[$i]->titre_BD."'/></div><br>");
			echo ("<div id='iconeDroit'><label>".$repListe[$i]->titre_BD."</label><br>") ;
			echo ("<label>".$ps[0]->pseudo_Utilisateur."</label></div><br>");
			echo ("</a>");
			echo ("<select>");
			$idG = $bg->getById($repListe[$i]->id_BD, "BD");
			for ($j=0; $j < sizeof($idG); $j++) { 
				$p = $genre->getById($idG[$j]->id_Genre);
				echo "<option value='".$p[0]->id_Genre."'>".$p[0]->libelle_Genre."</option>";
			}
			echo ("</select>");
			echo ("<select>");
			$idL = $bl->getById($repListe[$i]->id_BD, "BD");
			for ($j=0; $j < sizeof($idL); $j++) { 
				$p = $langue->getById($idL[$j]->id_Langue);
				echo "<option value='".$p[0]->id_Langue."'>".$p[0]->libelle_Langue."</option>";
			}
			echo ("</select>");
			
			echo "</div>";
		}
		?>
	</div>

</div>
<script type="text/javascript">
showSlides(slideIndex);
active("menuA");
</script>
<?php
include("footer.php");
?>