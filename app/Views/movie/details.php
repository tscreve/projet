<?php 

// VUE DES FILMS - APPELEE PAR movie#index (/app/Controller/MovieController.php)

// On charge le layout
 $this->layout('layout_movie', ['title' => 'Fiche du film : ' . $film['title']]);


// On place le contenu de la vue
$this->start('main_content') ?>
<div>
    <img src="<?= $this->assetUrl("img/" . $film['cover'] . "") ?>">
    <p>
        <strong><?= $film['title'] ?></strong> -
        <em><?= intval($film['duration'] / 60) ?>h<?= intval($film['duration'] % 60) ?></em>
    </p>
    <p class="resume"><?= $film['resume'] ?></p>
    
    <hr>
    <a class="btn" href="<?= $this->url('movie_index') ?>">
    	<i class="fa fa-arrow-left"></i> Retour à tous les films
    </a>
</div>
    <div class="comments">
    	<h2>Les Avis</h2>
         
         <!-- Formulaire d'ajout de commentaires -->

		        <form class="comment-form" method="POST" action="<?= $this->url('comment_add_comment')?>">  
		            <textarea placeholder="Laissez votre avis ..." name="content"></textarea>
                    <input type="hidden" value="<?= $film['id'] ?>" name="movie_id">
                    <input type="hidden" value="<?= $film['slug'] ?>" name="slug">
		            <input type="submit" value="Ajouter">   
		        </form>
	   
        <!-- Boucle qui affiche tous les commentaires -->

		<?php 
		foreach($commentaires as $commentaire) { ?>
			<div>
				<img src="http://i1.wp.com/www.techrepublic.com/bundles/techrepubliccore/images/icons/standard/icon-user-default.png">
				<span>Fred</span>
				<?= $commentaire['content'] ?>
			</div>
	    <?php } ?>
    	
    </div>
   
<?php $this->stop('main_content');  
// fin du contenu de la vue


