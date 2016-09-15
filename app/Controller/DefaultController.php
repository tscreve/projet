<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Model\Model;
use \Model\AdvertModel;
use \Model\SportsModel;

class DefaultController extends Controller
{
	/**
	 * Page d'accueil par défaut
	 */
	public function index()
	{
		$AdvertModel=new AdvertModel();		
		$allAdverts=$AdvertModel->findAll();	
		$SportsModel=new SportsModel();		
		$allSports=$SportsModel->findAll();		
	
		$this->show('default/index',['allAdverts'=>$allAdverts, 'allSports'=>$allSports]);
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
			'description'=>htmlentities($_POST['description']),
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