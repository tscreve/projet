<?php

namespace Controller;

use \W\Controller\Controller;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home()
	{
		$this->show('default/home');
	}


	/**
	 * Page hello
	 */
	public function hello()
	{
		$this->show('default/hello', ['username' => 'Bruce Willis']);
	}

}