<?php /* app/Model/CommentModel.php */
namespace Model;
use \W\Model\Model;

class ProjetModel extends Projet 
{

	public function findAllMovies()
	{	
		$movies = Projet::findAll($orderBy = 'id', $orderDir = 'ASC', $limit = null, $offset = null);
		return $movies;
	}

	public function findWithComments($id)
	{
		// 1 . Requête pour récupérer le film d'après son id
		//     On utilise ici la fonction find($id) disponible dans W/Model/model.php
		$movie = Model::find($id);

		// 2 . Requête SQL pour récupérer les commentaires associés au film
		$sql_commentaires = $this->dbh->prepare("SELECT content, movie_id, user_id, users.username 
		FROM comments 
		LEFT JOIN users ON comments.user_id = users.id 
		WHERE comments.movie_id = :id 
		ORDER BY comments.id DESC ");
		$sql_commentaires->execute(array('id' => $id));
		$comments = $sql_commentaires-> fetchAll();

		// 3 . Nous retournons les données compactées dans un seul array avec array_merge()
		return array('film'=> $movie, 'commentaires' => $comments);
	}



	function findByName($name) 
	{
		// Pour rechercher un film par le champs title
    	$movie = Projet::search(['title'=> $name]);
    	// On utilise ici La fonction search()
    	// qui est diponible dans le coeur du framework dans W/Model/model.php
    	return $movie;
    }


}
