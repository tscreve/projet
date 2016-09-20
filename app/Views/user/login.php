	<?php 

	// VUE DES FILMS - APPELEE PAR movie#index (/app/Controller/MovieController.php)

	// On charge le layout
	$this->layout('layout_center', ['title' => $title]); ?>



<?php $this->start('center') ?>

	<form class="login-form" method="POST" action="<?= $this->url('user_login')?>"> 
		<label for="email">Email</label> 
		<input placeholder="Votre email" type="text" name="email">

		<label for="password">Mot de passe</label> 
		<input placeholder="Votre mot de passe" type="password" name="password">

		<input type="submit" value="Se connecter">   

		<a href="<?= $this->url('user_register_form') ?>">Enregistrez vous</a>
	</form>

<?php $this->stop('center');  ?>


