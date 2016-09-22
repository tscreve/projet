<?php 
// On charge le layout
$this->layout('layout_projet', ['title' => 'Mon profil', 'message' => $message]); 

$defaultPhoto = "profil_default.jpg";
$photoUser = $_SESSION['user']['photo'];


//modification de profil
if(isset($_GET['action']) && $_GET['action'] == 'profil.php'){
	$nom_photo = $_POST['photo_actuelle'];
}
?>

<?php $this->start('gauche') ;
?>
<section class="map">		
	<div id="map">
		Chargement en cours...
	</div>			
</section>	
<?php $this->stop('gauche') ?>




<?php $this->start('gauche') ?>		
<?php 
var_dump($_FILES); 	
?>
<h2>Mes annonces</h2>
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
	<li data-lat=<?= $coords[0] ?> data-lng=<?= $coords[1] ?> data-sport=<?= $advert['sport'] ?> data-date=<?= $eventDate ?> data-time=<?= $dataTime ?> data-participant=<?= $advert['nb_participant'] ?> data-level=<?= $advert['level'] ?> data-dUrl=<?= $dataUrl ?>>
		<p><?= $advert['sport'] ?></p>
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
		?></p>
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
			?></p>		
		</li>
	<?php endforeach; ?>
</ul>
<?php $this->stop('gauche') ?>


<?php $this->start('droite') ?>

<?php
		// var_dump($profil);
$selectM=($profil['gender']=='m') ? 'selected="selected"' : null;
$selectF=($profil['gender']=='f') ? 'selected="selected"' : null;		
$birthdateTime = date_create_from_format('Y-m-d',$profil['birthdate']);
$birthdate = $birthdateTime->format('d/m/Y');

?>

<?php
$photo=($photoUser!=null) ? $photoUser : $defaultPhoto;

?>	
<h2 class="titre_inscription">Mon profil</h2>
<img src="<?= $this->assetUrl("img/" . $photo . "") ?>">
<form method="POST" action="" enctype="multipart/form-data">
	
	<label for="presentation">Ma description :</label><br>
	<textarea name="presentation"><?= $profil['presentation'] ?></textarea>	

	<br>

	<label for="phone">Téléphone :</label><br>
	<input placeholder="Votre numéro de téléphone" type="text" name="phone" value="<?= $profil['phone'] ?>">
	<br><br>

	<label for="gender">Je suis toujours :</label><br>
	<select name="gender" id="gender">
		<option value="m" <?= $selectM ?>>Un homme</option>
		<option value="f" <?= $selectF ?>>Une femme</option>         
	</select>  


	<br><br>

	<label for="firstname">Mon prénom</label><br>
	<input placeholder="prenom" type="text" name="firstname" value="<?= $profil['firstname'] ?>">
	<br>

	<label for="birthdate">Ma date d'anniversaire :</label><br>
	<input type="text" id="datepicker" name="birthdate" value=<?= $birthdate ?>>
	<br><br>

	<!--  <label for="login">Mon mot de passe</label><br>
	<input type="password" name="password">
	<br><br> -->
	
	<input name="path" type="text" style="display:none;" value=<?=  $this->assetUrl('img/') ?>>
	<label for="photo">Ma photo :</label>
	<input type="file" name="photo">
	<br><br>

	<input type="submit" value="Mettre à jour mon profil">   
</form>
<a href="<?= $this->url('user_logout') ?>"><button type="button" class="btn btn-success">Déconnexion</button></a>
<?php $this->stop('droite');  ?>


<?php $this->start('scripts') ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA082QH94snG4T-XIsT6ayEukK-g5mNArg&libraries=places&callback=initMap"
async defer></script>
<script type="text/javascript" src= <?= $this->assetUrl('js/index.js') ?> ></script>

<script>
	$( function() {
    	// SELECT
    	$( "#gender" ).selectmenu();
    	$( "#datepicker" ).datepicker({
    		yearRange: "1966:2000",
    		changeMonth: true,
			// dateFormat:"d/m/Y",
			changeYear: true
		});
    });
</script>
<?php $this->stop('scripts') ?>


