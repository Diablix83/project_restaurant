<main id="adminProductDetails">
	<section>
		<form action="index.php?controller=admins&task=saveMeal<?php if(!empty($_GET['id'])): ?>&id=<?= $_GET['id'] ?><?php endif?>" method="POST">
			<label for="photo">Nom fichier image du produit: 
			<input type="text" name="photo" id="photo" placeholder="Nom image produit" 
				<?php if(!empty($meal['photo'])): ?>
					value="<?= $meal['photo'] ?>"
				<?php endif ?>
			></label>

			<label for="name">Nom du produit: 
			<input type="text" name="name" id="name" placeholder="Nom produit" 
				<?php if(!empty($meal['name'])): ?>
					value="<?= $meal['name'] ?>"
				<?php endif ?>
			></label>

			<label for="quantityInStock">Quantité en stock: 
			<input type="number" name="quantityInStock" id="quantityInStock" placeholder="Quantité en stock" min="0"
				<?php if(!empty($meal['quantityInStock'])): ?>
					value="<?= $meal['quantityInStock'] ?>"
				<?php endif ?>
			></label>

			<label for="buyPrice">Prix d'achat: 
			<input type="number" name="buyPrice" id="buyPrice" placeholder="Prix d'achat" step="0.05" min="0" 
				<?php if(!empty($meal['buyPrice'])): ?>
					value="<?= $meal['buyPrice'] ?>"
				<?php endif ?>
			></label>

			<label for="salePrice">Prix de vente: 
			<input type="number" name="salePrice" id="salePrice" placeholder="Prix de vente" step="0.05" min="0" 
				<?php if(!empty($meal['salePrice'])): ?>
					value="<?= $meal['salePrice'] ?>"
				<?php endif ?>
			></label>

			<select name="meal_type" id="meal_type">
				<?php foreach ($mealsTypes as $key => $type):?>
					<option value="<?= $type['id'] ?>"><?= $type['name'] ?></option>
				<?php endforeach ?>
			</select>

			<textarea name="description" id="description" placeholder="Description produit"><?php if(!empty($meal['description'])): ?><?= $meal['description'] ?><?php endif ?></textarea>
			<button type="submit">Enregistrer</button>
		</form>
	</section>
</main>