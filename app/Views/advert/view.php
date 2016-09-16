	<?php $this->layout('layout', ['title' => 'Détail de l\'annonce']) ?>	


	<?php $this->start('haut-gauche') ?>
		<section class="map">		
		<div id="map">
	    	Chargement en cours...
	 	</div>			
		</section>		

	<?php $this->stop('haut-gauche') ?>






	<?php $this->start('bas-gauche') ?>
	
	<h2>Détail de l'annonce</h2>
	<?= 
		$coords="";
		$coords=explode(";", $advert['place']);
		// var_dump($advert);	
		
	?>
	<input id="data-lat" type="text" style="display:none;" value=<?= $coords[0] ?>>
	<input id="data-lng" type="text" style="display:none;" value=<?= $coords[1] ?>>

	<p>Annonce pour <?= $advert['sport'] ?></p>
	<p>Détails :<br><?= $advert['description'] ?></p>
	<p>Niveau <?= $advert['level'] ?></p>
	<p>Le <?= $advert['event_date'] ?>
	à <?= $advert['event_time'] ?></p>
	<p><?= 
	$poster['firstname'] ?> cherche <?= $advert['nb_participant'] ?> sportifs</p>
	<p>Annonce postée le <?= $advert['advert_post_date'] ?></p>

	<?php $this->stop('bas-gauche') ?>



	<?php $this->start('droite') ?>
		<h2>Profil de l'organisateur</h2>
		<?php
		// var_dump($poster);	
		?>

		<p><?= $poster['firstname'] ?></p>
		<p><?= $poster['gender'] ?></p>
		<p><?= $poster['birthdate'] ?></p>
		<p><?= $poster['presentation'] ?></p>
		<p><?= $poster['register_date'] ?></p>



	<?php $this->stop('droite') ?>



	<?php $this->start('scripts') ?>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA082QH94snG4T-XIsT6ayEukK-g5mNArg&libraries=places&callback=initMap"
	         async defer></script>
	    <script type="text/javascript" src= <?= $this->assetUrl('js/viewadvert.js') ?> ></script>
	<?php $this->stop('scripts') ?>


