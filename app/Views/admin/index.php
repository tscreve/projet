	<?php $this->layout('layout_projet', ['title' => 'Administration']) ?>	


	<?php $this->start('gauche') ?>		
	<div>
		<h2>Gestion des membres</h2>
		<ul>
		<?php 
		// var_dump($users);
		foreach($users as $user){ 
			$date=date_create_from_format('Y-m-d H:i:s',$user['register_date']);
			$registerDate=$date->format('d/m/Y');
			$selectA=($user['role']=='admin') ? 'selected="selected"' : null;
			$selectU=($user['role']=='user') ? 'selected="selected"' : null;	
			?>
			<li>
				<h3>Membre : <?= $user['firstname'] ?></h3>				
				<p>Email : <?= $user['email'] ?></p>
				<p>Membre depuis le <?= $registerDate ?></p>

				<form method="POST" action="<?= $this->url('admin_update_user')?>">
				<input type="text" name="id_user" style="display:none;" value="<?= $user['id'] ?>">				
				<label for="role">Rôle :</label>
				<select name="role" id="role">
					<option value="admin" <?= $selectA ?>>Admin</option>
					<option value="user" <?= $selectU ?>>User</option>         
				</select>
				<input type="submit" value="Update">
				</form>			
				<a href="<?= $this->url('admin_delete_user', ['id' => $user['id']]) ?>" style="color:red;">Supprimer le membre</a>	
			</li>
		<?php }
		?>
		</ul>
	
	</div>
	
	<div>
		<h2>Gestion des annonces</h2>
		<ul><?php 
			// var_dump($adverts) ;
			
			foreach($adverts as $advert){ 
				$date=date_create_from_format('Y-m-d',$advert['event_date']);
				$eventDate=$date->format('d/m/y');
				$date=date_create_from_format('Y-m-d H:i:s',$advert['advert_post_date']);
				$postDate=$date->format('d/m/y');
				?>
				<li>
					<h3>Annonce : <?= $advert['id'] ?></h3>
					<p>Date de l'évenement : <?= $eventDate ?></p>		
					<p>Postée le <?= $postDate ?></p>
					<a href="<?= $this->url('admin_delete_advert', ['id' => $advert['id']]) ?>" style="color:red;">Supprimer l\'annonce</a>	
				</li>
				<?php }
			?>			
		</ul>
		
	</div>
	
	
	<?php $this->stop('gauche') ?>







	<?php $this->start('droite') ?>
		
	<h2>Gestion des sports</h2>

		<?php 
		// var_dump($sports) ;?>

		<ul>
			<?php
			foreach($sports as $sport){ ?>
			<li>
			<form method="POST" action="<?= $this->url('admin_update_sports')?>">
				<input type="text" name="id_sport" style="display:none;" value=<?= $sport['id'] ?>><br>
				<input type="text" name="sports_name" value=<?= $sport['name'] ?>><br>
				<input type="text" name="logo" value=<?= $sport['logo'] ?>><br>
				<input class="color" name="color" value=<?= $sport['bkg_color'] ?>><br>
				<input type="submit" value="Update"><br><br>
			</form>				
			</li>			
		<?php } ?>
		</ul>
		<a href="<?= $this->url('admin_add_sport') ?>" style="color:red;">Ajouter un sport</a>
		
	

	<?php $this->stop('droite') ?>














	<?php $this->start('scripts') ?>

	    
	<?php $this->stop('scripts') ?>


