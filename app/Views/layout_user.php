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
  <meta charset="utf-8">
  <title>Movies</title>
  <link rel="stylesheet" href="<?= $this->assetUrl('css/normalize.css') ?>">
  <link rel="stylesheet" href="<?= $this->assetUrl('css/movies.css') ?>">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/css/bootstrap.min.css" integrity="sha384-2hfp1SzUoho7/TsGGGDaFdsuuDL0LX2hnUp6VkX3CUQ2K4K+xjboZdsXyp4oUHZj" crossorigin="anonymous">
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-T8Gy5hrqNKT+hzMclPo118YTQO6cYprQmhrYwIiQ/3axmI1hQomh7Ud2hPOy8SP1" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans">
</head>
<body>

  <!-- navigation -->
  <nav id="site-navigation" class="main-navigation" role="navigation">
    <div class="nav-menu">
      <ul>
        <li><a href="<?= $this->url('default_index')?>" title="Home">Home</a></li>
        <li><a href="<?= $this->url('movie_index')?>">Tous les films</a></li>

        <?php 
        if($username!=null) { ?>
          <li><a href="<?= $this->url('user_logout')?>">Deconnexion</a></li>
          <li>Hello <?= $username ?> !</li>   
          <?php 
        } 
        else { ?>
          <li><a href="#" onclick="">Login</a></li> /
          <li><a href="#" onclick="$('#myModal').modal('show'); return false;">Inscription</a></li>
          <?php } ?>
        </ul>
      </div>
    </nav>
    <!-- FIN navigation -->

    <header class="title-page">
      <?php if($message!=null) { ?>
        <div class="alert alert-<?php echo $class_alert ?>"> <?= $message ?></div>
        <?php } ?>
        <h1><?= $this->e($title) ?></h1>

      </header>
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
              <section class="center">
                <form method="post" action="<?=this->url(user_add_user)?>">
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
              </section>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

      <section>
        <?= $this->section('main_content') ?>
      </section>

      <footer>
        Exercice Framework W / Frederic LOSSIGNOL
      </footer>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.4/js/bootstrap.min.js" integrity="sha384-VjEeINv9OSwtWFLAtmc4JCtEJXXBub00gtSnszmspDLCtC0I4z4nqz7rEFbIZLLU" crossorigin="anonymous"></script>
    </body>
    </html>