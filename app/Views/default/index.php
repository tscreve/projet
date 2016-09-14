	<?php $this->layout('layout_projet', ['title' => 'Accueil']) ?>
	
	
	<?php $this->start('droite') ?>
	<ul>
		<?php foreach($coordsPlaces as $coordsPlace): 
			// var_dump($coordslPlace['place']);
			$coords=explode(";", $coordsPlace['place']);
			// var_dump($coords[0]);
			// var_dump($coords[1]);	
		?>
		<li data-lat=<?= $coords[0] ?> data-lng=<?= $coords[1] ?>>		
		</li>
		<?php endforeach; ?>
	</ul>
	<?php $this->stop('droite') ?>

<!-- ////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////// -->

	<?php $this->start('gauche') ?>
		<div id="map">
	    	Chargement en cours...
	 	</div>
	<?php $this->stop('gauche') ?>

<!-- ////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////// -->


	<?php $this->start('scripts') ?>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA082QH94snG4T-XIsT6ayEukK-g5mNArg&libraries=places&callback=initMap"
	         async defer></script>
	    <script type="text/javascript" src= <?= $this->assetUrl('js/index.js') ?> ></script>
	<?php $this->stop('scripts') ?>


