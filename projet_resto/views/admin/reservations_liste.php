<main id="listeReservationsAdmin">
	<h1>Liste des réservations</h1>
	<section>
		<?php require('views/admin/form_reservations.php') ?>
		<table>
			<thead>
				<tr>
					<th>Nom et prénom client</th>
					<th>Email</th>
					<th>Nombre de personne</th>
					<th>Date et Heure</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($reservations as $key => $reservation): ?>
					<tr>
						<td><?= ucfirst($reservation['firstName']) ?> <?= strtoupper($reservation['lastName']) ?></td>
						<td><?= $reservation['email'] ?></td>
						<td><?= $reservation['nb_personnes'] ?></td>
						<td><?= $reservation['date_wished'] ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</section>
</main>
