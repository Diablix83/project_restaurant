<nav class="flex flexRow spaceAround">
	<a href="index.php?controller=client&task=accueil">Qui sommes-nous ?</a>
	<a href="index.php?controller=client&task=carte">La carte</a>
	<a href="index.php?controller=client&task=reservation">Réserver une table</a>
</nav>
<?php if(!empty($_SESSION['user'])): ?>
	<?php require_once('views/partial/nav_admin.php') ?>
<?php endif ?>