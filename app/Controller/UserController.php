<?php
namespace Controller;

use \W\Controller\Controller;
use \W\Model\Model;
use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;

// use \Model\UserModel;

class UserController extends Controller
{
	/**
	* Affichage du formulaire d'inscription
	*/
	public function registerForm()
	{
		// Si l'utilisateur est connecté on le redirige vers la page de tous les films 
		// (il ne doit pas à accéder à la page d'inscription)
		$loggedUser = $this->getUser();
		if($loggedUser) {
			$this -> redirectToRoute('default_hello');
		}

		$title = 'Inscription';
		$this -> show('user/register_form', ['title' => $title]);
	}

	/**
	* Affichage du formulaire de connexion
	*/
	public function loginForm()
	{
		// Si l'utilisateur est connecté on le redirige vers la page de tous les films 
		// (il ne doit pas à accéder à la page de connexion)
		$loggedUser = $this->getUser();
		if($loggedUser) {
			$this -> redirectToRoute('');
		}

		$title = 'Connexion';
		$this -> show('user/login', ['title' => $title]);
	}


	/**
	 * ajout d'un utilisateur dans la BDD / Inscription
	 */
	public function addUser()
	{
		//Instanciation d'un objet de la class "UsersModel" pour l'accès à la BDD
		$userTable = new UsersModel;
	 	// récupération d'un objet de la classe AuthentificationModel
		$auth = new AuthentificationModel;

		if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)== false){
			$message = 'veuillez rentrer une adresse mail valide ex : nom@domaine.com/fr';
			$auth-> setFlash($message,'error');
			$this -> redirectToRoute('user_register_form');
		}
        /* 
        ** On vérifie que l'Email et le prénom ne sont pas déjà utilisés avant d'insérer les données.
        ** Si l'Email ou le prénom sont déjà utilisés, on redirige l'utilisateur vers la page du formulaire d'inscription avec le message d'erreur.
        */
        //var_dump($_POST);
		if($userTable->emailExists($_POST['email'])) {
			$message = 'Cet Email existe déjà, veuillez en choisir un autre.';
			$auth-> setFlash($message, 'error');
			$this -> redirectToRoute('user_register_form');
		}
		
		//étant donner qu'il y'a la possibiliter que l'on a le même prenom j'enleve ce if on ne verifira que  l'email entrée en base (dans notre cas)
		// if($userTable->usernameExists($_POST['firstname'])) {
		// 	$message = 'Ce pseudo existe déjà, veuillez en choisir un autre.';
		// 	$auth-> setFlash($message, 'error');
		// 	$this -> redirectToRoute('user_register_form');
		// }
		
		/* 
        ** Si l'Email(dans notre cas il n'ya que l'émail) et le Username n'existent pas alors on peut ajouter le nouvel utilisateur en BDD
        */
		$newUser = array(
			'firstname' => htmlentities($_POST['firstname']),
			'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
			'email' => $_POST['email'],
			'role' => 'user'
		);

		//ajout de l'utilisateur avec la fonction insert() dispo dans W/Model/Model.php
		if($userTable-> insert($newUser)) {
			// Si l'enregistrement est OK on affiche la page d'acceuil avec le message de succès
			$title = 'Tous les films';
			$message = "Votre inscription est validée.";
			$auth-> setFlash($message, 'success');
			$this -> redirectToRoute('default_index', ['title' => $title]);
		} else {
			// Sinon on reste sur la page et on affiche le message d'erreur
			$title = 'Inscription';
			$message = "Il y a eu problème lors de l'inscription";
			$auth-> setFlash($message, 'error');
			$this -> redirectToRoute('user_register_form', ['title' => $title]);
		}
	
	}


	/** 
	* verif d'un utlisateur
	*/
	public function login()
	{
		// récupération d'un objet de la classe AuthentificationModel
		$auth = new AuthentificationModel;
		//vérification login/password
		if($auth -> isValidLoginInfo($_POST['firstname'], $_POST['password']))
		{
			//récupération d'un "modèle" Utilisateur
			$util = new UsersModel;
			$user = $util -> getUserByUsernameOrEmail($_POST['firstname']);
			//connexion de l'utilisateur
			$auth -> logUserIn($user);
			//affichage
			$auth-> setFlash('Génial vous êtes connecté(e)', 'success');
			$this->redirectToRoute('movie_index');
			//$this -> show('user/profil', ['user' => $user, 'auth' => $auth]);

		}
		//sinon retour au formulaire

		else {
			$auth-> setFlash('Login ou mot de passe erroné. Réessayez', 'error');
			$this -> redirectToRoute('user_login_form');
		} 

	}


	/*
	*Déconnexion
	*/
	public function profil()
	{
		// récupération d'un objet de la classe AuthentificationProjet
		// $auth = new AuthentificationProjet;

		//déconnexion de l'utilisateur (session)
		// $auth -> logUserOut($user);
		
		//redirection vers l'accueil
		$this -> show('user/profil');
	}



	/*
	*Déconnexion
	*/
	public function logout()
	{
		// récupération d'un objet de la classe AuthentificationModel
		$auth = new AuthentificationModel;
		//déconnexion de l'utilisateur (session)
		$auth -> logUserOut($user);
		//redirection vers l'accueil
		$auth-> setFlash('Vous êtes deconnecté(e)', 'info');
		$this -> redirectToRoute('hello');
	}

	// si mot de passe est oublié 
	public function passwordLost()
	{
		//si le bouton envoyer est  enregistrée 
		if(isset($_POST['envoyer'])){
			foreach ($_POST['email'] as $key => $value){// on chercher dans chaque ligne si la valeur nous renvoie  l'email  (à vérifier)  

				echo $_POST['password'];
			}
		}
	}



}