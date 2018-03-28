<?php
session_start();
include ("menu.php");

if (isset($_GET['idP'])) {
	$repF = $post->getByForum($_GET['idP']);
	$selF = $forum->getById($_GET['idP']);
	if (sizeof($repF)>0) {
		if (isset($_POST['ajouterP'])) {
			if ($_SESSION['id']) {
					$nvF = $post->ajouter($_POST['txtMessage'], $_SESSION['id'], $_GET['idP']);
			}
			else{ header('Location:connect.php');}
		}
		include('viewPost.php');
	}
	else{
		if (isset($_POST['ajouterP'])) {
			if ($_SESSION['id']) {
				$nvF = $post->ajouter($_POST['txtMessage'], $_SESSION['id'], $_GET['idP']);
			}
			else{ header('Location:connect.php');}
		}
		include('viewPost.php');
	}
}

if (isset($_SESSION['idF'])) {
	if ($_SESSION['id']) {					
		$selF = $forum->getById($_SESSION['idF']);
		if (isset($_POST['ajouterP'])) {
			$nvF = $post->ajouter($_POST['txtMessage'], $_SESSION['id'], $_SESSION['idF']);
		}
		include('viewPost.php');
	}
}
?>

<?php
include("footer.php");
?>