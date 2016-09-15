<?php 

// On charge le layout
 $this->layout('layout', ['title' => $title, 'message' => $message]); ?>



<?php $this->start('bas-gauche') ?>		
	<?php 
	var_dump($adverts);
	?>
<?php $this->stop('bas-gauche') ?>


<?php $this->start('droite') ?>
	<?php
		var_dump($profil);
	?>
<?php $this->stop('droite');  
// fin du contenu de la vue


