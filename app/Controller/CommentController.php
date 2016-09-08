<?php
namespace Controller;

use \W\Controller\Controller;
use \Model\CommentsModel;
use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;


class CommentController extends Controller {

	function addComment() {
        // uniquement accessible pour les utilisateurs connectés et les admin
        $this->allowTo(['user','admin']);
        //Instanciation d'un objet du la class "UsersModel" pour l'accès à la BDD
		$commentsTable = new CommentsModel;

		// récupération d'un objet de la classe AuthentificationModel
		$auth = new AuthentificationModel;

		$loggedUser = $this->getUser();
		// var_dump($loggedUser); die();

		/* 
        ** Si le commentaire n'est pas vie alors on l'ajoute en BDD
        */
		$newComment = array(
			'content' => htmlentities($_POST['content']),
			'movie_id' => $_POST['movie_id'],
			'user_id' => $loggedUser['id'],
		);

		//ajout de l'utilisateur avec la fonction insert() dispo dans W/Model/Model.php
		if($commentsTable->insert($newComment)) {
			// Si l'enregistrement est OK on affiche la page d'acceuil avec le message de succès
			$title = 'Tous les films';
			$message = "Merci pour votre commentaire !";
			$auth->setFlash($message, 'success');
			$this->redirectToRoute('movie_details', ['slug'=>$_POST['slug'], 'id'=>$_POST['movie_id']]);
		} else {
			// Sinon on reste sur la page et on affiche le message d'erreur
			$title = 'Inscription';
			$message = "Un problème est survenu lors de l'enregistrement de votre commmentaire. Réessayez ultérieurement";
			$auth-> setFlash($message, 'error');
			$this->redirectToRoute('movie_details', ['slug'=>$_POST['slug'], 'id'=>$_POST['movie_id']]);
		}

	
	}
	






}