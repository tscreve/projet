<?php 







 ?>

<form action="" method="post">
	<!-- renseignement du sport -->
	<label for="sport">Votre sport : </label>
	<br>
	<input type="text" name="sport"><br><br>

	<!-- le lieux de l'evenement  -->
	<label for="lieux">Le lieux de l'évenement :</label>
	<br>
	<input type="text" name="place"><br><br>

	<!-- le nombre de participant  -->
	<label for="nombre de participant ">le nombre de participant demander :</label>
	<br>
	<input type="text" name="nb_participant"><br><br>

	<!-- la date et  l'heure de l'evenement -->
	<label for="evenement">la date et l'heure de l'evenement :</label>
	<br>
	<input type="text" name="event_date"><br>
	<input type="text" name="event_time"><br><br>
	
	<!-- disponibiliter de  l'annonce (bouton radio) -->
	<label for="statut de l'annonce disponible"> statut de l'annonce :</label>
	<input type="radio" name="statut" value="available">
	<input type="radio" name="statut" value="not_available"><br><br>

	<input type="submit">
</form>