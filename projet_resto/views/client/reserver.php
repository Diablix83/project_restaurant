<main>
	<h1>Réservation</h1>
	<section id="reservation">
		<p>Merci d'avoir réserver une table dans notre restaurant. Pour rappel voici ce que vous venez de renseigner :</p>
		<p>Table pour <?= $recapitulatif['nb_personnes'] ?> personne<?php if($recapitulatif['nb_personnes'] > 1): ?>s<?php endif ?> au nom de <?= ucfirst($recapitulatif['firstName']) ?> <?= strtoupper($recapitulatif['lastName']) ?> le <?= $recapitulatif['date_wished'] ?></p>
		<?php require_once('views/client/form_reservations.php'); ?>

	</section>
</main>