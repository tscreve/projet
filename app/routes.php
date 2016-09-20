<?php
	
	$w_routes = array(
		/* 
		FONCTIONNEMENT DU ROUTING ALTO ROUTER
		@Param1 : GET ou POST ou GET|POST est la méthode , 
		@Param2 : Le masque d'URL, c'est à dire l'Url appelée par le Client,
		@Param3 : Le controller et la méthode appelée (controller#methode)
		@Param4 : Le nom de la route. Réutilisable dans les vues et les controller pour créer des liens ou rediriger
		*/
		['GET', '/', 'Default#index', 'default_index'],	

		// enregistrement de l'annonce
		['GET', '/advert/register', 'Default#registerPlace', 'default_registerPlace'],
		['POST', '/advert/register', 'Default#addPlace', 'default_addPlace'],

		//vue d'une annonce
		['GET', '/advert/[:id]', 'Default#viewAdvert', 'view_advert'],
		['POST', '/advert/[:id]', 'Default#participate', 'advert_participate'],


		['POST', '/question', 'Default#question', 'advert_question'],

		/* Ajouter-Supprimer un commentaire
		['POST', '/addComment', 'Comment#addComment', 'comment_add_comment'],
		['POST', '/deleteComment', 'User#deleteComment', 'user_delete_comment'],*/






//2.1	/* inscription utilisateur dans la BDD*/
		['GET', '/register', 'User#registerForm', 'user_register_form'],
		['POST', '/adduser', 'User#addUser', 'user_add_user'],

		/* connexion un utilisateur*/
		['GET', '/login', 'User#loginForm', 'user_login_form'],
		['POST', '/login', 'User#login', 'user_login'],

		['GET', '/profil', 'User#profil', 'user_profil'],
		['POST', '/profil', 'User#updateProfil', 'user_update_profil'],

		['GET', '/logout', 'User#logout', 'user_logout'],

		/* Partie Admin - Ajouter-Modifier-Supprimer un film*/
		['GET', '/admin', 'User#adminIndex', 'user_admin_index'],
		['GET', '/admin/film/[:id]', 'User#adminMovie', 'user_admin_movie'],
		['POST', '/admin/film/[:id]', 'User#adminAddMovie', 'user_admin_add_movie'],
	

	);