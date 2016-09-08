<?php 

// VUE DES FILMS - APPELEE PAR movie#index (/app/Controller/MovieController.php)

// On charge le layout
 $this->layout('layout_user', ['title' => $title, 'message' => $message]);

// On place le contenu de la vue
$this->start('main_content') ?>
<?php // var_dump($message); ?>

<?php
		//affichage de l'utilisateur (BDD)
		//var_dump($user);
		echo '<hr>';
		//affichage de l'objet
		//var_dump($auth);
		//affichage des infos stockées en session
		var_dump($_SESSION);
	?>





<?php $this->stop('main_content');  
// fin du contenu de la vue


