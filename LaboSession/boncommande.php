<style>
.addComment{
    margin-top: 20px;
    display:flex;
    flex-direction:column;
    justify-content: center;
    align-items: center;
    font-size: 30px;
}
</style>
<?php

include("./Inc/header.php");

$idLivre = 0;
$idClient = 0; 
$commandeManager = new CommandeManager(connexion("bdd_catalogue"));
$resultCommande = $commandeManager->getCommande($_GET['idCommande']);
$contenu = "";
if($resultCommande != null){
    foreach($resultCommande as $keyCommande => $valueCommande){
        $clientManager = new ClientManager(connexion("bdd_catalogue"));
        $resultClient = $clientManager->getClient($valueCommande->idClient());
        $idClient = $valueCommande->idClient();
        $idCommande = $valueCommande->idCommande();
        foreach($resultClient as $keyClient => $valueClient){

            $contenu .= "<form method='POST' enctype='multipart/form-data'>";
            $contenu .= "<center><div ><table class=fl-table>";
            $contenu .= "<tr><td colspan=5><p style=font-size:25px;text-decoration:underline> Recu Commande </p></td></tr>";
            $contenu .=  "<tr><td colspan=5 ><p>Date Achat : ".$valueCommande->dateAchat();
            $contenu .=  "<tr><td colspan=5 ><p>Nom : ".$valueClient->Nom()." ".$valueClient->Prenom();
            $contenu .=  "<tr><td colspan=5 ><p>Courriel :".$valueClient->Courriel();
            $contenu .=  "<tr><td colspan=5 ><p>Adresse : ".$valueClient->Adresse()." , ".$valueClient->codePostal();
            $contenu .=  "<tr><td colspan=5 ><p>Mode de paiement";
            $contenu .=  "<tr><td colspan=5 ><p>Numéro de carte :".$valueClient->numeroDeCarte();
            $contenu .=  "<tr><td colspan=5 ><p>Date Expiration :".$valueClient->dateExpiration();
            $contenu .=  "<tr><td colspan=5 ><p>Numéro CVC : ".$valueClient->numCVC();
            $contenu .=  "<tr><td colspan=5 ><p>Commande";
        }
        $contenu .= "<tr><td colspan=5 ><p>Numero de commande : ".$valueCommande->idCommande();

        $detailManager = new DetailCommandeManager(connexion("bdd_catalogue"));
        $resultDetail = $detailManager->getDetails($_GET['idCommande']);

        $livreManager = new LivreManager(connexion("bdd_catalogue"));

        foreach($resultDetail as $keyDetail => $valueDetail){

            $resultLivre = $livreManager->getLivresId($valueDetail->idLivre());
            $choix = array();
            $count = 0;
            foreach($resultLivre as $keyLivre => $valueLivre){
                $idLivre = $valueDetail->idLivre();
                $contenu .= "<tr><td colspan=5 ><p style=font-size:15px>Titre : ".$valueLivre->getTitre();
                $contenu .= "<tr><td colspan=5 ><p>Prix : ".$valueLivre->getPrix();
                $qte =  $valueLivre->getDisponible() - $valueDetail->quantiter();
                $resultQuantiter = $livreManager->getUpdateQuantiter($qte,$valueLivre->getIdLivre());
                $count++;
            }
            $contenu .= "<tr><td colspan=5 ><p>Quantiter : ".$valueDetail->quantiter();

            
        }

        $contenu .= "<tr><td colspan=5 ><p>Avant Taxes : ".$valueCommande->PrixSomLivre();
        $contenu .= "<tr><td colspan=5 ><p>Tps : ".$valueCommande->Tps();
        $contenu .= "<tr><td colspan=5 ><p>Tvq : ".$valueCommande->Tvq();
        $contenu .= "<tr><td colspan=5 ><p>Total : ".$valueCommande->PrixTotal();
        $contenu .="</table></center>";

        $contenu.= "<div class=addComment><form method='post' action=''><select  name=selectID>";
        foreach($resultDetail as $keyDetail => $valueDetail){
            $contenu.="<option value=".$valueDetail->idLivre().">";
            $resultLivre = $livreManager->getLivresId($valueDetail->idLivre());
            foreach($resultLivre as $keyLivre => $valueLivre){
                $contenu.=$valueLivre->getTitre();
            }
            $contenu.="</option> ";
        }
        $contenu.= "</select>
            <form method=post action=boncommande.php>
                <input style=width:500px type=text name=commentaire placeHolder='Ajouter un commentaire'>
                <input type=submit name=valider value='Ajouter le commentaire'>
            </form>
        ";
        $contenu .="</form></div>";
        


        echo $contenu;
    }
}
if(isset($_POST["valider"])){
    $commentaireClientManager = new CommentaireClientManager(connexion("bdd_catalogue"));
    $commentaireClientManager->CommentaireClientInserer($idClient,$_POST["commentaire"],$_POST['selectID']);
}
?>