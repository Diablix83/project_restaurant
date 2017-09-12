<main id="inscription">
	<h1>Inscription</h1>
	<section>
		<?php if(isset($message)): ?>
			<p><?= $message ?></p>
		<?php endif ?>
		<form class="flex flexColumn" action="index.php?controller=client&task=addUser" method="POST">
			<input type="text" name="firstName" id="firstName" placeholder="Votre prénom">
			<input type="text" name="lastName" id="lastName" placeholder="Votre nom">
			<input type="email" name="email" id="email" placeholder="Votre email">
			<input type="password" name="password" id="password" placeholder="Votre mot de passe">
			<input type="password" name="confirmpassword" id="confirmpassword" placeholder="Confirmer votre mot de passe">
			<input type="number" name="postalCode" id="postalCode" min="0" placeholder="Votre code postal">
			<input type="text" name="adress" id="adress" placeholder="Votre adresse">
			<textarea name="message" id="message" placeholder="Si vous avez un message (ex: appeler l'appartement n°23)"></textarea>
			<button type="submit">S'inscrire</button>
		</form>
	</section>
</main>

