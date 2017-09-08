<main>
	<h1>Réservation</h1>
	<section id="reservation">
		<p>Veuillez remplir le formulaire suivant afin de réserver une table dans notre restaurant:</p>
		<?php if(isset($message)): ?>
			<span class="warning"><?= $message ?></span>		
		<?php endif ?>
		<?php require_once('views/client/form_reservations.php'); ?>
	</section>
</main>