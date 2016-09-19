	<?php $this->layout('layout_projet', ['title' => 'Enregistrer une annonce']) ?>	


	<?php $this->start('droite') ?>
	
		<form class="register" action="<?= $this->url('default_addPlace')?>" method="POST">
		<h1>Déposer votre annonce</h1>
			<input id="data-lat" type="text" name="data-lat" style="display:none;">
			<input id="data-lng" type="text" name="data-lng" style="display:none;">
			
			<label for="id_sport">Sport</label>
		    <select name="id_sport" id="id_sport">
			<?php foreach($allSports as $sport):  
			?>
		      <option value=<?= $sport['id'] ?>><?= $sport['name'] ?></option>
		    <?php endforeach; ?>
		    </select>


			<label for="level">Niveau</label>
		    <select name="level" id="level">
		      <option value="debutant">Débutant</option>
		      <option value="amateur" selected="selected">Amateur</option>
		      <option value="confirme">Confirmé</option>		      
		    </select>


			<p class="rdv_date">Date de rdv</p>
			<input type="text" id="datepicker" name="date">
			
			<label for="time">Heure :</label>
		    <select name="time" id="time">	
		      <option value="10">10h</option>
		      <option value="11">11h</option>
		      <option selected="selected" value="12">12h</option>
		      <option value="13">13h</option>
		      <option value="14">14h</option>
		      <option value="15">15h</option>
		      <option value="16">16h</option>
		      <option value="17">17h</option>		   
		      <option value="18">18h</option>		   
		      <option value="19">19h</option>		   
		      <option value="20">20h</option>		   
		    </select>

			<label for="nb_participant">Nombre de participant</label>
		    <select name="nb_participant" id="nb_participant">
		      <option>1</option>
		      <option selected="selected">2</option>
		      <option>3</option>
		      <option>4</option>
		      <option>5</option>
		      <option>6</option>
		      <option>7</option>
		      <option>8</option>
		      <option>9</option>
		      <option>10</option>		   
		    </select>

			<label for="description">Informations complémentaires</label>
			<textarea name="description"></textarea>

			<!-- <input class="ui-button ui-widget ui-corner-all" type="submit" value="Enregistrer une annonce"> -->
			<input class="btn btn-warning" type="submit" value="Enregistrer votre annonce">
		</form>
	<?php $this->stop('droite') ?>



	<?php $this->start('gauche') ?>
		<section class="map">
				<!-- BOUTON SEARCH DE LA MAP -->
		<input id="pac-input" class="controls" type="text" placeholder="Rechercher une adresse">

		
		<div id="map">
	    	Chargement en cours...
	 	</div>			
		</section>
	<?php $this->stop('gauche') ?>


	






	<?php $this->start('scripts') ?>
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA082QH94snG4T-XIsT6ayEukK-g5mNArg&libraries=places&callback=initMap"
	         async defer></script>
	    <script type="text/javascript" src= <?= $this->assetUrl('js/advertregister.js') ?> ></script>
	<?php $this->stop('scripts') ?>


