<?php

Class Panier
	{
	//ATTRIBUTS PRIVES-------------------------------------------------------------------------
	private $datePanier;
	
	//CONSTRUCTEUR-----------------------------------------------------------------------------
	public function __construct($uneDate)
		{
		$this->datePanier = $uneDate;
		}
	
	//ACCESSEURS-------------------------------------------------------------------------------
		
	public function getDatePanier()
		{
		return $this->datePanier;
		}
	
	}
	
?>