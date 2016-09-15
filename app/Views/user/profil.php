<?php 

// On charge le layout
 $this->layout('layout', ['title' => $title, 'message' => $message]); ?>

 <?php $this->start('haut-gauche') ?>
		<section class="map">		
		<div id="map">
	    	Chargement en cours...
	 	</div>			
		</section>		

	<?php $this->stop('haut-gauche') ?>




<?php $this->start('bas-gauche') ?>		
	<?php 
	var_dump($adverts);
	?>
<?php $this->stop('bas-gauche') ?>


<?php $this->start('droite') ?>
	<?php
		var_dump($profil);
	?>
<?php $this->stop('droite');  ?>


	<?php $this->start('scripts') ?>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA082QH94snG4T-XIsT6ayEukK-g5mNArg&libraries=places&callback=initMap"
	         async defer></script>
	    <script type="text/javascript" src= <?= $this->assetUrl('js/index.js') ?> ></script>
	<?php $this->stop('scripts') ?>


