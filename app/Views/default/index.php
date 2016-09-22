	<?php $this->layout('layout_projet', ['title' => $title]) ?>
	
	
	<?php $this->start('droite') ;?>
	<ul id="placesList">
		<?php foreach($allAdverts as $advert): 

		$date=date_create_from_format('Y-m-d',$advert['event_date']);	
		$eventDate=$date->format('d/m');

		$date_post=date_create_from_format('Y-m-d H:i:s',$advert['advert_post_date']);
		$advert_post_date=$date_post->format('d/m');

		$date=date_create_from_format('H:i:s',$advert['event_time']);	
		$eventTime=$date->format('H\hi');	
		$dataTime=$date->format('H\hi');	
		$dataUrl=$this->url('view_advert', ['id' => $advert['id']]);

		$coords=explode(";", $advert['place']);	

		?>
		

		<li data-lat=<?= $coords[0] ?> data-lng=<?= $coords[1] ?> data-sport=<?= $advert['sport'] ?> data-date=<?= $eventDate ?> data-time=<?= $dataTime ?> data-participant=<?= $advert['remain_participant'] ?> data-level=<?= $advert['level'] ?> data-dUrl=<?= $dataUrl ?> data-color=<?= $advert['bkg_color'] ?>>
			<a href="<?= $this->url('view_advert', ['id' => $advert['id']]) ?>">
				<div class="row">
					<div class="col-md-2"><img src="<?= $this->assetUrl("img/" . $advert['logo'] . "") ?>" alt="" ></div>
					<!-- <h2><?= $sport ?></h2> -->
					<div class="col-md-9"><p class="level">Pour <?= $advert['level'] ?></p>
						<!-- <p class="level">Pour les <?= $advert['level'] ?></p> -->
						<p class="date_event">Le <?= $eventDate." à ".$eventTime ?></p>

						<p class="organizer">Postée par <?= $advert['firstname'] ?>, le <?= $advert_post_date ?></p>
					</div>
					<div class="col-md-1">
						<p class="dispo_event"><?= $advert['remain_participant'] ?></p>
					</div>
				</div>
			</a>
		</li>
	<?php endforeach; ?>
</ul>
<?php $this->stop('droite') ?>

<!-- ////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////// -->

<?php $this->start('gauche') ?>
<div id="map" class="big-map" >
	Chargement en cours...
</div>
<?php $this->stop('gauche') ?>

<!-- ////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- /////////////////////////////////////////////////////////////////////////////////////////// -->


<?php $this->start('scripts') ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA082QH94snG4T-XIsT6ayEukK-g5mNArg&libraries=places&callback=initMap"
async defer></script>
<script type="text/javascript" src= <?= $this->assetUrl('js/map-icons.min.js') ?> ></script>
<script type="text/javascript" src= <?= $this->assetUrl('js/index.js') ?> ></script>
<?php $this->stop('scripts') ?>


