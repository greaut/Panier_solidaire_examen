<?php

Class Produit
	{
	//ATTRIBUTS PRIVES-------------------------------------------------------------------------
	private $code;
	private $libelle;
	
	//CONSTRUCTEUR-----------------------------------------------------------------------------
	public function __construct($unCode, $unLibelle)
		{
		$this->code = $unCode;
		$this->libelle = $unLibelle;
		}
	
	//ACCESSEURS-------------------------------------------------------------------------------
	public function getCode()
		{
		return $this->code;
		}
		
	public function getLibelle()
		{
		return $this->libelle;
		}
		
	}
	
?>