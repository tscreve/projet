	<?php 

	// VUE DES FILMS - APPELEE PAR movie#index (/app/Controller/MovieController.php)

	// On charge le layout
	$this->layout('layout_user', ['title' => $title]);


	// On place le contenu de la vue
	$this->start('main_content') ?>
	

	<form class="login-form" method="POST" action="<?= $this->url('user_login')?>"> 
	<label for="email">Email</label> 
	<input placeholder="Votre email" type="text" name="email">

	<label for="password">Mot de passe</label> 
	<input placeholder="Votre mot de passe" type="password" name="password">

	<input type="submit" value="Se connecter">   
	</form>


	<?php $this->stop('main_content');  
	// fin du contenu de la vue


