<article class="flex flexColumn spaceBetween" data-product-id="<?= $meal['id'] ?>" data-sale-price="<?= $meal['salePrice'] ?>" data-quantity-in-stock="<?= $meal['quantityInStock'] ?>">
	<div class="imgContainer">
		<img src="img/meals/<?= $meal['photo'] ?>" alt="<?= $meal['name'] ?>">
	</div>
	<div>
		<h4><?= $meal['name'] ?></h4>
		<span class="prixUnitaire"><?= $meal['salePrice'] ?> €</span>
		<div class="quantity flex flexRow spaceBetween alignItemsCenter">
			<input type="number" name="quantity" value="0" min="0" max="<?= $meal['quantityInStock'] ?>">
			<span class="prix"></span>
			<input type="submit" value="Ajouter">
		</div>
	</div>
</article>