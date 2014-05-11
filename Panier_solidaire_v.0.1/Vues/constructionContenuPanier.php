<?php
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
//Construction d'une requete dont la réponse sera récupérée par Ajax
//-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
session_start();

include '../Controleur.php';

$monControleur = unserialize($_SESSION['Controleur']);
$reponse="<TABLE>";
$requete = "SELECT p.libelle, c.quantite FROM contenir c, produit p ";
$requete = $requete."WHERE c.codeProduit = p.code ";
//
$requete.="AND datePanier = '".$_POST['itemDate']."'";
//
$resultat = $monControleur->executeRequeteSQLpourAJAX($requete);
while($ligne=$resultat->fetch_row())
	$reponse.="<TR><TD>".$ligne[0]."</TD><TD>".$ligne[1]."</TD></TR>";
$reponse.="</TABLE>";
echo $reponse;
?>