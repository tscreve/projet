<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function index()
	{
		$this->show('default/index');
	}

		public function hello()
	{
		$this->show('default/hello');
	}



}