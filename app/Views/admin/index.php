	<?php $this->layout('layout_projet', ['title' => 'Administration']) ?>

	<?php $this->start('gauche') ?>		
	<div>
		<h2>Gestion des membres</h2>
		<table border='1'>
		<tr>
		<th>Membre:</th>
		<th>Email:</th>
		<th>Membre depuis le:</th>
		<th>Rôle:</th>		
		<th colspan='2'>Action</th>
		</tr>
		<?php 
		// var_dump($users);
		foreach($users as $user){ 
			$date=date_create_from_format('Y-m-d H:i:s',$user['register_date']);
			$registerDate=$date->format('d/m/Y');
			$selectA=($user['role']=='admin') ? 'selected="selected"' : null;
			$selectU=($user['role']=='user') ? 'selected="selected"' : null;	
			?>
				<tr>
				<td><?= $user['firstname'] ?></td>				
				<td><?= $user['email'] ?></td>
				<td><?= $registerDate ?></td>
				<td>
				<form method="POST" action="<?= $this->url('admin_update_user')?>">
				<select name="role" id="role">
					<option value="admin" <?= $selectA ?>>Admin</option>
					<option value="user" <?= $selectU ?>>User</option>         
				</select>
				</td>
				<td>				
				<input type="text" name="id_user" style="display:none;" value="<?= $user['id'] ?>">		
				<input type="submit" value="Update">
				</form>	
				</td>
				<td>
				<a href="<?= $this->url('admin_delete_user', ['id' => $user['id']]) ?>" style="color:red;">Supprimer</a>
				</td>					
				</tr>			
		<?php }
		?>
		</table>	
	</div>
	
	<div>
		<h2>Gestion des annonces</h2>
		<table border='1'>
		<tr>
		<th>Id de l'annonce:</th>
		<th>Date:</th>
		<th>Postée le:</th>
		<th>Action:</th>				
		</tr>
		<?php 
			// var_dump($adverts) ;			
			foreach($adverts as $advert){ 
				$date=date_create_from_format('Y-m-d',$advert['event_date']);
				$eventDate=$date->format('d/m/y');
				$date=date_create_from_format('Y-m-d H:i:s',$advert['advert_post_date']);
				$postDate=$date->format('d/m/y');
				?>
					<tr>
					<td><?= $advert['id'] ?></td>
					<td><?= $eventDate ?></td>		
					<td><?= $postDate ?></td>
					<td>
					<a href="<?= $this->url('admin_delete_advert', ['id' => $advert['id']]) ?>" style="color:red;">Supprimer</a>
					</td>
					</tr>
				<?php }
			?>
			</table>		
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
				</label><input type="text" name="id_sport" style="display:none;" value=<?= $sport['id'] ?>><br>
				<label >Nom : </label><input type="text" name="sports_name" value="<?= $sport['name'] ?>"><br>
				<label >Logo : </label><input type="text" name="logo" value=<?= $sport['logo'] ?>><br>
				<label >Couleur : </label>
				<input name="color" value="<?= $sport['bkg_color'] ?>" class="jscolor {closable:true, width:243, height:150, position:'right', borderColor:'#FFF', insetColor:'#FFF', backgroundColor:'#666'}">
				<input type="submit" value="Update">
			</form>	
			<a href="<?= $this->url('admin_delete_sport', ['id' => $sport['id']]) ?>" style="color:red;">Supprimer</a>
			</li>			
		<?php } ?>
		</ul>
		<a href="<?= $this->url('admin_add_sport') ?>" style="color:red;">Ajouter un sport</a>
		
	

	<?php $this->stop('droite') ?>














	<?php $this->start('scripts') ?>
		<script type="text/javascript" src= <?= $this->assetUrl('js/jscolor.js') ?> ></script>
	    
	<?php $this->stop('scripts') ?>


