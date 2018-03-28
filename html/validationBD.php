<?php
session_start();
include ("menu.php");


if (isset($_SESSION['id'])) {
	include ("viewProfil.php");
	
	
}

?>

<div id="validationBD" class="divPrincipale">
	<form method="post" action="info.php">
		<?php include("viewSecondMenu.php") ?>
	</form>
</div>
<script type="text/javascript">
	active("menuMC");
</script>
<?php
include("footer.php");
?>