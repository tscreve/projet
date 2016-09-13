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
		$lat=$_POST['data-lat'];
		$lng=$_POST['data-lng'];

		$placeStr=$lat.';'.$lng;
		// var_dump($placeStr);

		$AdvertModel=new AdvertModel();

		$advert=array(
			'place'=>$placeStr
			);

		$AdvertModel->insert($advert);

		$this->show('advert/register');	
	}

	public function registerPlace(){
		$this->show('advert/register');
	}

}