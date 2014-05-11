<?php
include 'Conteneur/conteneurPanier.php';
include 'Conteneur/conteneurProduit.php';
include 'Conteneur/conteneurContenu.php';
include 'accesBD.php';

Class Gestion
	{
	//ATTRIBUTS PRIVES---------------------------------------------------------------------------------------------------------------------------
	private $tousLesProduits;
	private $tousLesPaniers;
	private $tousLesContenus;
	private $maBD;
	
	//CONSTRUCTEUR--------------------------------------------------------------------------------------------------------------------------------
	public function __construct()
		{
		$this->tousLesProduits  = new conteneurProduit();
		$this->tousLesPaniers   = new conteneurPanier();
		$this->tousLesContenus  = new conteneurContenu();
		$this->maBD = new accesBD();
		$this->chargeLesDonnees();
		}
		
	//METHODE INSERANT UN PRODUIT----------------------------------------------------------------------------------------------------------
	public function ajouteUnProduit($unLibelle)
		{
		//insertion du produit dans la base de donn�es
		$sonCode=$this->maBD->insertProduit($unLibelle);
		//instanciation du produit et ajout de celui-ci dans la collection
		$this->tousLesProduits->ajouteUnProduit($sonCode,$unLibelle);
		}

	//METHODE INSERANT UN PANIER--------------------------------------------------------------------------------------------------------
	public function ajouteUnPanier($uneDate)
		{
		//insertion du panier dans la base de donn�es
		$this->maBD->insertPanier($uneDate);
		//instanciation du panier et ajout de celui-ci dans la collection
		$this->tousLesPaniers->ajouteUnPanier($uneDate);
		}	
	
	//METHODE VERIFIANT L'EXISTENCE D'UN PANIER-------------------------------------------------------------------------------------------
	public function panierExistant($uneDate)
		{
		//pr�sence du panier dans la base de donn�es
		return $this->maBD->existsPanier($uneDate);
		}
				
	//METHODE INSERANT UN CONTENU--------------------------------------------------------------------------------------------------------
	public function ajouteUnContenu($unCode,$uneDate,$uneQuantite)
		{
		//insertion du contenu dans la base de donn�es
		//Cette m�thode n'a pas encore �t� r�alis�e
		
		}
		
	//METHODE RETOURNANT LA LISTE DES PRODUITS---------------------------
	//DANS UNE BALISE <SELECT>-----------------------------------------------------------------
	//EN PRE-SELECTIONNANT L'ITEM PASSE EN PARAMETRE------------------------------------------
	public function lesProduitsDansBaliseSELECT($selected)
		{
		return $this->tousLesProduits->lesProduitsDansBaliseSELECT($selected);
		}
	//METHODE RETOURNANT LA LISTE DES PANIERS--------------------------------
	//DANS UNE BALISE <SELECT>-----------------------------------------------------------------
	public function lesPaniersDansBaliseSELECT()
		{
		return $this->tousLesPaniers->lesPaniersDansBaliseSELECT();
		}
		
	//METHODE RETOURNANT le resultat de la requete sql pour ajax-----------------------------------------------------------------
	public function executeRequeteSQLpourAJAX($uneRequete)
		{
		return $this->maBD->executeRequeteSQLpourAJAX($uneRequete);
		}
		
	//METHODE CHARGEANT TOUS LES PRODUITS--------------------------------------------------------------------------------------
	private function chargeLesProduits()
		{
		$resultat=$this->maBD->chargement('Produit');
		$nb=0;
		while ($nb<sizeof($resultat))
			{
			//instanciation du produit et ajout de celui-ci dans la collection
			$this->tousLesProduits->ajouteUnProduit($resultat[$nb][0],$resultat[$nb][1]);
			$nb++;
			}
		}
		
	//METHODE CHARGEANT TOUS LES PANIERS-----------------------------------------------------------------------------------
	private function chargeLesPaniers()
		{
		$resultat=$this->maBD->chargement('Panier');
		$nb=0;
		while ($nb<sizeof($resultat))
			{
			//instanciation du panier et ajout de celui-ci dans la collection
			$this->tousLesPaniers->ajouteUnPanier($resultat[$nb][0]);
			$nb++;
			}
		}
		
	//METHODE CHARGEANT TOUS LES CONTENUS-----------------------------------------------------------------------------------
	private function chargeLesContenus()
		{
		$resultat=$this->maBD->chargement('Contenir');
		$nb=0;
		while ($nb<sizeof($resultat))
			{
			//r�cup�ration de l'objet Produit � partir de son code
			$leProduit = $this->tousLesProduits->donneObjetProduitDepuisCode($resultat[$nb][1]);
			//r�cup�ration de l'objet Panier � partir de sa date
			$lePanier = $this->tousLesPaniers->donneObjetPanierDepuisDate($resultat[$nb][0]);
			//instanciation du contenu et ajout de celui-ci dans la collection
			$this->tousLesContenus->ajouteUnContenu($lePanier,$leProduit,$resultat[$nb][2]);
			$nb++;
			}
		}
		
	//METHODE CHARGEANT TOUTES LES DONNEES----------------------------------------------------------------------------------------------------------
	private function chargeLesDonnees()
		{
		$this->chargeLesProduits();
		$this->chargeLesPaniers();
		$this->chargeLesContenus();
		}

	}
	
?>