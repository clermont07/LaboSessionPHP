<?php
include("./Inc/header.php");

if(isset($_GET['indice'])){
    $indice = (int)$_GET['indice'];
    $id = $_SESSION['panier']['idLivre'][$indice];
    supprimerArticle($id);
    header("Location:panier.php?idLivre=0");
}

?>