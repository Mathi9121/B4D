<?php
include("menu.php");
?>
<html>
	<head>
		<style type="text/css">
			img{
				width: 10px;
			}
			input[type='password'] {
			    background-image: url(../images/editer.png);
			    background-position: 7px 7px;
			    background-repeat: no-repeat;
			}
		</style>
	</head>
	<body>
		<p>Raptim igitur properantes ut motus sui rumores celeritate nimia praevenirent, vigore corporum ac levitate confisi per flexuosas semitas ad summitates collium tardius evadebant. et cum superatis difficultatibus arduis ad supercilia venissent fluvii Melanis alti et verticosi, qui pro muro tuetur accolas circumfusus, augente nocte adulta terrorem quievere paulisper lucem opperientes. arbitrabantur enim nullo inpediente transgressi inopino adcursu adposita quaeque vastare, sed in cassum labores pertulere gravissimos.

Quibus occurrere bene pertinax miles explicatis ordinibus parans hastisque feriens scuta qui habitus iram pugnantium concitat et dolorem proximos iam gestu terrebat sed eum in certamen alacriter consurgentem revocavere ductores rati intempestivum anceps subire certamen cum haut longe muri distarent, quorum tutela securitas poterat in solido locari cunctorum.

Principium autem unde latius se funditabat, emersit ex negotio tali. Chilo ex vicario et coniux eius Maxima nomine, questi apud Olybrium ea tempestate urbi praefectum, vitamque suam venenis petitam adseverantes inpetrarunt ut hi, quos suspectati sunt, ilico rapti conpingerentur in vincula, organarius Sericus et Asbolius palaestrita et aruspex Campensis.

Iamque lituis cladium concrepantibus internarum non celate ut antea turbidum saeviebat ingenium a veri consideratione detortum et nullo inpositorum vel conpositorum fidem sollemniter inquirente nec discernente a societate noxiorum insontes velut exturbatum e iudiciis fas omne discessit, et causarum legitima silente defensione carnifex rapinarum sequester et obductio capitum et bonorum ubique multatio versabatur per orientales provincias, quas recensere puto nunc oportunum absque Mesopotamia digesta, cum bella Parthica dicerentur, et Aegypto, quam necessario aliud reieci ad tempus.</p>
		<label for="txtMdpActuel" class="labelCheck">Mot de passe actuel</label>
		<input type="password" id="txtMdpActuel" name="txtMdpActuel">
		<img src='../images/editer.png' alt=''/>
		<input type="checkbox" name="affichertxtMdpActuel" id="affichertxtMdpActuel" onchange="montreMdp('txtMdpActuel', this);">
		<label for="affichertxtMdpActuel" class="labelCheck">Afficher le mot de passe</label><br />	
	</body>
</html>