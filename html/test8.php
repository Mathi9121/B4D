<?php
include("menu.php");
?>
<html>
	<head>
		<style type="text/css">
			ul {
				background: blue;
				padding: 0;
				margin: 10px;

			}
			li:first-child{
				border-top: 1px solid black;
			}
			li{

				overflow: hidden;
				text-align: left;
				color: white;
				border-bottom: 1px solid black;
				border-right: 1px solid black;
				border-left: 1px solid black;
				list-style: none;

			}
			ul li:hover{
				background: red;
				transition: 0.6s ease;
			}
			p{
				margin: 5px 0;
			}
			a{
				text-decoration: none;
				color: black;
				margin: 5px;
			}
			p a img{
				width: 30px !important;
				float: left;
				margin-left: 5px;
				margin-bottom: 5px;
			}
			ul li p #chap{
				display: block;
				margin-left: 45px;
			}

		</style>
	</head>
	<body>
		<p>
			Raptim igitur properantes ut motus sui rumores celeritate nimia praevenirent, vigore corporum ac levitate confisi per flexuosas semitas ad summitates collium tardius evadebant. et cum superatis difficultatibus arduis ad supercilia venissent fluvii Melanis alti et verticosi, qui pro muro tuetur accolas circumfusus, augente nocte adulta terrorem quievere paulisper lucem opperientes. arbitrabantur enim nullo inpediente transgressi inopino adcursu adposita quaeque vastare, sed in cassum labores pertulere gravissimos.

			Quibus occurrere bene pertinax miles explicatis ordinibus parans hastisque feriens scuta qui habitus iram pugnantium concitat et dolorem proximos iam gestu terrebat sed eum in certamen alacriter consurgentem revocavere ductores rati intempestivum anceps subire certamen cum haut longe muri distarent, quorum tutela securitas poterat in solido locari cunctorum.

			Principium autem unde latius se funditabat, emersit ex negotio tali. Chilo ex vicario et coniux eius Maxima nomine, questi apud Olybrium ea tempestate urbi praefectum, vitamque suam venenis petitam adseverantes inpetrarunt ut hi, quos suspectati sunt, ilico rapti conpingerentur in vincula, organarius Sericus et Asbolius palaestrita et aruspex Campensis.

			Iamque lituis cladium concrepantibus internarum non celate ut antea turbidum saeviebat ingenium a veri consideratione detortum et nullo inpositorum vel conpositorum fidem sollemniter inquirente nec discernente a societate noxiorum insontes velut exturbatum e iudiciis fas omne discessit, et causarum legitima silente defensione carnifex rapinarum sequester et obductio capitum et bonorum ubique multatio versabatur per orientales provincias, quas recensere puto nunc oportunum absque Mesopotamia digesta, cum bella Parthica dicerentur, et Aegypto, quam necessario aliud reieci ad tempus.
		</p>
		<div class="styled-select black rounded">
  <select>
    <option>Here is the first option</option>
    <option>The second option</option>
    <option>The third option</option>
  </select>
</div>
<p>Articles de l'année <time datetime="2012">2012</time></p>
<ul>
	<li>
		<p>
			<a href=""><img src='../images/harry_potter.jpg' alt=''/></a>
			<a href="">Harry Potter</a>
			<a href="">par anna le 02-03-2018</a>
			<span id="chap"><a href="">Chapitre 4</a></span>
		</p>
	</li>
	<li>
		<p>
			<a href=""><img src='../images/harry_potter.jpg' alt=''/></a>
			<a href="">Harry Potter</a>
			<a href="">par anna le 02-03-2018</a>
			<a href="">Chapitre 4</a>
		</p>
	</li>
</ul>
</body>
</html>