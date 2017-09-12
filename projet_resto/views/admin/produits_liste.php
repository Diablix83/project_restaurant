<main class="flex flexRow spaceBetween alignItemsStart">
	<section id="listeProduitAdmin">
		<h1>Liste des produits par types</h1>
		<a class="ajouter" href="index.php?controller=admins&task=detailsProduct">Ajouter un produit</a>
		<?php foreach ($mealsTypes as $key => $type): ?>
			<div>
				<h3><?= ucfirst($type['name']) ?></h3>
				<section class="flex spaceAround flexWrap">
					<?php foreach ($meals as $key => $meal): ?>
						<?php if($meal['meal_type'] == $type['id']): ?>
							<?php require('views/admin/vignette.php') ?>
						<?php endif ?>
					<?php endforeach ?>
				</section>
			</div>
		<?php endforeach ?>
	</section>
	<?php require_once('views/admin/categories_liste.php') ?>
</main>
