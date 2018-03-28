<?php
for ($i=0; $i < sizeof($selT); $i++) { 
	if ($selT[$i]->id_Type == 1) { $lecteur = ""; }
	if ($selT[$i]->id_Type == 2) { $administrateur = ""; }
	if ($selT[$i]->id_Type == 3) { $dessinateur = ""; }
	if ($selT[$i]->id_Type == 4) { $traducteur = ""; }
}
if (isset($lecteur)) { 
	if (isset($dessinateur) || isset($traducteur)) {
		if (isset($administrateur)) { header('Location:validationBD.php'); }
		else{ header('Location:travaux.php'); }
	}
	elseif (isset($administrateur)) { header('Location:validationBD.php'); }
	else{ header('Location:suivis.php'); }
}
else{ header('Location:info.php'); }
?>