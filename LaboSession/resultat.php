<?php
include("./Inc/header.php");
require("./Inc/fonction.php");

//mise en page
?>
<link rel="stylesheet" href="./styles/style.css">
<div class="container">
    <div class="itemV">

<?php

if(isset($_GET["idLivre"])){
    $contenu = "";
    $id = $_GET["idLivre"];
    $theme = $_GET["theme"];
    $livreManager = new LivreManager(connexion("bdd_catalogue"));
    $result = $livreManager->getLivreId($id);
    if($result != false){

        $contenu .=  "<div class=livre>
        <div class=header>
        
        <a href=panier.php?idLivre='".$result->getIdLivre()."'>Ajouter au panier</a>
        <a href=panier.php?idLivre=0>Consulter le panier</a>
        <a href=livre.php?theme=$theme>Retour à la recherche</a>
        
        </div>

        <img src='".$result->getImage()."'/>

        <div class=infos>
        <hr style=color:white;width: 300px;text-transform:bold; />
        <span class=titre>Titre: ".$result->getTitre()."</span><br>
        Auteur: ".$result->getAuteur()."<br>
        Prix: ".$result->getPrix()."$<br>
        Theme: ".$result->getTheme()."<br>
        Disponible: ".$result->getDisponible()."<br><br>
        Extrait de chapitre:<br> <span class=extChap>".$result->getExtraitChapitre()."</span><br><br>
       
        </div>
        
        </div>";

    }else{
        $contenu .= "un probleme est survenu";
    }
    echo $contenu;
}

?>
    </div>
</div>
