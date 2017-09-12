<aside id="listeCategoriesAdmin">
	<h2>Liste des catégories</h1>
	<form action="index.php?controller=admins&task=addCategory" method="POST">
		<input type="text" name="nameCategory" id="nameCategory" placeholder="Nom de votre nouvelle catégorie">
		<button type="submit">Ajouter</button>
	</form>

	<?php foreach ($mealsTypes as $key => $type): ?>
		<div class="flex flexRow spaceBetween alignItemsCenter">
			<p><?= $type['name'] ?></p>
			<form class="modifyCategory hide" action="index.php?controller=admins&task=modifyCategory&id=<?= $type['id'] ?>" method="POST">
				<input type="text" name="nameCategory" placeholder="Nom catégorie" value="<?= $type['name'] ?>">
				<button type="submit">Modifier</button>
			</form>
			<a class="supprimer" href="index.php?controller=admins&task=deleteCategory&id=<?= $type['id'] ?>">Supprimer</a>
		</div>
	<?php endforeach ?>
	<script type="text/javascript" src="js/admin/script_admin_categories.js"></script>
</aside>
