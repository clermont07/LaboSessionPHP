<?php

include("./Inc/header.php");
require("./Inc/fonction.php");


if($_GET['idLivre'] != 0){
    if($_GET['idLivre'] == -1){
        echo"<center><p style='color:red;'>Une erreur c'est produite</p></center>";
    }
    $livreManager = new LivreManager(connexion("bdd_catalogue"));
    $result = $livreManager->getLivreId($_GET['idLivre']);

    creationPanier();
    //ajout d'item dans le panier
    ajouterProduitDansPanier($result->getIdLivre(),$result->getTitre(),$result->getImage(),$result->getDisponible(),$result->getPrix(),$result->getAuteur(),$result->getTheme());
    affiche_panier();
    
}else{

    affiche_panier();
}

?>