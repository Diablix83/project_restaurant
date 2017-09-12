<nav class="flex flexRow spaceAround">
	<a href="index.php?controller=client&task=accueil">Qui sommes-nous ?</a>
	<a href="index.php?controller=client&task=carte">La carte</a>
	<a href="index.php?controller=client&task=reservation">Réserver une table</a>
	<?php if(!empty($_SESSION['user']) && ($_SESSION['user']['status_admin'] == false)): ?>
		<a href="index.php?controller=client&task=deconnexion">Deconnexion</a>
	<?php else: ?>
		<a href="index.php?controller=client&task=inscription">Inscription</a>
		<a href="index.php?controller=client&task=seconnecter">Connexion</a>
	<?php endif ?>
</nav>
<?php if(!empty($_SESSION['user']) && ($_SESSION['user']['status_admin'] == false)): ?>
	<h3 id="connectedUser">Bienvenue <?= $_SESSION['user']['email'] ?></h3>
<?php endif ?>
<?php if(!empty($_SESSION['user']) && ($_SESSION['user']['status_admin'] == true)): ?>
	<h3 id="connectedUser">Bienvenue Administrateur : <?= $_SESSION['user']['email'] ?></h3>
	<?php require_once('views/partial/nav_admin.php') ?>
<?php endif ?>