<?php

include("./Inc/header.php");
require("./Inc/fonction.php");

if(isset($_POST["submitCommande"])){ 

    $clientManager = new ClientManager(connexion("bdd_catalogue"));
    $result = $clientManager->getClientExistant($_POST['courriel']);

    if($result != null){
        $result = $clientManager->ClientUpdate($_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['codePostal'],$_POST['numCarte'],$_POST['dateExpiration'],$_POST['numCVC'],$_POST['courriel']);
    }else{
        try{
        $result = $clientManager->ClientInscrit($_POST['nom'],$_POST['prenom'],$_POST['adresse'],$_POST['codePostal'],$_POST['numCarte'],$_POST['dateExpiration'],$_POST['numCVC'],$_POST['courriel']);
        }
        catch(Exception $e){
            header("Location:panier.php?idLivre=-1");
        }
    }

    $clientManager = new ClientManager(connexion("bdd_catalogue"));
    $result = $clientManager->getClientExistant($_POST['courriel']);

    $CommandeManager = new CommandeManager(connexion("bdd_catalogue"));
    $objDateTime = Date("Y-m-d H:i:s");

    foreach($result as $key => $value){
        $results = $CommandeManager->CommandeInserer($value->idClient(),$_SESSION['avecTaxe'],$_SESSION['tvq'],$_SESSION['tps'],$_SESSION['avantTaxe'],$objDateTime); 
    }
    foreach($result as $key => $value){
        $resultat = $CommandeManager->getCommandeExistant($value->idClient(),$objDateTime);

        $DetailManager = new DetailCommandeManager(connexion("bdd_catalogue"));
        foreach($resultat as $key => $value){
            $count=count($_SESSION['panier']['idLivre']);
            for ($i=0; $i <$count ; $i++) {
                $_SESSION['panier']['titre'][$i];
                $resultats = $DetailManager->detailInserer($value->idCommande(),$_SESSION['panier']['idLivre'][$i],$_SESSION['qte'.$i]); 
            }
            header("Location:boncommande.php?idCommande='".$value->idCommande()."'");
        }
    }
} 

    echo"<form method='POST' enctype='multipart/form-data'>";
    echo("<center><div ><table border style=background:#e6ffe6;>");
    echo("<tr><td colspan=5> Information Client </td></tr>");
    echo ("<tr><td colspan=5 ><p>Nom : <input name='nom' required/>");
    echo ("<tr><td colspan=5 ><p>Prenom : <input name='prenom' required/>");
    echo ("<tr><td colspan=5 ><p>Courriel : <input name='courriel' required/>");
    echo ("<tr><td colspan=5 ><p>Adresse : <input name='adresse' required/>");
    echo ("<tr><td colspan=5 ><p>Code Postal : <input name='codePostal' required/>");
    echo ("<tr><td colspan=5 ><p>Inserer votre mode de paiement");
    echo ("<tr><td colspan=5 ><p>Numéro de carte : <input name='numCarte' required/>");
    echo ("<tr><td colspan=5 ><p>Date Expiration : <input name='dateExpiration' type='date' required/>");
    echo ("<tr><td colspan=5 ><p>Numéro CVC : <input name='numCVC' required/>");

    $count=count($_SESSION['panier']['idLivre']);
    echo("<tr><td colspan=5> Détail de la commande</td></tr>");
    echo("<tr><td>Quantité</td><td>Titre</td><td >Couverture</td><td >Prix</td></tr>");
    $montant = 0;
    for ($i=0; $i <$count ; $i++) {
        echo "<tr><td>";
        echo $_POST['qte'.$i];
        $_SESSION['qte'.$i] = $_POST['qte'.$i];
        echo "</td><td> ".$_SESSION['panier']['titre'][$i]."</td><td> "."<img src=".$_SESSION['panier']['image'][$i]." width=170 height=200></td><td>".$_SESSION['panier']['prix'][$i]*$_POST['qte'.$i];
    }

    $_SESSION['avantTaxe'] = montantGlobal();
    $_SESSION['tps'] = tps($_SESSION['avantTaxe']);
    $_SESSION['tvq'] = tvq($_SESSION['avantTaxe']);
    $_SESSION['avecTaxe'] = avecTaxe($_SESSION['tvq'],$_SESSION['tvq'],$_SESSION['avantTaxe']);

    echo("<tr><td colspan=5>Avant Taxe:".$_SESSION['avantTaxe']."$</td></tr>");
    echo("<tr><td colspan=5>Tps:".round($_SESSION['tps'],2)."$</td></tr>");
    echo("<tr><td colspan=5>Tvq:".round($_SESSION['tvq'],2)."$</td></tr>");
    echo("<tr><td colspan=5>Total:".round($_SESSION['avecTaxe'],2)."$</td></tr>");
    echo("<tr><td colspan=5><input type='submit'  name='submitCommande'  value='Passer la commande'></td></tr>");
    echo("<tr><td colspan=5> <a href=panier.php?idLivre=0> Retour au panier</a></td></tr>");
    echo("<tr><td colspan=5> <a href=catalogue.php> Retour au catalogue</a></td></tr>");
    echo"</form>";
    echo("</table></center>");

?>