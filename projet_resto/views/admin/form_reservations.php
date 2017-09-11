<form action="index.php?controller=admins&task=reserver" method="POST">
	<input type="text" name="clientFirstName" id="clientFirstName" placeholder="Votre prénom" <?php if(!empty($_POST['clientFirstName'])): ?> value="<?= $_POST['clientFirstName'] ?>" <?php endif ?>>

	<input type="text" name="clientLastName" id="clientLastName" placeholder="Votre nom"<?php if(!empty($_POST['clientLastName'])): ?> value="<?= $_POST['clientLastName'] ?>" <?php endif ?>>

	<label for="nbPersonnes">Nombre de personnes prévues :</label>
	<input type="number" name="nbPersonnes" id="nbPersonnes"<?php if(!empty($_POST['nbPersonnes'])): ?> value="<?= $_POST['nbPersonnes'] ?>" <?php else: ?> value="1" <?php endif ?>  min="1" max="100">

	<input type="email" name="clientEmail" id="clientEmail" placeholder="Votre email"<?php if(!empty($_POST['clientEmail'])): ?> value="<?= $_POST['clientEmail'] ?>"<?php endif ?>>

	<input type="date" name="date" id="date" <?php if(!empty($_POST['date'])): ?> value="<?= $_POST['date'] ?>" <?php endif ?>>

	<select name="heure" id="heure">
		<option value="11:00:00" <?php if(!empty($_POST['heure']) && ($_POST['heure'] == '11:00:00')): ?> checked <?php endif ?>>11:00</option>
		<option value="11:30:00" <?php if(!empty($_POST['heure']) && ($_POST['heure'] == '11:30:00')): ?> checked <?php endif ?>>11:30</option>
		<option value="12:00:00" <?php if(!empty($_POST['heure']) && ($_POST['heure'] == '12:00:00')): ?> checked <?php endif ?>>12:00</option>
		<option value="12:30:00" <?php if(!empty($_POST['heure']) && ($_POST['heure'] == '12:30:00')): ?> checked <?php endif ?>>12:30</option>
		<option value="13:00:00" <?php if(!empty($_POST['heure']) && ($_POST['heure'] == '13:00:00')): ?> checked <?php endif ?>>13:00</option>
		<option value="13:30:00" <?php if(!empty($_POST['heure']) && ($_POST['heure'] == '13:30:00')): ?> checked <?php endif ?>>13:30</option>
		<option value="19:00:00" <?php if(!empty($_POST['heure']) && ($_POST['heure'] == '19:00:00')): ?> checked <?php endif ?>>19:00</option>
		<option value="19:30:00" <?php if(!empty($_POST['heure']) && ($_POST['heure'] == '19:30:00')): ?> checked <?php endif ?>>19:30</option>
		<option value="20:00:00" <?php if(!empty($_POST['heure']) && ($_POST['heure'] == '20:00:00')): ?> checked <?php endif ?>>20:00</option>
		<option value="20:30:00" <?php if(!empty($_POST['heure']) && ($_POST['heure'] == '20:30:00')): ?> checked <?php endif ?>>20:30</option>
		<option value="21:00:00" <?php if(!empty($_POST['heure']) && ($_POST['heure'] == '21:00:00')): ?> checked <?php endif ?>>21:00</option>
		<option value="21:30:00" <?php if(!empty($_POST['heure']) && ($_POST['heure'] == '21:30:00')): ?> checked <?php endif ?>>21:30</option>
		<option value="22:00:00" <?php if(!empty($_POST['heure']) && ($_POST['heure'] == '22:00:00')): ?> checked <?php endif ?>>22:00</option>
		<option value="22:30:00" <?php if(!empty($_POST['heure']) && ($_POST['heure'] == '22:30:00')): ?> checked <?php endif ?>>22:30</option>
	</select>
	<span id="disponibilite"></span>
	<button type="submit">Réserver</button>
</form>
