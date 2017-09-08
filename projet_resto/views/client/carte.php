<main id="carte">
	<h1>Notre carte</h1>
	<?php foreach ($mealsTypes as $key => $type): ?>
		<div>
			<h3><?= $type['name'] ?></h3>
			<section class="flex spaceAround flexWrap">
				<?php foreach ($meals as $key => $meal): ?>
					<?php if($meal['meal_type'] == $type['id']): ?>
						<?php require('views/client/vignette.php') ?>
					<?php endif ?>
				<?php endforeach ?>
			</section>
		</div>
	<?php endforeach ?>
</main>
<?php require('views/client/panier.php') ?>
<script type="text/javascript" src="js/client/script_carte.js"></script>

