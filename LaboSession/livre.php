<?php
include("./Inc/header.php");
require("./Inc/fonction.php");


if(isset($_GET["theme"])){
    $theme = $_GET["theme"];
    $livreManager = new LivreManager(connexion("bdd_catalogue"));
    $result = $livreManager->getLivresTheme($theme);
    echo "<br>";
    if($result == false){
        echo "aucun livre";
    }else{
        foreach($result as $key => $value){
            echo "Prix: ".$value->getPrix()." <br>Titre: ".$value->getTitre();
        }
    }
    
}



?>