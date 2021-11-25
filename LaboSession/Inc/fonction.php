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
        $_SESSION['panier']['prix'] = array();
        $_SESSION['panier']['image'] = array();
        $_SESSION['panier']['auteur'] = array();
        $_SESSION['panier']['theme'] = array();
        $_SESSION['panier']['disponible'] = array();
    }
    return true;
}

function ajouterProduitDansPanier($idLivre,$titre,$image,$disponible,$prix,$auteur,$theme){
    if(in_array($idLivre,$_SESSION['panier']['idLivre'])){
    }else{
        array_push($_SESSION['panier']['idLivre'], $idLivre);
        array_push($_SESSION['panier']['disponible'], $disponible);
        array_push($_SESSION['panier']['prix'], $prix);
        array_push($_SESSION['panier']['titre'], $titre);
        array_push($_SESSION['panier']['auteur'], $auteur);
        array_push($_SESSION['panier']['theme'], $theme);
        array_push($_SESSION['panier']['image'], $image);
    }
}

function montantGlobal(){
    if(!$_SESSION['panier'] == null){
    $total = 0;
    for($i = 0; $i<count($_SESSION['panier']['idLivre']);$i++){
        $total += $_POST['qte'.$i] * $_SESSION['panier']['prix'][$i];
    }
    return $total;
}
}
function tps($avantTaxe){
    if(!$_SESSION['panier'] == null){
    $total = $avantTaxe * 0.05;
    return $total;
}
}
function tvq($avantTaxe){
    if(!$_SESSION['panier'] == null){
    $total = $avantTaxe * 0.10;
    return $total;
}
}
function avecTaxe($tps,$tvq,$avantTaxe){
    if(!$_SESSION['panier'] == null){
    $total = $tps + $tvq + $avantTaxe;
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
        $tmp['image'] = array();
        $tmp['auteur'] = array();
        $tmp['theme'] = array();

        for($i = 0; $i < count($_SESSION['panier']['idLivre']); $i++){
            if($_SESSION['panier']['idLivre'][$i] !== $idLivre){
                array_push($tmp['idLivre'], $_SESSION['panier']['idLivre'][$i]);
                array_push($tmp['disponible'], $_SESSION['panier']['disponible'][$i]);
                array_push($tmp['prix'], $_SESSION['panier']['prix'][$i]);
                array_push($tmp['titre'], $_SESSION['panier']['titre'][$i]);
                array_push($tmp['image'], $_SESSION['panier']['image'][$i]);
                array_push($tmp['auteur'], $_SESSION['panier']['auteur'][$i]);
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
    if(isset($_POST['vider'])){
        $_SESSION['panier'] = null;
    }
    if(!$_SESSION['panier'] == null){
        $count=count($_SESSION['panier']['idLivre']);
        echo("<center><div ><table border style=background:#e6ffe6;>");
        echo("<tr><td colspan=5> Panier d'Achat</td></tr>");
        echo("<tr><td>Quantité</td><td>Titre</td><td >Couverture</td><td >Prix</td><td >Action</td></tr>");
    
        for ($i=0; $i <$count ; $i++) {
            echo "<tr><td>";
            $contenu = '';
            $contenu.= "<form method='post' action='passercommande.php'><select  name=qte".$i.">";
            for($a=1;$a<=$_SESSION['panier']['disponible'][$i]&&$a <= 10;$a++)
            {
                $contenu.="<option value=".$a.">".$a."</option> ";
            }
            $contenu.= "</select>";
            echo $contenu;
            echo "</td><td> ".$_SESSION['panier']['titre'][$i]."</td><td> "."<img src=".$_SESSION['panier']['image'][$i]." width=170 height=200></td><td>".$_SESSION['panier']['prix'][$i]."$</td><td><a href=traitement.php?indice=".$i.">supprimer</a></td></tr>";
        }
        echo("<tr><td colspan=5> <input type='submit' value='valider et declarer le paiement'/></form> </td></tr>");
        echo("<tr><td colspan=5> <form name=vider method=POST><input type=submit name=vider value='Vider le panier'></form></td></tr>");
        echo("<tr><td colspan=5> <a href=catalogue.php>Retour au catalogue</a></td></tr>");
        echo("</table></center>");
        }else{
            echo("<center><div ><table border style=background:#e6ffe6;>");
            echo("<tr><td colspan=5> Panier d'Achat</td></tr>");
            echo("<tr><td>Quantité</td><td>Titre</td><td >Couverture</td><td >Prix</td><td >Action</td></tr>");
            echo("<tr><td colspan=5> <form name=vider method=POST><input type=submit name=vider value='Vider le panier'></form></td></tr>");
            echo("<tr><td colspan=5> <a href=catalogue.php> Retour au catalogue</a></td></tr>");
            echo("</table></div></center>");
    }
}
?>