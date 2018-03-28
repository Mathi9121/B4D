<?php
$ps = $utilisateur->getById($repListe[$k]->id_Utilisateur);
$ch = $chapitre->getCountByBD($repListe[$k]->id_BD);
echo "<li><p>";
echo ("<a href='lecture.php?idL=".$repListe[$k]->id_BD."'><img src='../images/".$repListe[$k]->couverture_BD."' alt='".$repListe[$k]->titre_BD."'/></a>");
echo ("<a id='titreTaille' href='lecture.php?idL=".$repListe[$k]->id_BD."'>".$repListe[$k]->titre_BD."</a>") ;
echo ("par<a href=''>".$ps[0]->pseudo_Utilisateur."</a>");
echo ("le<a href=''>".$repListe[$k]->date_Creation_BD."</a>");
echo ("<a href='lecture.php?idL=".$repListe[$k]->id_BD."'><span>Chapitre ".$ch[0]->num."</span></a>");
/*$idG = $bg->getById($repListe[$k]->id_BD, "BD");
for ($j=0; $j < sizeof($idG); $j++) {
	$p = $genre->getById($idG[$j]->id_Genre);
	echo $p[0]->libelle_Genre." - ";
}
$idL = $bl->getById($repListe[$k]->id_BD, "BD");
for ($j=0; $j < sizeof($idL); $j++) { 
	$p = $langue->getById($idL[$j]->id_Langue);
	echo $p[0]->libelle_Langue." - ";
}*/
echo "</p></li>";

?>