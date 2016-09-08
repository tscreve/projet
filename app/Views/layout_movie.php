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
    <meta charset="utf-8">
    <title>Movies</title>
    <link rel="stylesheet" href="<?= $this->assetUrl('css/normalize.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/movies.css') ?>">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans">
</head>
<body>

<!-- navigation -->
<nav id="site-navigation" class="main-navigation" role="navigation">
  <div class="nav-menu">

    <ul>
      <li><a href="<?= $this->url('default_home')?>" title="Home">Home</a></li>
      <li><a href="<?= $this->url('movie_index')?>">Tous les films</a></li>
      <?php 
      if(isset($_SESSION['user']['username'])) { ?>
        <li><a href="<?= $this->url('user_logout')?>">Deconnexion</a></li>

      <?php if(!empty($_SESSION['user']['username'])) { ?> <li>Hello <?= $_SESSION['user']['username']?> !</li> <?php }  
    
      } 
      else { ?>
        <li><a href="<?= $this->url('user_login_form')?>">Login</a></li> /
        <li><a href="<?= $this->url('user_register_form')?>">Inscription</a></li>
      <?php } ?>
    </ul>

  </div>
</nav>
<!-- FIN navigation -->

    <header class="title-page">
       <?php if($message!=null) { ?>
          <div class="alert alert-<?php echo $class_alert; ?>"> <?= $message ?></div>
        <?php } ?>
        <h1><?= $this->e($title) ?></h1>
    </header>
    
    <section class="search">
        <form class="standard-form" method="POST" action="<?= $this->url('movie_searchByName')?>">  
            <input placeholder="Rechercher un film" type="text" id="name" name="name">
            <input type="submit" value="Rechercher">   
        </form>
    </section>
   
    <section class="center">
        <ul class="movie-list">
            <?= $this->section('main_content') ?>
        </ul>
    </section>

   <footer>
        Exercice Framework W / Frederic LOSSIGNOL
   </footer>
    
</body>
</html>