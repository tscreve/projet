
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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/map-icons.min.css') ?>">
    <link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
</head>

<body onload="setTimeout(cacherDiv,2000);">
    <?php if($message!=null) { ?>
    <div id="mess-alert" class="alert alert-<?php echo $class_alert ?>"> <?= $message ?></div>
    <?php } ?>

    <script language="JavaScript">
        function cacherDiv() {
           document.getElementById("mess-alert").style.visibility = "hidden";
       }
    </script>



    <header>
        <nav class="navbar navbar-default">
        <!-- Brand and toggle get grouped for better mobile display -->
            <div class="row">
                <div class="col-md-1 col-sm-12">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="<?= $this->url('default_index') ?>"><img src="<?= $this->assetUrl('img/logo.png') ?>" alt=""></a>
                    </div>
                </div>



                <div class="col-md-11 col-sm-12">
                    <div class="collapse navbar-collapse " id="bs-example-navbar-collapse-1">
                        
                        <ul class="nav navbar-nav navbar-left">
                            <li><a href="<?= $this->url('search_by_sport', ['id' => "4"]) ?>">Basket</a></li>
                            <li><a href="<?= $this->url('search_by_sport', ['id' => "0"]) ?>">Football</a></li>
                            <li><a href="<?= $this->url('search_by_sport', ['id' => "5"]) ?>">Natation</a></li>
                            <li><a href="<?= $this->url('search_by_sport', ['id' => "2"]) ?>">Running</a></li>
                            <li><a href="<?= $this->url('search_by_sport', ['id' => "1"]) ?>">Tennis</a></li>
                            <li><a href="<?= $this->url('search_by_sport', ['id' => "3"]) ?>">Velo</a></li>
                            <li>
                            <form id="form_search" method="POST" action="<?= $this->url('search_by_date')?>">
                                <input id="datepicker_header" class="filter-date btn btn-warning" name="search_date" value="Quand ?"> 
                            </form>
                            </li>
                        </ul>
                        
                        <div class="navbar-right access">              
                            <?php
                            if(isset($_SESSION['user'])){ ?>                 
                            <span>Salut <a href="<?= $this->url('user_profil') ?>"><?= $_SESSION['user']['firstname'] ?></a></span>                 
                            <?php }else{ ?>
                            <a href="<?= $this->url('user_login_form') ?>"><button type="button" class="btn btn-primary">Connexion</button></a>
                            <a href="<?= $this->url('user_register_form') ?>"><button type="button" class="btn btn-success">Inscription</button></a>
                            <?php }               
                            if(isset($_SESSION['user']) && $_SESSION['user']['role']=='admin'){ ?>
                            <a href="<?= $this->url('user_admin_index') ?>"><button type="button" class="btn btn-success">Admin</button></a>
                            <?php }
                            ?>               
                        </div>             
                    </div>
                </div>

<!--                 <div class="col-md-4 col-sm-12">
                    <div class="access">              
                        <?php
                        if(isset($_SESSION['user'])){ ?>                 
                        <span>Salut <a href="<?= $this->url('user_profil') ?>"><?= $_SESSION['user']['firstname'] ?></a></span>                 
                        <?php }else{ ?>
                        <a href="<?= $this->url('user_login_form') ?>"><button type="button" class="btn btn-primary">Connexion</button></a>
                        <a href="<?= $this->url('user_register_form') ?>"><button type="button" class="btn btn-success">Inscription</button></a>
                        <?php }               
                        if(isset($_SESSION['user']) && $_SESSION['user']['role']=='admin'){ ?>
                        <a href="<?= $this->url('user_admin_index') ?>"><button type="button" class="btn btn-success">Admin</button></a>
                        <?php }
                        ?>               
                    </div>
                </div> -->
            </div>
        </nav>
    </header>


