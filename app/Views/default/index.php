	<?php $this->layout('layout', ['title' => 'Accueil']) ?>
	
	
	<?php $this->start('droite') ?>
	<ul id="placesList">
		<?php foreach($allAdverts as $advert): 
			
			$idSport=$advert['id_sport'];
			$sport=$allSports[$idSport]['name'];
			$coords=explode(";", $advert['place']);	

		?>
		<a href="<?= $this->url('view_advert', ['id' => $advert['id']]) ?>">
		<li data-lat=<?= $coords[0] ?> data-lng=<?= $coords[1] ?>>
		<h2><?= $sport ?></h2>	
		<p><?= $advert['description'] ?></p>
		<p>Pour les <?php switch($advert['level']){
			case 'debutant':
				echo "Débutant";
				break;
			case 'amateur':
				echo "Amateur";
				break;
			case 'confirme':
				echo "Confirmé";
				break;
		}
		 ?></p>
		<p>Le <?= $advert['event_date'] ?></p>
		<p>à <?= $advert['event_time'] ?></p>
		<p>Besoin de <?= $advert['nb_participant'] ?> participants</p>
		<p>Annonce postée le <?= $advert['advert_post_date'] ?></p>
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


