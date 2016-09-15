	<?php $this->layout('layout', ['title' => 'Détail de l\'annonce']) ?>	


	<?php $this->start('haut-gauche') ?>
		<section class="map">		
		<div id="map">
	    	Chargement en cours...
	 	</div>			
		</section>		

	<?php $this->stop('haut-gauche') ?>






	<?php $this->start('bas-gauche') ?>

	<?= 
		$coords="";
		$coords=explode(";", $advert['place']);
		var_dump($advert);	
	?>
	<input id="data-lat" type="text" style="display:none;" value=<?= $coords[0] ?>>
	<input id="data-lng" type="text" style="display:none;" value=<?= $coords[1] ?>>

	<h2><?= $advert['description'] ?></h2>
	<p><?= $advert['sport'] ?></p>

	<?php $this->stop('bas-gauche') ?>







	<?php $this->start('droite') ?>
		

	<?php $this->stop('droite') ?>



	






	<?php $this->start('scripts') ?>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA082QH94snG4T-XIsT6ayEukK-g5mNArg&libraries=places&callback=initMap"
	         async defer></script>
	    <script type="text/javascript" src= <?= $this->assetUrl('js/viewadvert.js') ?> ></script>
	<?php $this->stop('scripts') ?>


