<?php
include '/../Metier/Contenu.php';

Class conteneurContenu
{
	//ATTRIBUTS PRIVES-------------------------------------------------------------------------
	private $lesContenus;
	
	//CONSTRUCTEUR-----------------------------------------------------------------------------
	public function __construct()
		{
		// Instanciation de la collection de contenus
		$this->lesContenus = new arrayObject();
		}
	
	//METHODE AJOUTANT UN CONTENU-------------------------------------------------------------------------------
	public function ajouteUnContenu($unObjetPanier,	$unObjetProduit, $uneQuantite)
	{
		// Cette méthode n'a pas été réalisée
	}
		
}
	
?>