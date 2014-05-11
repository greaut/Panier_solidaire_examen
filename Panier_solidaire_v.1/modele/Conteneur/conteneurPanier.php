<?php
include '/../Metier/Panier.php';

Class conteneurPanier
	{
	//ATTRIBUTS PRIVES-------------------------------------------------------------------------
	private $lesPaniers;
	
	//CONSTRUCTEUR-----------------------------------------------------------------------------
	public function __construct()
		{
		$this->lesPaniers = new arrayObject();
		}
	
	//METHODE AJOUTANT UN PANIER-----------------------------------------------------------------------------------
	public function ajouteUnPanier($uneDate)
		{
		$unPanier = new Panier ($uneDate);
		$this->lesPaniers->append($unPanier);
		}
		
	//METHODE RETOURNANT UN PANIER A PARTIR DE SA DATE--------------------------------------------	
	public function donneObjetPanierDepuisDate($uneDate)
		{

        $trouve=false;
        $leBonPanier=null;
        $i=0;
        while ((!$trouve)&&($i<$this->lesPaniers->count()))
            {
            if ($this->lesPaniers->offsetGet($i)->getDatePanier()==$uneDate)
                {
                $trouve=true;
                $leBonPanier = $this->lesPaniers->offsetGet($i);
                }
            else
                $i++;
            }
        return $leBonPanier;
		}

	//METHODE RETOURNANT LA LISTE DES PANIERS-----------------------------------------------
	//DANS UNE BALISE <SELECT>------------------------------------------------------------------
	public function lesPaniersDansBaliseSELECT()
		{
		$liste = "<SELECT id = 'listePaniers' onchange='appelAjax()'>";
		foreach ($this->lesPaniers as $unPanier)
			{
			$liste = $liste."<OPTION value='".$unPanier->getDatePanier()."'>".explode(" ",$unPanier->getDatePanier())[0]."</OPTION>";
			}
		$liste = $liste."</SELECT>";
		return $liste;
		}			
	}
	
?>