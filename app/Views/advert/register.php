	<?php $this->layout('layout', ['title' => 'Accueil']) ?>
	


		<?php $this->start('main_content') ?>
		<h2>Let's cod</h2>
		<p>Vous avez atteint la page d'accueil. Bravo.</p>
		

		<div id="adress">Détection mais aucune données affichées...</div>


		<form action="<?= $this->url('default_addPlace')?>" method="POST">
			<input id="data-lat" type="text" name="data-lat" style="display:none;">
			<input id="data-lng" type="text" name="data-lng" style="display:none;">
			
			<input type="submit" value="Enregistrer une annonce">
		</form>
		

		<input id="pac-input" class="controls" type="text" placeholder="Search Box">

		<div id="map">
	    	Chargement en cours...
	 	</div>
	<?php $this->stop('main_content') ?>


	<?php $this->start('scripts') ?>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA082QH94snG4T-XIsT6ayEukK-g5mNArg&libraries=places&callback=initMap"
	         async defer></script>
	    <script type="text/javascript" src= <?= $this->assetUrl('js/advertregister.js') ?> ></script>
	<?php $this->stop('scripts') ?>


