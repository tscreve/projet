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
  $username = $_SESSION['user']['username'];
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
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
   <link href="<?= $this->assetUrl('css/bootstrap.min.css') ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>
<body>


<header>
   <nav class="navbar navbar-default">
      <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
         <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="<?= $this->assetUrl('img/logo.png') ?>" alt=""></a>
         </div>

         <nav>

               <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                  <ul class="nav navbar-nav">
                     <li><a href="basket">Basket</a></li>
                     <li><a href="football">Football</a></li>
                     <li><a href="natation">Natation</a></li>
                     <li><a href="running">Running</a></li>
                     <li><a href="tennis">Tennis</a></li>
                     <li><a href="velo">Velo</a></li>
                  </ul>
               </div><!-- /.navbar-collapse -->

         </nav>

         <div class=" access col-md-4">
            <div class="row">
               <button type="button" class="btn btn-primary">Connexion</button>
               <button type="button" class="btn btn-success">Inscription</button>
            </div>
         </div>

      </div>
   </nav>
</header>


<div class="content">
   <div class="row">
      <section class="gauche col-md-7">
         MAPS
      </section>

      <section class="droite col-md-4 col-md-offset-1">
         ASIDE
      </section>
   </div>
</div>
	

<footer>
   <div class="row">
      <div class="copyright col-md-7">
         <div>&copy; Copyright 2016 - T.A.D - Tous droits réservés</div>
      </div>
      <div class="contact col-md-4 col-md-offset-1">
         <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i>Nous contacter</a>
      </div>
   </div>
</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script type="text/javascript" src="<?= $this->assetUrl('js/bootstrap.min.js') ?>"></script>
<?= $this->section('scripts') ?>

</body>
</html>