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

   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css"> -->
   <link rel="stylesheet" href="<?= $this->assetUrl('css/font-awesome.min.css') ?>">

   <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
   <link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="<?= $this->assetUrl('css/jquery-ui-1.12.0.css') ?>">

	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">


</head>
<body>






<header>
   <nav class="navbar navbar-default">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="row">
         <div class="col-md-1">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="#"><img src="<?= $this->assetUrl('img/logo.png') ?>" alt=""></a>
            </div>
         </div>
         
         <div class="col-md-7">
            <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
               <ul class="nav navbar-nav">
                  <li><a href="basket">Basket</a></li>
                  <li><a href="football">Football</a></li>
                  <li><a href="natation">Natation</a></li>
                  <li><a href="running">Running</a></li>
                  <li><a href="tennis">Tennis</a></li>
                  <li><a href="velo">Velo</a></li>
               </ul>
            </div>
         </div>

         <div class="col-md-4">
            <div class="access">
               <!-- <div class="btn-group"> -->
               <button type="button" class="btn btn-primary"><a href="login">Connexion</a></button>
               <button type="button" class="btn btn-success"><a href="">Inscription</a></button>
               <!-- </div> -->
            </div>
         </div>
      </div>
   </nav>
</header>




<div class="content">
      <section class="gauche">
         <?= $this->section('gauche') ?>
      </section>
   

      <section class="droite">
         <?= $this->section('droite') ?>
      </section>
</div>
	

<footer>
   <div class="row">
      <div class="copyright">
         <div>&copy; Copyright 2016 - T.A.D - Tous droits réservés</div>
      </div>
      <div class="contact">
         <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i>Nous contacter</a>
      </div>
   </div>
</footer>


<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
<script src="<?= $this->assetUrl('js/jquery-2.2.4.js') ?>"></script>


<!-- <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>  -->
<script src="<?= $this->assetUrl('js/jquery-ui-1.12.0.js') ?>"></script>


<!-- <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
<script type="text/javascript" src="<?= $this->assetUrl('js/bootstrap.min.js') ?>"></script>


<?= $this->section('scripts') ?>

</body>
</html>