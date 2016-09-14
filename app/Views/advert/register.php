	<?php $this->layout('layout', ['title' => 'Enregistrer une annonce']) ?>	


		<?php $this->start('main_content') ?>
		
		<form action="<?= $this->url('default_addPlace')?>" method="POST">
			<input id="data-lat" type="text" name="data-lat" style="display:none;">
			<input id="data-lng" type="text" name="data-lng" style="display:none;">

			<label for="description">Description :</label><br>
			<textarea name="description"></textarea>
			<br>
			
			<label for="level">Niveau :</label><br>
		    <select name="level" id="level">
		      <option value="debutant">Débutant</option>
		      <option value="amateur" selected="selected">Amateur</option>
		      <option value="confirme">Confirmé</option>		      
		    </select>
			<br><br>

			<p>Date de rdv: </p><br>
			<input type="text" id="datepicker" name="date"></input><br>
			
			<label for="time">Heure :</label><br>
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
			<br>
			<label for="nb_participant">Nombre de participant :</label><br>
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
			<br><input class="ui-button ui-widget ui-corner-all" type="submit" value="Enregistrer une annonce">
		</form>
		

		<section class="map">
				<!-- BOUTON SEARCH DE LA MAP -->
		<input id="pac-input" class="controls" type="text" placeholder="Search Box">

		
		<div id="map">
	    	Chargement en cours...
	 	</div>			
		</section>
		




	<?php $this->stop('main_content') ?>






	<?php $this->start('scripts') ?>
		<script src="1https://maps.googleapis.com/maps/api/js?key=AIzaSyA082QH94snG4T-XIsT6ayEukK-g5mNArg&libraries=places&callback=initMap"
	         async defer></script>
	    <script type="text/javascript" src= <?= $this->assetUrl('js/advertregister.js') ?> ></script>
	<?php $this->stop('scripts') ?>


