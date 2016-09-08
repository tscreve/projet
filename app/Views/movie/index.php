<?php 

// VUE DES FILMS - APPELEE PAR movie#index (/app/Controller/MovieController.php)

// On charge le layout
 $this->layout('layout_movie', ['title' => $title, 'message' => $message]);



// On place le contenu de la vue
$this->start('main_content') ?>
<?php  
var_dump($_SESSION);
?>


<?php foreach($films as $film): ?>

  <li>
    <a href="<?= $this->url('movie_details', ['id' => $film['id'], 'slug' => $film['slug'] ]) ?>">
        <img src="<?= $this->assetUrl("img/" . $film['cover'] . "") ?>">
        <p>
            <strong><?= $film['title'] ?></strong> -
            <em><?= intval($film['duration'] / 60) ?>h<?= intval($film['duration'] % 60) ?></em>
        </p>
    </a>
  </li>
<?php endforeach; ?>

<?php $this->stop('main_content');  
// fin du contenu de la vue


