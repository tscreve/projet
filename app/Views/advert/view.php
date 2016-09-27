
<?php $this->layout('layout_projet', ['title' => 'Détail de l\'annonce']);	

$defaultPhoto = "profil_default.png";

?>


<?php $this->start('gauche') ?>		
	<div id="map" class="small-map">
	    Chargement en cours...
	</div>

	<div class="detail-annonce detail-annonce-gauche">
		<h2>Détail de l'annonce</h2>
		<?php
			// formatage des dates et heures
			$date=date_create_from_format('Y-m-d',$advert['event_date']);	
			$eventDate=$date->format('d/m');
			$date=date_create_from_format('H:i:s',$advert['event_time']);	
			$eventTime=$date->format('H\hi');
			$date=date_create_from_format('Y-m-d H:i:s',$advert['advert_post_date']);	
			$advertDate=$date->format('d/m \à H\hi');
			// récupération des coordonnees en BDD
			$coords="";
			$coords=explode(";", $advert['place']);			
		?>
		<!-- data pour le paramétrage de la map -->
		<input id="data-lat" type="text" style="display:none;" value=<?= $coords[0] ?>>
		<input id="data-lng" type="text" style="display:none;" value=<?= $coords[1] ?>>
		<img class="icone-sport" src="<?= $this->assetUrl("img/" . $advert['logo'] . "") ?>" alt="" style="background-color: <?= $advert['bkg_color'] ?>;">

		<!-- data pour le paramétrage de la map en javascript -->
		<p id="advert" data-sport=<?= $advert['sport'] ?> data-time="<?= $eventTime ?>" data-date="<?= $eventDate ?>" data-color="<?= $advert['bkg_color'] ?>">Niveau : <?= $advert['level'] ?></p>
		<p>Rdv le <?= $eventDate." à ".$eventTime ?></p>
		<p>Annonce postée le <?=$advertDate; ?></p>
		<div class="description">
		<p ><?= $advert['description'] ?></p>
		</div>		

		<form method="POST" action="">
			<label for="participant">Je reserve : </label>
	        <select name="participant" id="participant">
			<?php
				// on affiche le nombre de places disponibles
				$remain_participant=$advert['remain_participant'];
				for($i=0;$i<$remain_participant;$i++){ ?>
					<option value="<?= $i+1 ?>"><?= $i+1 ?></option>;
				<?php }
			?> 
	        </select> place(s)
			<?php
			// affichage du bonton participer 
			if(isset($_SESSION['user'])){
				// si il reste des places et si user n'est pas l'organisateur 
				if(($remain_participant!=0) && $poster['id']!=$_SESSION['user']['id']){		
				$part=false;		
						// si user ne participe pas déjà
						foreach($participants as $participant){						
							if($participant['id']==$_SESSION['user']['id']){
								$part=true;
							}else{
								$part=false;
							}						
						}
						if($part==false){
								?>
									<input class="btn btn-primary" type="submit" value="Participer">
								<?php }
				}
			}
			else{
				?>
					<input class="btn btn-primary" type="submit" value="Participer">
				<?php }				
			?>			
		</form>
	</div>

	<div class="detail-annonce detail-annonce-droite">
		<h2>Messagerie</h2>
		<form method="POST" action="<?= $this->url('advert_question')?>">	
			<?php 	
				// si user connecté on récupère son id sinon redirection vers page login
				if(isset($_SESSION['user'])) {
			?>
			<input name="id_sender" type="text" value="<?= $_SESSION['user']['id'] ?>" style="display:none;">
			<?php
			}
			?>		
			<input name="id_advert" type="text" value="<?= $advert['id'] ?>" style="display:none;">
			<textarea name="question"></textarea>
			<input class="btn btn-success" type="submit" value="Envoyer votre message">
		</form>		
		<div class="liste-message">
			<ul>
				<?php
				// si il y'a des questions en bases alors on les affiche
				if(isset($questions)){
					foreach($questions as $question){?>
						<li>
							<h3><?= $question['firstname'] ?> a dit...</h3>
							<p class="message"><?= $question['question'] ?></p>
							<?php
								// si user est admin alors on affiche un lien pour supprimer la question
								if(isset($_SESSION['user']) && $_SESSION['user']['role']=='admin'){ ?>
									<a href="<?= $this->url('admin_delete_message', ['id' => $question['id'], 'id_advert'=>$advert['id']]) ?>" style="color:red";>Supprimer</a>
									 <?php }
							?>
						</li>
				<?php }
				}
			?>
			</ul>
		</div>
	</div>


	<div class="detail-annonce participants">	
		<h2>Les participants</h2>
		<ul>
		<?php
			foreach($participants as $participant):
				// formatage des dates
				$birthdateTime = date_create_from_format('Y-m-d',$participant['birthdate']);
				// on récupère la date d'aujourd'hui
				$date=time();					
		   		$now=new DateTime("@$date");
		   		// on calcule l'âge des participants
		   		$age=$now->diff($birthdateTime);
		   		// on récupère la photo, si pas de photo, on affiche une par défaut
				$photoUser=$participant['photo'];
				$photo=($photoUser!=null) ? $photoUser : $defaultPhoto;
			?>
			<li>
				<div class="photo-participants">
					<img src="<?= $this->assetUrl("img/" . $photo . "") ?>">
					<div class="info-participants">			
						<h3><?= $participant['firstname'] ?></h3>
						<p><?php switch($participant['gender']){
							case 'm':
								echo "Homme";
								break;
							case 'f':
								echo "Femme";
								break;
							} ?></p>
						<p><?= $age->format("%y") ?> ans</p>
					</div>
				</div>

			</li>
			<?php endforeach; ?>
		</ul>
	</div>
<?php $this->stop('gauche') ?>





<?php $this->start('droite') ?>
	<div class="profil-organisateur">
		<h1>Profil de l'organisateur</h1>
			<?php
			// on récupère la photo, si pas de photo, on affiche une par défaut
			$photoUser=$poster['photo'];
			$photo=($photoUser!=null) ? $photoUser : $defaultPhoto;
			// formatage des dates
			$date=date_create_from_format('Y-m-d H:i:s',$poster['register_date']);	
			$registerDate=$date->format('d/m/Y');
			$birthdateTime = date_create_from_format('Y-m-d',$poster['birthdate']);
			// on récupère la date d'aujourd'hui
			$date=time();			
	   		$now=new DateTime("@$date");
	   		// calcul de l'age en fonction de la date d'anniversaire
	   		$age=$now->diff($birthdateTime);   		
	   	
			?>
		<div class="photo-profil">
			<img src="<?= $this->assetUrl("img/" . $photo . "") ?>">
		</div>
		<h2><?= $poster['firstname'] ?></h2>
		<p><?php switch($poster['gender']){
			case 'm':
				echo "Homme";
				break;
			case 'f':
				echo "Femme";
				break;
			} ?></p>
		<p><?= $age->format("%y") ?> ans</p>
		<p class="presentation"><?= $poster['presentation'] ?></p>
		<p>Membre depuis le <?= $registerDate ?></p>
	</div>
<?php $this->stop('droite') ?>





<?php $this->start('scripts') ?>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA082QH94snG4T-XIsT6ayEukK-g5mNArg&libraries=places&callback=initMap"async defer></script>

	<script type="text/javascript" src= <?= $this->assetUrl('js/viewadvert.js') ?> ></script>
	 <script type="text/javascript" src= <?= $this->assetUrl('js/map-icons.min.js') ?> ></script>
	<script>
       $( function() {
          // SELECT
          $( "#participant" ).selectmenu();              
        });
   </script>
<?php $this->stop('scripts') ?>


