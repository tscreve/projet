<?php

namespace Controller;

use \W\Controller\Controller;
use \W\Model\Model;
use \Model\AdvertModel;

class DefaultController extends Controller
{
	/**
	 * Page d'accueil par défaut
	 */
	public function index()
	{
		$AdvertModel=new AdvertModel();		
		$allPlaces=$AdvertModel->findAll();			
	
		$this->show('default/index',['coordsPlaces'=>$allPlaces]);
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
		$this->show('advert/register');
	}

}