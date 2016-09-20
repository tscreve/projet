<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Model\Model;
use \Model\AdvertModel;
use \Model\SportsModel;
use \Model\ParticipationModel;
use \W\Model\UsersModel;
use \W\Security\AuthentificationModel;

class DefaultController extends Controller
{
	/**
	 * Page d'accueil par défaut
	 */
	public function index()
	{
		$AdvertModel=new AdvertModel();		
		$sql="SELECT s.name AS sport, s.bkg_color, s.logo, m.firstname, a.id, a.description, a.place, a.level, a.event_date, a.event_time, a.remain_participant, a.advert_post_date FROM sports s, advert a, members m WHERE a.id_sport=s.id AND a.id_member=m.id";
		$allAdverts=$AdvertModel->query($sql);	

		$this->show('default/index',['allAdverts'=>$allAdverts]);
	}
	public function viewAdvert($id){
		$AdvertModel=new AdvertModel();
		$sql="SELECT a.*, s.name AS sport, m.id as poster FROM advert a, sports s, members m WHERE a.id=$id
						AND a.id_sport=s.id
						AND a.id_member=m.id";
		$advert=$AdvertModel->query($sql);
		// var_dump($advert);

		$participationModel=new ParticipationModel;
		$sql="SELECT m.*, p.nb_participant FROM members m, participation p WHERE p.id_advert=$id AND m.id=p.id_member";
		$participant=$participationModel->query($sql);
		// var_dump($participant);


		$UsersModel=new UsersModel;
		$user=$UsersModel->find($advert[0]['poster']);

		$this->show('advert/view', ['advert'=>$advert[0], 'poster'=>$user, 'participants'=>$participant]);

	}
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
		// 	
		// var_dump($_POST);
	}

	public function registerPlace(){
		$loggedUser = $this->getUser();
		if($loggedUser) {
			$SportsModel=new SportsModel();		
			$allSports=$SportsModel->findAll();

			$this->show('advert/register', ['allSports'=>$allSports]);	
		}
		$this -> redirectToRoute('default_index');		
	}

	public function participate($id){
		$loggedUser = $this->getUser();
		$auth = new AuthentificationModel;
		if($loggedUser) {			
			// var_dump($_SESSION['user']);			
			$idAdvert=$id;
			$idMember=$_SESSION['user']['id'];
			$add_participant=$_POST['participant'];

			$AdvertModel=new AdvertModel;
			$sql="SELECT remain_participant AS pp FROM advert WHERE id=$idAdvert";
			$sql=$AdvertModel->query($sql);	
			$remain_participant=$sql[0]['pp'];
			$remain_participant=$remain_participant-$add_participant;
			$advert=array(
				'remain_participant'=>$remain_participant
				);
			// var_dump($advert);			
			$AdvertModel->update($advert, $idAdvert);

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
}