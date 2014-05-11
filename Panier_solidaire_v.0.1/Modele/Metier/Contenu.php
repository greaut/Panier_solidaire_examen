<?php

Class Contenu
	{
	//ATTRIBUTS PRIVES-------------------------------------------------------------------------
	private $lePanier;
	private $leProduit;
	private $quantite;
	
	//CONSTRUCTEUR-----------------------------------------------------------------------------
	public function __construct($unObjetPanier,$unObjetProduit,$uneQte)
		{
		$this->lePanier = $unObjetPanier;
		$this->leProduit = $unObjetProduit;
		$this->quantite = $uneQte;
		}
	
	//ACCESSEURS-------------------------------------------------------------------------------
		
	public function getLePanier()
		{
		return $this->lePanier;
		}
		
	public function getLeProduit()
		{
		return $this->leProduit;
		}
		
	public function getQuantite()
		{
		return $this->quantite;
		}
	
	}
	
?>