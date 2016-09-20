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
				<p>Rôle : <?= $user['role'] ?></p>
				<p>Email : <?= $user['email'] ?></p>
				<p>Membre depuis le <?= $registerDate ?></p>

				<form method="POST" action="<?= $this->url('admin_update_user')?>">
				<input type="text" name="id_user" style="display:none;" value="<?= $user['id'] ?>">				
				<label for="role">Rôle :</label><br>
				<select name="role" id="role">
					<option value="admin" <?= $selectA ?>>Admin</option>
					<option value="user" <?= $selectU ?>>User</option>         
				</select>
				<input type="submit" value="Update">
				</form>			
				<a href="<?= $this->url('admin_delete_user', ['id' => $user['id']]) ?>">Supprimer le membre</a>	
			</li>
		<?php }
		?>
		</ul>
	










	</div>
	
	<div>
		<h2>Gestion des annonces</h2>

		<?php var_dump($adverts) ?>










	</div>
	
	
	<?php $this->stop('gauche') ?>







	<?php $this->start('droite') ?>
		
	<h2>Gestion des sports</h2>

	<?php var_dump($sports) ?>











	<?php $this->stop('droite') ?>














	<?php $this->start('scripts') ?>
	
	    
	<?php $this->stop('scripts') ?>


