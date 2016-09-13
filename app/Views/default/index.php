	<?php $this->layout('layout', ['title' => 'Accueil']) ?>
	
	
	<?php $this->start('places_list') ?>
		<?php foreach($coordsPlaces as $coordsPlace): 
			// var_dump($coordslPlace['place']);
			$coords=explode(";", $coordsPlace['place']);
			// var_dump($coords[0]);
			// var_dump($coords[1]);	
		?>
		<li data-lat=<?= $coords[0] ?> data-lng=<?= $coords[1] ?>>		
		</li>
		<?php endforeach; ?>
	<?php $this->stop('places_list') ?>

<!-- ////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////// -->

	<?php $this->start('main_content') ?>

		<h2>Let's cod</h2>
		<p>Vous avez atteint la page d'accueil. Bravo.</p>
		

		<div id="adress">Détection mais aucune données affichées...</div>

		<div id="map">
	    	Chargement en cours...
	 	</div>
	<?php $this->stop('main_content') ?>

<!-- ////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////// -->


	<?php $this->start('scripts') ?>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA082QH94snG4T-XIsT6ayEukK-g5mNArg&libraries=places&callback=initMap"
	         async defer></script>
	    <script type="text/javascript" src= <?= $this->assetUrl('js/index.js') ?> ></script>
	<?php $this->stop('scripts') ?>


