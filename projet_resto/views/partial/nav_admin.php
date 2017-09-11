<h3 id="navAdmin">Bienvenue <?= $_SESSION['user'] ?></h3>

<nav class="flex flexRow alignItemsCenter spaceAround">
	<a href="index.php?controller=admins&task=productList">Liste des produits</a>
	<a href="index.php?controller=admins&task=reservationsList">Liste des réservations</a>
	<a href="index.php?controller=admins&task=deconnexion">Déconnexion</a>
</nav>