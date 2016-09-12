<?php 

// VUE DES FILMS - APPELEE PAR movie#index (/app/Controller/MovieController.php)

// On charge le layout
 $this->layout('layout_user', ['title' => $title]);


// On place le contenu de la vue
$this->start('main_content') ?>

 
        <form class="login-form " method="POST" action="<?= $this->url('user_login')?>"> 
            <label for="login">Prenom</label> 
            <input placeholder="Choisissez un Login" type="text" name="prenom">

            <label for="login">Mot de passe</label> 
            <input placeholder="Choisissez un mot de passe" type="text" name="password">
 
            <input type="submit" value="Se connecter">   
        </form>
  

<?php $this->stop('main_content');  
// fin du contenu de la vue


