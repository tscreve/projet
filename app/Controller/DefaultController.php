<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Model\Model;
use \Model\AdvertModel;
use \Model\SportsModel;
use \W\Model\UsersModel;

class DefaultController extends Controller
{
	/**
	 * Page d'accueil par défaut
	 */
	public function index()
	{
		$AdvertModel=new AdvertModel();		
		$sql="SELECT s.name AS sport, a.id, a.description, a.place, a.level, a.event_date, a.event_time, a.nb_participant, a.advert_post_date FROM sports s, advert a WHERE a.id_sport=s.id";
		$allAdverts=$AdvertModel->query($sql);	

		$this->show('default/index',['allAdverts'=>$allAdverts]);
	}
	public function viewAdvert($id){
		$AdvertModel=new AdvertModel();
		$sql="SELECT a.*, s.name AS sport, m.id as poster FROM advert a, sports s, members m WHERE a.id=$id
						AND a.id_sport=s.id
						AND a.id_member=m.id";
		$advert=$AdvertModel->query($sql);

		$UsersModel=new UsersModel;
		$user=$UsersModel->find($advert[0]['poster']);

		$this->show('advert/view', ['advert'=>$advert, 'poster'=>$user]);

	}
	public function addPlace(){		
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
			'presentation'=>htmlentities($_POST['description']),
			'level'=>$_POST['level'],
			'event_date'=>$date,
			'event_time'=>$time,
			'nb_participant'=>$_POST['nb_participant'],
			'statut'=>'available'
			);

		$AdvertModel->insert($advert);
		// $this->show('advert/register');	
		var_dump($_POST);
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
}