<?php 

// VUE DES FILMS - APPELEE PAR movie#index (/app/Controller/MovieController.php)

// On charge le layout
 $this->layout('layout_user', ['title' => $title, 'message' => $message]);



// On place le contenu de la vue
$this->start('main_content') ?>

 <!-- Modal content -->
  <div class="modal-content">
	 <h2 class="titre_inscription">Inscription</h2>
     <form class="login-form" method="POST" action="<?= $this->url('user_add_user')?>"> 

	<!-- bouton radio pour determiner le sexe  -->
      <label for="Homme">H</label>
      <input type="radio" name="sexe" value="H">
      <label for="Femme">F</label>
      <input type="radio" name="sexe" value="F">
    <br><br>

      <label for="Prenom">Prenom</label><br>
      <input placeholder="prenom" type="text" name="firstname" >
			<br>

	<label for="date de naissance">Date d'anniversaire</label>
	<input type="text" placeholder="ex : 29/04/1993" name="birthdate" >
	
		<br><br>

            <label for="login">Email</label><br>
            <input placeholder="Votre Email" type="text" name="email"><br><br>

            <label for="login">Mot de passe</label><br>
            <input placeholder="Choisissez un mot de passe" type="text" name="password">
            <br><br>

            <input type="submit" value="S'inscrire">   
        </form>
  </div>

</div> 
<?php var_dump($_POST); ?>
<?php $this->stop('main_content');  
// fin du contenu de la vue


