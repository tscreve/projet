
	<?php $this->layout('layout_projet', ['title' => 'Détail de l\'annonce']) ?>	


	<?php $this->start('gauche') ?>		
		<div id="map">
	    	Chargement en cours...
	 	</div>			

	<div class="detail-annonce">
	<h2>Détail de l'annonce</h2>
	
	<?php
		// var_dump($advert);
		$date=date_create_from_format('Y-m-d',$advert['event_date']);	
		$eventDate=$date->format('d/m');
		$date=date_create_from_format('H:i:s',$advert['event_time']);	
		$eventTime=$date->format('H \h i \m\i\n');
		$coords="";
		$coords=explode(";", $advert['place']);
		// var_dump($poster);	
		// var_dump($_SESSION);	
		$date=date_create_from_format('Y-m-d H:i:s',$advert['advert_post_date']);	
		$advertDate=$date->format('d/m \à H \h i \m\i\n');
       
	?>
	<input id="data-lat" type="text" style="display:none;" value=<?= $coords[0] ?>>
	<input id="data-lng" type="text" style="display:none;" value=<?= $coords[1] ?>>
	<p>Annonce pour <?= $advert['sport'] ?></p>
	<p>Détails :<br><?= $advert['description'] ?></p>
	<p>Niveau <?= $advert['level'] ?></p>
	<p>Rdv le <?= $eventDate." à ".$eventTime ?></p>
	<p><?= 
	$poster['firstname'] ?> cherche <?= $advert['nb_participant'] ?> sportifs</p>
	<p>Annonce postée le 
		<?=	$advertDate; ?></p>
	<form method="POST" action="">
		<label for="participant">Place(s) disponible(s):</label><br>
        <select name="participant" id="participant">
		<?php
			$remain_participant=$advert['remain_participant'];
			for($i=0;$i<$remain_participant;$i++){ ?>
				<option value="<?= $i+1 ?>"><?= $i+1 ?></option>;
			<?php }
		?> 
        </select>
    	<br><br>
    	<br>
		<?php
		if(isset($_SESSION['user'])){
			if(($remain_participant!=0) && $poster['id']!=$_SESSION['user']['id']){		
			$part=false;			
					foreach($participants as $participant){						
						if($participant['id']==$_SESSION['user']['id']){
							$part=true;
						}else{
							$part=false;
						}						
					}
					if($part==false){
							?>
								<input class="ui-button ui-widget ui-corner-all" type="submit" value="Participer">
							<?php }
			}
		}
		else{
			?>
				<input class="ui-button ui-widget ui-corner-all" type="submit" value="Participer">
			<?php }				
		?>			
	</form>
	<h2>Questions posées par les membres</h2>
	<ul>
		<?php
		// var_dump($questions);
		if(isset($questions)){
			foreach($questions as $question){?>
				<li>
					<h3><?= $question['firstname'] ?></h3>
					<p><?= $question['question'] ?></p>
					<?php
						if(isset($_SESSION['user']) && $_SESSION['user']['role']=='admin'){ ?>
							<a href="<?= $this->url('admin_delete_message', ['id' => $question['id'], 'id_advert'=>$advert['id']]) ?>" style="color:red";>Supprimer</a>
							 <?php }
					?>
				</li>
		<?php }
		}
	?>
	</ul>
	<form method="POST" action="<?= $this->url('advert_question')?>">	
	<?php 				
		if(isset($_SESSION['user'])) {
	?>
		<input name="id_sender" type="text" value="<?= $_SESSION['user']['id'] ?>" style="display:none;">
	<?php
	}
	?>		
	<input name="id_advert" type="text" value="<?= $advert['id'] ?>" style="display:none;">
	<textarea name="question"></textarea>
	<input type="submit" value="Poser une question">
</form>
<h2>Les participants</h2>
	<ul>
	<?php
		foreach($participants as $participant):
			$birthdateTime = date_create_from_format('Y-m-d',$participant['birthdate']);
			$date=time();		
	   		$now=new DateTime("@$date");
	   		$age=$now->diff($birthdateTime);   		
			// var_dump($age);
		?>
		<li>
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
		<p><?= $participant['nb_participant'] ?> place(s)</p>
		</li>
		<?php endforeach; ?>
	</ul>
</div>
	<?php $this->stop('gauche') ?>



	<?php $this->start('droite') ?>
		<h2>Profil de l'organisateur</h2>
		<?php
		// calcul de l'age en fonction de la date d'anniversaire
		$birthdateTime = date_create_from_format('Y-m-d',$poster['birthdate']);
		$date=time();		
   		$now=new DateTime("@$date");
   		$age=$now->diff($birthdateTime);   		
		// var_dump($age);
		$date=date_create_from_format('Y-m-d H:i:s',$poster['register_date']);	
		$registerDate=$date->format('d/m/Y');
		?>
		<h3><?= $poster['firstname'] ?></h3>
		<p><?php switch($poster['gender']){
			case 'm':
				echo "Homme";
				break;
			case 'f':
				echo "Femme";
				break;
			} ?></p>
		<p><?= $age->format("%y") ?> ans</p>
		<p><?= $poster['presentation'] ?></p>
		<p>Membre depuis le <?= $registerDate ?></p>

	<?php $this->stop('droite') ?>



	<?php $this->start('scripts') ?>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA082QH94snG4T-XIsT6ayEukK-g5mNArg&libraries=places&callback=initMap"
	         async defer></script>
	    <script type="text/javascript" src= <?= $this->assetUrl('js/viewadvert.js') ?> ></script>
	     <script>
       $( function() {
          // SELECT
          $( "#participant" ).selectmenu();              
        });

   </script>
	<?php $this->stop('scripts') ?>


