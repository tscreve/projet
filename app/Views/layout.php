<?php  
// Traitement message flash et session user
if(isset($_SESSION['message'])) { 
  $class_alert = $_SESSION['type'];
  $message = $_SESSION['message']; 
  unset($_SESSION['message']);
  unset($_SESSION['type']);  
}
else {
  $message = null;
}

if(isset($_SESSION['user'])) { 
  $username = $_SESSION['user']['firstname'];
}
else {
  $username = null;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<meta name="viewport" content="initial-scale=1.0">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
</head>
<body>
	<div class="container">
		<header class="title-page">
      <?php if($message!=null) { ?>
        <div class="alert alert-<?php echo $class_alert ?>"> <?= $message ?></div>
        <?php } ?>
			<h1><?= $this->e($title) ?></h1>
		</header>


    <section>      
        <?= $this->section('places_list') ?>           
    </section>

		<section>
			<?= $this->section('main_content') ?>
		
		<!-- je cherche actuellement a quoi correspond login-form (Aster) -->
		<div class="modal-content">
		<form class="login-form" method="POST" action="<?= $this->url('user_login')?>"> 
            <label for="login">Prenom</label> 
            <input placeholder="Choisissez un Login" type="text" name="prenom">

            <label for="login">Mot de passe</label> 
            <input placeholder="Choisissez un mot de passe" type="text" name="password">
 
            <input type="submit" value="Se connecter">   
        </form>
        </div>



     <div class="modal-content">
	 <h2 class="titre_inscription">Inscription</h2>
     <form class="login-form" method="POST" action="<?= $this->url('user_add_user')?>"> 

	<!-- bouton radio pour determiner le sexe  -->
      <label for="Homme">H</label>
      <input type="radio" name="sexe" value="H">
      <label for="Femme">F</label>
      <input type="radio" name="sexe" value="F">
    <br><br>

      <label for="Prenom">Prenom</label><br>
      <input placeholder="prenom" type="text" name="firstname" >
			<br>

	<label for="date de naissance">Date d'anniversaire</label>
	<input type="text" placeholder="ex : 29/04/1993" name="birthdate" >
	
		<br><br>

            <label for="login">Email</label><br>
            <input placeholder="Votre Email" type="text" name="email"><br><br>

            <label for="login">Mot de passe</label><br>
            <input placeholder="Choisissez un mot de passe" type="text" name="password">
            <br><br>

            <input type="submit" value="S'inscrire">   
        </form>
  	</div>
		</section>

    <footer>
		</footer>



	</div>
	<?= $this->section('scripts') ?>
</body>
</html>