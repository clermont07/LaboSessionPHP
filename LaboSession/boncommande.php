<?php

include("./Inc/header.php");
require("./Inc/fonction.php");

$commandeManager = new CommandeManager(connexion("bdd_catalogue"));
$resultCommande = $commandeManager->getCommande($_GET['idCommande']);

if($resultCommande != null){
    foreach($resultCommande as $keyCommande => $valueCommande){
        $clientManager = new ClientManager(connexion("bdd_catalogue"));
        $resultClient = $clientManager->getClient($valueCommande->idClient());

        foreach($resultClient as $keyClient => $valueClient){
            echo"<form method='POST' enctype='multipart/form-data'>";
            echo("<center><div ><table border style=background:#e6ffe6;>");
            echo("<tr><td colspan=5> Recu Commande </td></tr>");
            echo ("<tr><td colspan=5 ><p>Date Achat : ".$valueCommande->dateAchat());
            echo ("<tr><td colspan=5 ><p>Nom : ".$valueClient->Nom()." ".$valueClient->Prenom());
            echo ("<tr><td colspan=5 ><p>Courriel :".$valueClient->Courriel());
            echo ("<tr><td colspan=5 ><p>Adresse : ".$valueClient->Adresse()." , ".$valueClient->codePostal());
            echo ("<tr><td colspan=5 ><p>Mode de paiement");
            echo ("<tr><td colspan=5 ><p>Numéro de carte :".$valueClient->numeroDeCarte());
            echo ("<tr><td colspan=5 ><p>Date Expiration :".$valueClient->dateExpiration());
            echo ("<tr><td colspan=5 ><p>Numéro CVC : ".$valueClient->numCVC());
            echo ("<tr><td colspan=5 ><p>Commande");
        }
        echo ("<tr><td colspan=5 ><p>Numero de commande : ".$valueCommande->idCommande());

        $detailManager = new DetailCommandeManager(connexion("bdd_catalogue"));
        $resultDetail = $detailManager->getDetails($_GET['idCommande']);

        $livreManager = new LivreManager(connexion("bdd_catalogue"));

        foreach($resultDetail as $keyDetail => $valueDetail){

            $resultLivre = $livreManager->getLivresId($valueDetail->idLivre());

            foreach($resultLivre as $keyLivre => $valueLivre){
                
                echo ("<tr><td colspan=5 ><p>Titre : ".$valueLivre->getTitre());
                echo ("<tr><td colspan=5 ><p>Prix : ".$valueLivre->getPrix());
                
                $qte =  $valueLivre->getDisponible() - $valueDetail->quantiter();
                $resultQuantiter = $livreManager->getUpdateQuantiter($qte,$valueLivre->getIdLivre());
            }
            echo ("<tr><td colspan=5 ><p>Quantiter : ".$valueDetail->quantiter());

            
        }

        echo ("<tr><td colspan=5 ><p>Avant Taxes : ".$valueCommande->PrixSomLivre());
        echo ("<tr><td colspan=5 ><p>Tps : ".$valueCommande->Tps());
        echo ("<tr><td colspan=5 ><p>Tvq : ".$valueCommande->Tvq());
        echo ("<tr><td colspan=5 ><p>Total : ".$valueCommande->PrixTotal());
        echo("</table></center>");
        echo"</form>";
    }
}
?>