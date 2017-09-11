<article class="flex flexColumn spaceBetween" data-product-id="<?= $meal['id'] ?>" data-sale-price="<?= $meal['salePrice'] ?>" data-quantity-in-stock="<?= $meal['quantityInStock'] ?>">
	<img src="img/meals/<?= $meal['photo'] ?>" alt="<?= $meal['name'] ?>">
	<div>
		<h4><?= $meal['name'] ?></h4>
		<span class="prixUnitaire"><?= $meal['salePrice'] ?> €</span>
		<div class="quantity flex flexRow spaceBetween alignItemsCenter">
			<a href="index.php?controller=admins&task=details&id=<?= $meal['id'] ?>">Détails</a>
			<a href="index.php?controller=admins&task=delete&id=<?= $meal['id'] ?>">Supprimer</a>
		</div>
	</div>
</article>