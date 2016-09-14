<?php 
// On charge le layout
 $this->layout('layout', ['title' => $title, 'message' => $message]);



// On place le contenu de la vue
$this->start('main_content') ?>

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
	<input type="text" id="datepicker" name="birthdate"></input><br>
	
		<br><br>

            <label for="login">Email</label><br>
            <input placeholder="Votre Email" type="text" name="email"><br><br>

            <label for="login">Mot de passe</label><br>
            <input placeholder="Choisissez un mot de passe" type="password" name="password">
            <br><br>

            <input type="submit" value="S'inscrire">   
        </form>
  </div>

</div> 

<!-- // fin du contenu de la vue -->
<?php $this->stop('main_content');  ?>


  <?php $this->start('scripts') ?>
   <script>
       $( function() {
          // SELECT
          $( "#gender" ).selectmenu();
              $( "#datepicker" ).datepicker({
                yearRange: "c-50:c-20",
                changeMonth: true,
                
                changeYear: true

              });
        });

   </script>
  <?php $this->stop('scripts') ?>
