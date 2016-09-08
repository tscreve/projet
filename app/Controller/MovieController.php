<?php
namespace Controller;

use \W\Controller\Controller;
use \Model\MoviesModel;

class MovieController extends Controller
{

	/**
	 * Fonction qui affiche la Liste des films
	*/
	public function index() {

		$MovieModel = new MoviesModel();
		$movies = $MovieModel->findAllMovies();
		// var_dump($movies);
		$title="Tous les films";
		$this->show('movie/index', ['films' => $movies, 'title' => $title]);	
	}

	/**
	 * fonction de recherche d'un film
	*/
	public function searchByname() {

		$movieModel = new MoviesModel();
		$movies = $movieModel->findByName($_POST['name']);
		// var_dump($movies);

		if(empty($movies)) {
			$title="Aucun résultat ne correspond à votre recherche";
		} else {
			$title="Votre recherche : " . $_POST['name'];
		}

		
		$this->show('movie/index', ['films' => $movies, 'title' => $title]);	
	}


	/**
	 *  Fonction qui affiche les détails d'un film avec ses commentaires
	*/
	public function details($slug, $id) {

		$MovieModel = new MoviesModel();
		$movie = $MovieModel->findWithComments($id);
	    // var_dump($movie);
		$this->show('movie/details', ['film' => $movie['film'], 'commentaires' => $movie['commentaires']]);
	
	}




}