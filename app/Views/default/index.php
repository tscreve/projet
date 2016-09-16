	<?php $this->layout('layout', ['title' => 'Accueil']) ?>
	
	
	<?php $this->start('droite') ?>
	<ul id="placesList">
	<?php // var_dump($allAdverts); ?>
		<?php foreach($allAdverts as $advert): 	
			$date=date_create_from_format('Y-m-d',$advert['event_date']);	
			$eventDate=$date->format('d/m');
			$date=date_create_from_format('H:i:s',$advert['event_time']);	
			$eventTime=$date->format('H\h i\m\i\n');	
			$dataTime=$date->format('H\hi');	

			$coords=explode(";", $advert['place']);	
		?>
		<a href="<?= $this->url('view_advert', ['id' => $advert['id']]) ?>">
		<li data-lat=<?= $coords[0] ?> data-lng=<?= $coords[1] ?> data-sport=<?= $advert['sport'] ?> data-date=<?= $eventDate ?> data-time=<?= $dataTime ?> data-participant=<?= $advert['nb_participant'] ?> data-level=<?= $advert['level'] ?>>	
		<h2><?= $advert['sport'] ?></h2>
		<p>Pour les <?php switch($advert['level']){
			case 'debutant':
				echo "débutants";
				break;
			case 'amateur':
				echo "amateurs";
				break;
			case 'confirme':
				echo "confirmés";
				break;
		}
		 ?></p>
		<p>Prévu pour le <?= $eventDate." à ".$eventTime ?></p>
		<p>Besoin de <?= $advert['nb_participant'] ?> participants</p>		
		</a>
		</li>
		<?php endforeach; ?>
	</ul>
	<?php $this->stop('droite') ?>

<!-- ////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////// -->

	<?php $this->start('bas-gauche') ?>
		<div id="map" >
	    	Chargement en cours...
	 	</div>
	<?php $this->stop('bas-gauche') ?>

<!-- ////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////// -->


	<?php $this->start('scripts') ?>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA082QH94snG4T-XIsT6ayEukK-g5mNArg&libraries=places&callback=initMap"
	         async defer></script>
	    <script type="text/javascript" src= <?= $this->assetUrl('js/index.js') ?> ></script>
	<?php $this->stop('scripts') ?>


