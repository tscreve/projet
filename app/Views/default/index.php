<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<h2>Let's cod</h2>
	<p>Vous avez atteint la page d'accueil. Bravo.</p>
	<p>Et maintenant, RTFM dans <strong><a href="../docs/tuto/" title="Documentation de W">docs/tuto</a></strong>.</p>


	<div id="adress">Détection mais aucune données affichées...</div>





	<input id="pac-input" class="controls" type="text" placeholder="Search Box">

	<div id="map">
    	Chargement en cours...
 	</div>
<?php $this->stop('main_content') ?>





<?php $this->start('scripts') ?>

	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA082QH94snG4T-XIsT6ayEukK-g5mNArg&libraries=places&callback=initMap"
         async defer></script>

        <script type="text/javascript" src= <?= $this->assetUrl('js/app.js') ?> ></script>
<?php $this->stop('scripts') ?>


