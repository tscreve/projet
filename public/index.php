<?php

//autochargement des classes
require '../vendor/autoload.php';

//configuration
require '../app/config.php';

// rares fonctions globales
require '../W/globals.php';
ini_set('display_errors', 'on');
error_reporting(E_ALL);
//instancie notre appli en lui passant la config et les routes
$app = new W\App($w_routes, $w_config);

//exécute l'appli
$app->run();