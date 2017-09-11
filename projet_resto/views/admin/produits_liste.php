<main id="listeProduitAdmin">
	<h1>Liste des produits par types</h1>
	<a href="index.php?controller=admins&task=details"></a>
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
</main>
