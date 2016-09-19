	<?php 

	// VUE DES FILMS - APPELEE PAR movie#index (/app/Controller/MovieController.php)

	// On charge le layout
	$this->layout('layout_projet', ['title' => $title]); ?>








<?php $this->start('gauche') ?>

 <!-- Modal content -->
  <div class="modal-content">
	 <h2 class="titre_inscription">Inscription</h2>
     <form class="login-form" method="POST" action="<?= $this->url('user_add_user')?>"> 


    <label for="gender">Je suis :</label><br>
        <select name="gender" id="gender">
          <option value="m" selected="selected">Un homme</option>
          <option value="f">Une femme</option>         
        </select>
    <br><br>

      <label for="Prenom">Prenom</label><br>
      <input placeholder="prenom" type="text" name="firstname" >
			<br>

	<label for="date de naissance">Date d'anniversaire :</label><br>
	<input type="text" id="datepicker" name="birthdate"><br>
	
		<br><br>

            <label for="login">Email</label><br>
            <input placeholder="Votre Email" type="text" name="email"><br><br>

            <label for="login">Mot de passe</label><br>
            <input placeholder="Choisissez un mot de passe" type="password" name="password">
            <br><br>

            <input type="submit" value="S'inscrire">   
        </form>
  </div>

<?php $this->stop('gauche');  ?>






	// On place le contenu de la vue
<?php $this->start('droite') ?>
	

		


	<form class="login-form" method="POST" action="<?= $this->url('user_login')?>"> 
	<label for="email">Email</label> 
	<input placeholder="Votre email" type="text" name="email">

	<label for="password">Mot de passe</label> 
	<input placeholder="Votre mot de passe" type="password" name="password">

	<input type="submit" value="Se connecter">   
	<hr><hr>
	<a href="<?= $this->url('user_register_form') ?>">Enregistrez vous</a>
	</form>


<?php $this->stop('droite');  	?>
	// fin du contenu de la vue


