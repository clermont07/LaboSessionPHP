<?php
include("./Inc/header.php");
require("./Inc/fonction.php");

//mise en page
?>
<link rel="stylesheet" href="./styles/style.css">
<div class="container">
    <h1>Livres de la catégorie: <?php echo $_GET["theme"]; ?></h1>
    <div class="itemsV">
    <?php
//afficher les livres
if(isset($_GET["theme"])){
    $contenu = "";
    $theme = $_GET["theme"];
    $livreManager = new LivreManager(connexion("bdd_catalogue"));
    $result = $livreManager->getLivresTheme($theme);
    if($result != null){
        foreach($result as $key => $value){
            $contenu .= "<div class=item>
            <div class=infos>
            <span class=titre>Titre: ".$value->getTitre()."</span><br>
            Auteur: ".$value->getAuteur()."<br>
            Prix: ".$value->getPrix()."$<br>
            Theme: ".$value->getTheme()."<br>
            Disponible: ".$value->getDisponible()."<br><br>
            Extrait de chapitre:<br> <span class=extChap>".$value->getExtraitChapitre()."</span><br><br>
            <a href=#><button>Ajotuer au panier</button></a>
            </div>
            <img src='".$value->getImage()."'>
            </div>";
        }
    }else{
        $contenu .= "aucun livre";
    }
    echo $contenu;
}



?>
    </div>
</div>

