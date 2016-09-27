<?php 
// On charge le layout
$this->layout('layout_projet', ['title' => 'Mon profil', 'message' => $message]); 

$defaultPhoto = "profil_default.jpg";
$photoUser = $_SESSION['user']['photo'];

?>


<?php $this->start('gauche') ?>		
	<div id="map" class="small-map">
	    Chargement en cours...
	</div>

<h2 class="titre-profil-annonce">Mes annonces</h2>
<div class="profil-annonce">
<ul id="placesList">
	<?php foreach($adverts as $advert): 
	$date=date_create_from_format('Y-m-d',$advert['event_date']);	
	$eventDate=$date->format('d/m');
	$date=date_create_from_format('H:i:s',$advert['event_time']);	
	$eventTime=$date->format('H \h i \m\i\n');
	$dataTime=$date->format('H\hi');
	$date=date_create_from_format('Y-m-d H:i:s',$advert['advert_post_date']);	
	$advertPostDate=$date->format('d/m \à H \h i \m\i\n');			
	$coords=explode(";", $advert['place']);	
	$dataUrl=$this->url('view_advert', ['id' => $advert['id']]);
	

	?>		
	<li data-lat=<?= $coords[0] ?> data-lng=<?= $coords[1] ?> data-sport=<?= $advert['sport'] ?> data-date=<?= $eventDate ?> data-time=<?= $dataTime ?> data-participant=<?= $advert['nb_participant'] ?> data-level=<?= $advert['level'] ?> data-dUrl=<?= $dataUrl ?> data-color="<?= $advert['bkg_color'] ?>">
		<div class="row">
			<div class="col-md-2">
				<img class="icone-sport" src="<?= $this->assetUrl("img/" . $advert['logo'] . "") ?>" alt="" style="background-color: <?= $advert['bkg_color'] ?>";>
			</div>
			<div class="col-md-8">
				<p>Détails :<br><?= $advert['description'] ?></p>		
				<p>Niveau : <?php switch($advert['level']){
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
				?>			
				</p>
				<p>Rdv le <?= $eventDate." à ".$eventTime ?></p>
				
				<p> Participants <?= $advert['nb_participant'] ?></p>
				<p>Postée le <?= $advertPostDate ?></p>
				<p>Statut :
					<?php
					switch($advert['statut']){
						case 'available':
						echo "en ligne";
						break;
						case 'not_available':
						echo "hors ligne";
						break;
					} 
					?>				
				</p>
			</div>
			<div class="col-md-2">
				<a href="<?= $this->url('user_delete_advert', ['id' => $advert['id']]) ?>"><button type="button" class="btn btn-danger">Supprimer</button></a>
			</div>
		</div>
		</li>
	<?php endforeach; ?>
</ul>
</div>
<?php $this->stop('gauche') ?>


<?php $this->start('droite') ?>

<?php
$selectM=($profil['gender']=='m') ? 'selected="selected"' : null;
$selectF=($profil['gender']=='f') ? 'selected="selected"' : null;		
$birthdateTime = date_create_from_format('Y-m-d',$profil['birthdate']);
$birthdate = $birthdateTime->format('d/m/Y');

?>

<?php
$photo=($photoUser!=null) ? $photoUser : $defaultPhoto;

?>
<div class="profil">	
	<h1>Mon profil</h1>
	<div class="photo-profil">
		<img src="<?= $this->assetUrl("img/" . $photo . "") ?>">
	</div>
	<form method="POST" action="" enctype="multipart/form-data">
		
		<label for="presentation">Présentation</label>
		<textarea name="presentation"><?= $profil['presentation'] ?></textarea>	

		<label for="phone">Téléphone</label>
		<input type="tel" name="phone" placeholder="Votre numéro de téléphone"  value="<?= $profil['phone'] ?>">

		<label for="gender">Sexe</label>
		<select name="gender" id="gender">
			<option value="m" <?= $selectM ?>>Un homme</option>
			<option value="f" <?= $selectF ?>>Une femme</option>         
		</select>  

		<label for="firstname">Prénom</label>
		<input type="text" name="firstname" placeholder="prenom" value="<?= $profil['firstname'] ?>" required>

		<label for="birthdate">Date de naissance</label>
		<input type="text" id="datepicker" name="birthdate" value=<?= $birthdate ?>>
		
		<input type="text" name="path" style="display:none;" value=<?=  $this->assetUrl('img/') ?>>
		<label for="photo">Photo</label>
		<input type="file" name="photo">

		<input type="submit" class="btn btn-success" value="Mettre à jour mon profil">   
	</form>

	<a href="<?= $this->url('user_logout') ?>"><button type="button" class="log-out btn btn-danger">Déconnexion</button></a>
	<?php $this->stop('droite');  ?>
</div>

<?php $this->start('scripts') ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA082QH94snG4T-XIsT6ayEukK-g5mNArg&libraries=places&callback=initMap"
async defer></script>
<script type="text/javascript" src= <?= $this->assetUrl('js/index.js') ?> ></script>
<script type="text/javascript" src= <?= $this->assetUrl('js/map-icons.min.js') ?> ></script>
<script>
	$( function() {
    	// SELECT
    	$( "#gender" ).selectmenu();
    	$( "#datepicker" ).datepicker({
    		yearRange: "1966:2000",
    		changeMonth: true,
			changeYear: true
		});
    });
</script>
<?php $this->stop('scripts') ?>


