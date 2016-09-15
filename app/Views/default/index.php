	<?php $this->layout('layout_projet', ['title' => 'Accueil']) ?>
	
	
	<?php $this->start('droite') ?>
	<ul>
		<?php foreach($coordsPlaces as $coordsPlace): 
			// var_dump($coordslPlace['place']);
			$coords=explode(";", $coordsPlace['place']);
			// var_dump($coords[0]);
			// var_dump($coords[1]);	
	<?php $this->start('places_list') ?>
	<ul id="placesList">
	<?php  ?>
		<?php 

			foreach($allAdverts as $advert): 
				$idSport=$advert['id_sport'];
				$sport=$allSports[$idSport]['name'];


				$coords=explode(";", $advert['place']);	




		?>
		<li data-lat=<?= $coords[0] ?> data-lng=<?= $coords[1] ?>>
		<h2><?= $sport ?></h2>	
		<p><?= $advert['description'] ?></p>
		<p>Pour les <?= $advert['level'] ?></p>
		<p>Le <?= $advert['event_date'] ?></p>
		<p>à <?= $advert['event_time'] ?></p>
		<p>Besoin de <?= $advert['nb_participant'] ?> participants</p>
		<p>Annonce postée le <?= $advert['advert_post_date'] ?></p>
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


