<?php

function chargerClasse($classe){
	require "./Class/".$classe . '.class.php'; // On inclut la classe
}

function connexion ($bdName){

	try{ 
		$db=new PDO("mysql:host=localhost;dbname=".$bdName."","root",""); 
	} 
	catch(PDOException $e){ 
		echo $e->getMessage(); 
	} 
	return $db;
}

spl_autoload_register('chargerClasse');



//panierLivre
//création 
function creationPanier(){
    if(!isset($_SESSION['panier'])){
        $_SESSION['panier'] = array();
        $_SESSION['panier']['idLivre'] = array();
        $_SESSION['panier']['titre'] = array();
        $_SESSION['panier']['auteur'] = array();
        $_SESSION['panier']['prix'] = array();
        $_SESSION['panier']['theme'] = array();
        $_SESSION['panier']['image'] = array();
        $_SESSION['panier']['disponible'] = array();
        $_SESSION['panier']['extraitChapitre'] = array();
    }
    return true;
}

function ajouterPoduitDansPanier($idLivre,$titre,$auteur,$prix,$theme,$image,$disponible,$extraitChapitre){

    if(creationPanier()){
        $positionProduit = array_search($idLivre, $_SESSION['panier']['idLivre']);
        if($positionProduit != false){
            $_SESSION['panier']['disponible'][$positionProduit] += $disponible;
        }else{
            array_push($_SESSION['panier']['idLivre'], $idLivre);
            array_push($_SESSION['panier']['disponible'], $disponible);
            array_push($_SESSION['panier']['prix'], $prix);
            array_push($_SESSION['panier']['titre'], $titre);
            array_push($_SESSION['panier']['auteur'], $auteur);
            array_push($_SESSION['panier']['theme'], $theme);
            array_push($_SESSION['panier']['image'], $image);
            array_push($_SESSION['panier']['extraitChapitre'], $extraitChapitre);
        }
    }else{
        echo "Un probleme est survenu";


    }
}


function montantGlobal(){
    if(!$_SESSION['panier'] == null){
    $total = 0;
    for($i = 0; $i<count($_SESSION['panier']['idLivre']);$i++){
        $total += $_SESSION['panier']['disponible'][$i] * $_SESSION['panier']['prix'][$i];
    }
    return $total;
}
}

function supprimerArticle($idLivre){
    if(creationPanier()){
        $tmp = array();
        $tmp['idLivre'] = array();
        $tmp['titre'] = array();
        $tmp['prix'] = array();
        $tmp['disponible'] = array();
        $tmp['auteur'] = array();
        $tmp['theme'] = array();
        $tmp['extraitChapitre'] = array();
        $tmp['image'] = array();

        for($i = 0; $i < count($_SESSION['panier']['idLivre']); $i++){
            if($_SESSION['panier']['idLivre'][$i] !== $idLivre){
                array_push($tmp['idLivre'], $_SESSION['panier']['idLivre'][$i]);
                array_push($tmp['disponible'], $_SESSION['panier']['disponible'][$i]);
                array_push($tmp['prix'], $_SESSION['panier']['prix'][$i]);
                array_push($tmp['titre'], $_SESSION['panier']['titre'][$i]);
                array_push($tmp['auteur'], $_SESSION['panier']['auteur'][$i]);
                array_push($tmp['image'], $_SESSION['panier']['image'][$i]);
                array_push($tmp['extraitChapitre'], $_SESSION['panier']['extraitChapitre'][$i]);
                array_push($tmp['theme'], $_SESSION['panier']['theme'][$i]);
            }
        }
        $_SESSION['panier'] = $tmp;
        unset($tmp);
    }else{
        echo "Un probleme est survenu";
    }
    affiche_panier();

}

function vide_panier(){
    $_SESSION['panier'] = null;
}

function affiche_panier(){
    if("" === ""){
        echo "wubda";
    }
}

?>