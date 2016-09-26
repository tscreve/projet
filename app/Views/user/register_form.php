<?php 
// On charge le layout
$this->layout('layout_center', ['title' => $title, 'message' => $message]);

// On place le contenu de la vue
$this->start('center') ?>
<div class="light-box">
    <form class="register-form" method="POST" action="<?= $this->url('user_add_user')?>"> 
        <label for="gender">Je suis</label>
        <select name="gender" id="gender">
            <option value="m" selected="selected">Un homme</option>
            <option value="f">Une femme</option>         
        </select>

        <label for="Prenom">Prenom</label>
        <input type="text" name="firstname" placeholder="prenom" required>

    	<label for="date de naissance">Date d'anniversaire :</label>
    	<input type="text" id="datepicker" name="birthdate" required>
    	
        <label for="login">Email</label>
        <input type="email" name="email" placeholder="Votre Email" >

        <label for="login">Mot de passe</label>
        <input type="password" name="password" placeholder="Choisissez un mot de passe" >

        <input type="submit" class="btn btn-warning" value="S'inscrire">

        <p class="links"><a href="<?= $this->url('user_login_form') ?>">Connectez-vous</a> ou <a href="<?= $this->url('default_index') ?>">Retournez à l'accueil</a></p>
    </form>
</div>


<!-- // fin du contenu de la vue -->
<?php $this->stop('center');  ?>


  <?php $this->start('scripts') ?>
   <script>
       $( function() {
          // SELECT
          $( "#gender" ).selectmenu();
              $( "#datepicker" ).datepicker({
                yearRange: "1966:2000",
                changeMonth: true,                
                changeYear: true
              });
        });

   </script>
  <?php $this->stop('scripts') ?>
