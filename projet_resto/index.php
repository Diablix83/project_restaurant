<?php
	session_start();

	require_once('configuration.php');

	$controller_type = 'ClientController';

	if(!empty($_GET['controller'])){
		$controller_type = ucfirst($_GET['controller']) . 'Controller';
	}

	$task = 'accueil';

	if(!empty($_GET['task'])){ $task = $_GET['task']; }

	$controller = new $controller_type();
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Slabo+27px" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

		<title>Notre titre de page</title>
	</head>
	<body>
		<?php require_once('views/partial/header.php') ?>
		<?php $controller->$task() ?>
		<?php require_once('views/partial/footer.php') ?>

		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>