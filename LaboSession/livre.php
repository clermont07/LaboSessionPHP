<?php
include("./Inc/header.php");


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
            Disponible: ";
            if($value->getDisponible() == 0 && $value->getDisponible() == "0"){
                $contenu .= "<p style=color:red>Non</p><br><br>";
            }else{
                $contenu .= "<p style=color:green>Oui</p><br><br>";
            }
            
            $contenu .= "<br><br>
            <a href=resultat.php?idLivre='".$value->getIdLivre()."'&theme=".$theme."><button>Informations</button></a>
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

