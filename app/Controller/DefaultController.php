<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Model\Model;
use \Model\AdvertModel;
use \Model\SportsModel;
use \Model\QuestionsModel;
use \Model\ParticipationModel;
use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;

class DefaultController extends Controller
{
	/*
	 * Page d'accueil par défaut
	 */
	// on supprime les annonces expirées et on affiche toutes les autres
	public function index()
	{
		$AdvertModel=new AdvertModel();				

		$allAdverts=$AdvertModel->findAll();

		foreach($allAdverts as $advert){
			$advertDate = $advert['event_date'];
			$advertId=$advert['id'];
			$now=date('Y-m-d');
			if($advertDate<$now){
				$AdvertModel->delete($advertId);
			}  	   		
		}

		$sql="SELECT s.name AS sport, s.bkg_color, s.logo, m.firstname, a.id, a.description, a.place, a.level, a.event_date, a.event_time, a.remain_participant, a.advert_post_date FROM sports s, advert a, members m WHERE a.id_sport=s.id AND a.id_member=m.id ORDER BY a.event_date";
		$allAdverts=$AdvertModel->query($sql);

		$title='Accueil';
		$this->show('default/index',['title'=>$title, 'allAdverts'=>$allAdverts]);
	}

	// filtre les annonces par sport
	public function searchBySport($id){
		$AdvertModel=new AdvertModel();	
		$SportsModel=new SportsModel();	

		$sql="SELECT s.name AS sport, s.bkg_color, s.logo, m.firstname, a.id, a.description, a.place, a.level, a.event_date, a.event_time, a.remain_participant, a.advert_post_date FROM sports s, advert a, members m WHERE a.id_sport=s.id AND a.id_member=m.id AND s.id=$id";
		$allAdverts=$AdvertModel->query($sql);	

		$sport=$SportsModel->find($id);
		$title=$sport['name'];	
		$this->show('default/index',['title'=>$title, 'allAdverts'=>$allAdverts]);
	}

	// filtre les annonces par date
	public function searchByDate(){
		$AdvertModel=new AdvertModel();	
		$date=date_create_from_format('d/m/Y',$_POST['search_date']);		
		$searchDate=$date->format('Y-m-d');	

		$sql="SELECT s.name AS sport, s.bkg_color, s.logo, m.firstname, a.id, a.description, a.place, a.level, a.event_date, a.event_time, a.remain_participant, a.advert_post_date FROM sports s, advert a, members m WHERE a.id_sport=s.id AND a.id_member=m.id AND a.event_date='$searchDate'";
		$allAdverts=$AdvertModel->query($sql);
		
		$title="Pour le ".$_POST['search_date'];
		$this->show('default/index',['title'=>$title, 'allAdverts'=>$allAdverts]);
	}

	// on affiche une annonce
	public function viewAdvert($id){
		$AdvertModel=new AdvertModel();
		$sql="SELECT a.*, s.name AS sport, s.bkg_color, m.id as poster, s.logo FROM advert a, sports s, members m WHERE a.id=$id
		AND a.id_sport=s.id
		AND a.id_member=m.id";
		$advert=$AdvertModel->query($sql);

		$participationModel=new ParticipationModel;
		$sql="SELECT m.*, p.nb_participant FROM members m, participation p WHERE p.id_advert=$id AND m.id=p.id_member";
		$participant=$participationModel->query($sql);

		$QuestionsModel=new QuestionsModel;
		$sql="SELECT q.id, q.question, m.firstname FROM questions q, members m WHERE q.id_advert=$id AND q.id_sender=m.id ORDER BY q.date DESC";
		$questions=$QuestionsModel->query($sql);

		$UsersModel=new UsersModel;
		$user=$UsersModel->find($advert[0]['poster']);

		$this->show('advert/view', ['advert'=>$advert[0], 'poster'=>$user, 'participants'=>$participant, 'questions'=>$questions]);

	}

	// ajoute une annonce en BDD
	public function addPlace(){		
		$auth = new AuthentificationModel;
		$strDate=date_create_from_format('d/m/Y', $_POST['date']);
		$date=$strDate->format('Y-m-d');
		$strTime=date_create_from_format('H', $_POST['time']);
		$time=$strTime->format('H:i');

		$lat=$_POST['data-lat'];
		$lng=$_POST['data-lng'];
		
		$AdvertModel=new AdvertModel();
		$placeStr=$lat.';'.$lng;

		$advert=array(
			'id_member'=>$_SESSION['user']['id'],
			'id_sport'=>$_POST['id_sport'],
			'place'=>$placeStr,
			'description'=>htmlentities($_POST['description']),
			'level'=>$_POST['level'],
			'event_date'=>$date,
			'event_time'=>$time,
			'nb_participant'=>$_POST['nb_participant'],
			'remain_participant'=>$_POST['nb_participant'],
			'statut'=>'available'
			);

		if($AdvertModel->insert($advert)){
			$message = "Annonce enregistrée.";
			$auth-> setFlash($message, 'success');
			$this -> redirectToRoute('user_profil');
		}
		else{
			$message = "Il y a eu problème lors de l'enregistrement de votre annonce";
			$auth-> setFlash($message, 'error');
			$this->show('advert/register');
		}		
	}

	// affichage du formulaire pour enregistrer une annonce
	public function registerPlace(){
		$loggedUser = $this->getUser();
		if($loggedUser) {
			$SportsModel=new SportsModel();		
			$allSports=$SportsModel->findAll();

			$this->show('advert/register', ['allSports'=>$allSports]);
		}
		$this -> redirectToRoute('user_login_form');		
	}

	// on clique sur le bouton participer
	public function participate($id){
		$loggedUser = $this->getUser();
		$auth = new AuthentificationModel;
		if($loggedUser) {			
			$idAdvert=$id;
			$idMember=$_SESSION['user']['id'];
			$add_participant=$_POST['participant'];

			$AdvertModel=new AdvertModel;
			$sql="SELECT remain_participant AS pp FROM advert WHERE id=$idAdvert";
			$sql=$AdvertModel->query($sql);	
			// on récupère le nombre de places disponibles en base et on soustrait le nombre de places commandées
			$remain_participant=$sql[0]['pp'];
			$remain_participant=$remain_participant-$add_participant;
			$advert=array(
				'remain_participant'=>$remain_participant
				);
			// maj du nombre de participant en BDD
			$AdvertModel->update($advert, $idAdvert);

			// on crée une entrée dans la table participation
			$participationModel=new ParticipationModel;
			$participation=array(
				'id_advert'=>$idAdvert,
				'id_member'=>$idMember,
				'nb_participant'=>$add_participant
				);
			$participationModel->insert($participation);
			$this -> redirectToRoute('view_advert', ['id'=>$id]);
		}
		else{
			$idAdvert=$id;
			$this->show('user/login', ['idAdvert'=>$idAdvert]);
		}		
	}

	// bouton envoyer un message sur la page vue d'une annonce, on vérifie que user est connecté
	public function question(){	
		$auth = new AuthentificationModel;
		$loggedUser = $this->getUser();
		$id=$_POST['id_advert'];
		if($loggedUser) {
			$Questions=new QuestionsModel;
			$question = array(
				'id_sender' => $_POST['id_sender'],				
				'id_advert' => $_POST['id_advert'],
				'question'=> htmlentities($_POST['question'])
				);	
			$Questions->insert($question);		
			$this -> redirectToRoute('view_advert', ['id'=>$id]);
		}else{
			$message = "Connecter vous pour poser une question.";
			$auth-> setFlash($message, 'error');	
			$this -> redirectToRoute('view_advert', ['id'=>$id]);
		}		
	}	
}