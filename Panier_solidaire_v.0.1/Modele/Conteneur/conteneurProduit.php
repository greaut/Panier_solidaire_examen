<?php
include '/../Metier/Produit.php';

Class conteneurProduit
	{
	//ATTRIBUTS PRIVES-------------------------------------------------------------------------
	private $lesProduits;
	
	//CONSTRUCTEUR-----------------------------------------------------------------------------
	public function __construct()
		{
		// Instanciation de la collection de produits
		$this->lesProduits = new arrayObject();
		}
	
	//METHODE AJOUTANT UN PRODUIT-------------------------------------------------------------------------------
	public function ajouteUnProduit($unCode, $unLibelle)
		{
		$unProduit = new Produit($unCode, $unLibelle);
		$this->lesProduits->append($unProduit);
		}
		
	//METHODE RETOURNANT UN PRODUIT A PARTIR DE SON CODE--------------------------------------------	
	public function donneObjetProduitDepuisCode($unCode)
		{
        // cette méthode n'a pas encore été réalisée
        }
        return $leBonProduit;
		}
		
	//METHODE RETOURNANT LA LISTE DES PRODUITS------------------------------------------------------
	//DANS UNE BALISE <SELECT>------------------------------------------------------------------
	//EN PRE-SELECTIONNANT L'ITEM PASSE EN PARAMETRE------------------------------------------
	public function lesProduitsDansBaliseSELECT($selected)
		{
		$liste = "<SELECT name = 'listeProduits'>";
		foreach ($this->lesProduits as $unProduit)
			{
			if(($selected==$unProduit->getCode())&&($selected!=null))
				$liste = $liste."<OPTION value='".$unProduit->getCode()."' selected>".$unProduit->getLibelle()."</OPTION>";
			else
				$liste = $liste."<OPTION value='".$unProduit->getCode()."'>".$unProduit->getLibelle()."</OPTION>";
			}
		$liste = $liste."</SELECT>";
		return $liste;
		}
	}
	
?>