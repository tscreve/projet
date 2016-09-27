<?php
namespace Controller;

use \W\Controller\Controller;
use \W\Model\Model;
use \Model\AdvertModel;
use \Model\SportsModel;
use \Model\QuestionsModel;
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
		// Si l'utilisateur est connecté on le redirige vers son profil
		$loggedUser = $this->getUser();
		if($loggedUser) {
			$this -> redirectToRoute('user_profil');
		}		
		$title = 'Inscription';
		$this -> show('user/register_form', ['title' => $title]);
	}

	/**
	* Affichage du formulaire de connexion
	*/
	public function loginForm()
	{	 
		// redirection si userr connecté
		$loggedUser = $this->getUser();
		if($loggedUser) {
			$this -> redirectToRoute('default_index');
		}		
		$title = 'Connexion';
		$this -> show('user/login', ['title' => $title]);
	}
	/**
	 * ajout d'un utilisateur dans la BDD / Inscription
	 */
	public function addUser()
	{
		$userTable = new UsersModel;
		$auth = new AuthentificationModel;

		if(filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)== false){
			$message = 'veuillez rentrer une adresse mail valide ex : nom@domaine.com/fr';
			$auth-> setFlash($message,'error');
			$this -> redirectToRoute('user_register_form');
		}

		if(isset($_POST['birthdate']) && empty($_POST['birthdate'])){
			$message = 'veuillez renseignez le champ au bon format';
			$auth-> setFlash($message,'error');
			$this -> redirectToRoute('user_register_form');
		}
        /* 
        ** On vérifie que l'Email et le prénom ne sont pas déjà utilisés avant d'insérer les données.
        ** Si l'Email ou le prénom sont déjà utilisés, on redirige l'utilisateur vers la page du formulaire d'inscription avec le message d'erreur.
        */       
        $birthdateTime = date_create_from_format('j/m/Y',$_POST['birthdate']);
        $birthdate = $birthdateTime->format('Y-m-d');

        if($birthdate == false){
        	$message = 'la date n\'est pas au bon format ex : 01-01-2000';
        	$auth-> setFlash($message,'error');
        	$this -> redirectToRoute('user_register_form');
        }

        if($userTable->emailExists($_POST['email'])) {
        	$message = 'Cet Email existe déjà, veuillez en choisir un autre.';
        	$auth-> setFlash($message, 'error');
        	$this -> redirectToRoute('user_register_form');
        }
		/* 
        ** Si l'Email(dans notre cas il n'ya que l'émail) et le Username n'existent pas alors on peut ajouter le nouvel utilisateur en BDD
        */
		else{
			$newUser = array(
				'firstname' => htmlentities($_POST['firstname']),
				'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
				'birthdate'=> $birthdate,
				'email' => $_POST['email'],
				'gender' => $_POST['gender'],
				'role' => 'user'
				);
		}
		//ajout de l'utilisateur avec la fonction
		if($userTable-> insert($newUser)) {
			// Si l'enregistrement est OK on affiche la page d'acceuil avec le message de succès			
			$message = "Votre inscription est validée.";
			$auth-> setFlash($message, 'success');
			$auth = new AuthentificationModel;
			$user = $userTable -> getUserByUsernameOrEmail($newUser['email']);
			//connexion de l'utilisateur
			$auth -> logUserIn($user);
			$this -> redirectToRoute('user_profil');
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
		$auth = new AuthentificationModel;
		if($auth -> isValidLoginInfo($_POST['email'], $_POST['password']))
		{
			$util = new UsersModel;
			$user = $util -> getUserByUsernameOrEmail($_POST['email']);
			//connexion de l'utilisateur
			$auth -> logUserIn($user);
			//affichage
			$auth-> setFlash('Génial vous êtes connecté(e)', 'success');
			$this->redirectToRoute('default_index');
		}
		//sinon retour au formulaire
		else {
			$auth-> setFlash('Login ou mot de passe erroné. Réessayez', 'error');
			$this -> redirectToRoute('user_login_form');
		}
	}
	/*
	*Profil
	*/
	public function profil()
	{
		$loggedUser = $this->getUser();
		if($loggedUser) {
			$id_user=$_SESSION['user']['id'];
			$UsersModel=new UsersModel;
			$user=$UsersModel->find($id_user);

			$AdvertModel=new AdvertModel();
			$sql="SELECT a.*, s.name AS sport, s.logo, s.bkg_color FROM advert a, sports s, members m 
			WHERE a.id_member=$id_user
			AND a.id_member=m.id
			AND a.id_sport=s.id";
			$adverts=$AdvertModel->query($sql);

			$this -> show('user/profil', ['profil'=>$user, 'adverts'=>$adverts]);			
		}
		$this -> redirectToRoute('default_index');		
	}
	public function updateProfil(){
		
		$auth = new AuthentificationModel;
		$loggedUser = $this->getUser();
		if($loggedUser) {
			$id_user=$_SESSION['user']['id'];
			$birthdateTime = date_create_from_format('j/m/Y',$_POST['birthdate']);
			$birthdate = $birthdateTime->format('Y-m-d');

			$conformeTel = preg_match("#^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$#", $_POST['phone']);

			if(!$conformeTel){
				$message = "Veuillez entrer un numéro de téléphone valide !";
				$auth-> setFlash($message, 'error');
				$this-> redirectToRoute('user_profil');
			}

			if($_FILES['photo']['name']!=""){
				$extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
				//1. strrchr renvoie l'extension avec le point (« . »).
				//2. substr(chaine,1) ignore le premier caractère de chaine.
				//3. strtolower met l'extension en minuscules.
				$extension_upload = strtolower( substr( strrchr($_FILES['photo']['name'], '.')  ,1)  );
				$image_sizes = getimagesize($_FILES['photo']['tmp_name']);
				$maxwidth = 300;
				$maxheight = 300;
				var_dump($_FILES);
				//control de la photo uploader 
				//si le tableau array ne retourne pas l'extension_valides alors on affiche 
				if(!in_array($extension_upload,$extensions_valides)){
					$message = "Veuillez choisir une photo au format jpg/jpeg, png, gif ";
					$auth-> setFlash($message, 'error');
					$this-> redirectToRoute('user_profil');
				};

				//si la taille de l'image de départ est plus grande que la largeur max ou si  la taille de l'image et plus grand que la hauteur max alors
				if($image_sizes[0] > $maxwidth OR $image_sizes[1] > $maxheight){
					$message = "Veuillez choisir de 300 x 300 pixels maximum";
					$auth-> setFlash($message, 'error');
					$this-> redirectToRoute('user_profil');
				};

				$photo = $_FILES['photo']['name'];
				$photoPath=$_SERVER['DOCUMENT_ROOT'].$_POST['path'].$photo;
				copy($_FILES['photo']['tmp_name'], $photoPath);
				$_SESSION['user']['photo']=$photo;
			}
			else{
				$photo=$_SESSION['user']['photo'];
			}			

			$UsersModel=new UsersModel;
			$user = array(
				'firstname' => htmlentities($_POST['firstname']),				
				'birthdate'=> $birthdate,
				'presentation'=> $_POST['presentation'],
				'photo' => $photo,
				'phone'=> $_POST['phone'],				
				'gender' => $_POST['gender']			
				);		
			
			//update de l'utilisateur 
			if($UsersModel-> update($user, $id_user)){
				// Si l'enregistrement est OK 
				$message = "Profil mis à jour !";
				$auth-> setFlash($message, 'success');				
				$this -> redirectToRoute('user_profil');
			} 
			else{
				// Sinon on reste sur la page et on affiche le message d'erreur				
				$message = "Il y a eu problème lors de la mise à jour de votre profil";
				$auth-> setFlash($message, 'error');
				$this -> redirectToRoute('user_profil');
			}	
		}
	}

	// suppression d'une annonce par le user
	public function deleteAdvert($id){
		$AdvertModel=new AdvertModel();
		$AdvertModel->delete($id);
		$this -> redirectToRoute('user_profil');
	}
	/*
	*Déconnexion
	*/
	public function logout()
	{
		$auth = new AuthentificationModel;
		$auth -> logUserOut();
		$auth-> setFlash('Vous êtes deconnecté(e)', 'info');
		$this -> redirectToRoute('default_index');
	}

	public function adminIndex(){
		$this->allowTo('admin');
		$AdvertModel=new AdvertModel;
		$UsersModel=new UsersModel;
		$SportsModel=new SportsModel;

		$adverts=$AdvertModel->findAll();
		$users=$UsersModel->findAll();
		$sports=$SportsModel->findAll();


		$title = 'Administration';
		$this -> show('admin/index', ['title' => $title, 'adverts' => $adverts, 'users' => $users, 'sports' => $sports]);
	}

	// admin change le rôle des users
	public function adminUpdateUser(){
		$this->allowTo('admin');
		$UsersModel=new UsersModel;
		$user=array('role'=>$_POST['role']);
		$id=$_POST['id_user'];
		$users=$UsersModel->update($user, $id);
		$this -> redirectToRoute('user_admin_index');		
	}

	// admin supprime user
	public function adminDeleteUser($id){
		$this->allowTo('admin');
		$UsersModel=new UsersModel;
		$UsersModel->delete($id);
		$this -> redirectToRoute('user_admin_index');	
	}

	// admin supprime une annonce
	public function adminDeleteAdvert($id){
		$this->allowTo('admin');
		$adverts=new AdvertModel;
		$adverts->delete($id);
		$this -> redirectToRoute('user_admin_index');
	}

	// admin met à jour un sport
	public function adminUpdateSports(){
		$this->allowTo('admin');
		$id=$_POST['id_sport'];
		$sports = new SportsModel;
		$sport=array('bkg_color'=>"#".$_POST['color'],
			'name'=>$_POST['sports_name'],
			'logo'=>$_POST['logo']);
		$sports->update($sport, $id);
		$this -> redirectToRoute('user_admin_index');
	}

	// admin ajoute un sport
	public function adminAddSport(){
		$this->allowTo('admin');
		
		$sports = new SportsModel;
		$sport=array(
			'name'=>'sport',
			'logo'=>'logo',
			'bkg_color'=>'couleur'
			);
		$sports->insert($sport);
		$this -> redirectToRoute('user_admin_index');
	}

	// admin supprime un sport
	public function adminDeleteSport($id){
		$this->allowTo('admin');
		
		$sports = new SportsModel;
		$sports->delete($id);
		$this -> redirectToRoute('user_admin_index');
	}

	// admin supprime un message d'une annonce
	public function adminDeleteMessage($id, $id_advert){
		$this->allowTo('admin');
		$question=new QuestionsModel;
		$question->delete($id);
		$this -> redirectToRoute('view_advert', ['id'=>$id_advert]);
	}	
}