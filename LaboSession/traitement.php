<?php
session_start();
require("inc/fonction.php");

if(isset($_GET['indice'])){
    $indice = (int)$_GET['indice'];
    $id = $_SESSION['panier']['idLivre'][$indice];
    supprimerArticle($id);
    header("Location:panier.php?idLivre=0");
}

?>