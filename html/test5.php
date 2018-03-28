<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../style/style.css"/>
	<script type="text/javascript" src="../js/script.js"></script>
	<style type="text/css">
body{
	padding: 10px;
}
.element{
	text-align: center;
	width: 50px;
}
.infobulle{
	font-size: 15px;
	transform : scale(0) rotateX(-180deg);
	position : absolute;
	background-color : black;
	color : white;
	border-radius : 5px;
	padding : 8px;
	margin-top : 10px;
	box-shadow : 1px 1px 0 0.5px rgba(0,0,0,0.3);
	transition : 1s;
}
.infobulle::before{
	content : '';
	position : absolute;
	border-bottom : 8px solid black;
	border-left : 8px solid transparent;
	border-right : 8px solid transparent;
	margin-top : -16px;
	margin-left : 10px;
}
.element:hover{
	cursor: pointer;
}
.element:hover > .infobulle{
	transform : scale(1) rotateX(0deg);
}
	</style>
</head>
<body>
	<label class="element">
			?
			<div class="infobulle">
				Votre mot de passe doit être compris entre 8 et 30 caractères.
			</div>	
		
		</label>
</body>





</html>