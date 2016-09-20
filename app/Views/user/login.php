	<?php 

	// VUE DES FILMS - APPELEE PAR movie#index (/app/Controller/MovieController.php)

	// On charge le layout
	$this->layout('layout_center', ['title' => $title]); ?>



<?php $this->start('center') ?>
<div class="light-box">
	<form class="login-form" method="POST" action="<?= $this->url('user_login')?>"> 
		<label for="email">Email</label> 
		<input type="email" name="email" id="email" placeholder="Votre email">

		<label for="password">Mot de passe</label> 
		<input type="password" name="password" id="password" placeholder="Votre mot de passe" >

		<input type="submit" class="btn btn-success" value="Se connecter" id="button">   

		<a href="<?= $this->url('user_register_form') ?>">Inscrivez-vous</a>
	</form>
</div>
<?php $this->stop('center');  ?>


