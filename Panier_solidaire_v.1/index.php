<?php
	session_start();

	//include du fichier CONTROLEUR
	include 'Controleur.php';

	//SI le controleur n'existe pas d�j�, on l'instancie
	if (!isset ($_SESSION['Controleur']))
		{
		$monControleur = new Controleur();
		$_SESSION['Controleur'] = serialize($monControleur);
		}
	else
	{
		$monControleur = unserialize($_SESSION['Controleur']);
	}

	//affichage de l'ent�te
	$monControleur->afficheEntete();

	//affichage du menu
	$monControleur->afficheMenu();

	//affichage du pied de page
	$monControleur->affichePiedPage();

	//SI on souhaite voir un vue particuli�re, on passe celle-ci en param�tre (elle est r�cup�r�e � travers la m�thode GET)
	if ((isset($_GET['vue']))&& (isset($_GET['action'])))
		$monControleur->affichePage($_GET['action'],$_GET['vue']);
?>