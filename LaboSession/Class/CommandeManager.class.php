<?php
class CommandeManager{
    //retour de l'objet de connexion PDO
    private $_db;

    //constructeur
    public function __construct($db){
        $this->setDb($db);
    }
    
    public function setDb($db){
        $this->_db = $db;
    }
    public function getTest(){
        return "test";
    }
    
    public function getDB(){
        return $this->_db;
    }
    
    public function CommandeInserer($idClient,$PrixTotal,$tvq,$tps,$avTaxe,$objDateTime){
        $query = $this->_db->prepare("INSERT into commande(idClient,PrixTotal,Tvq,Tps,PrixSomLivre,dateAchat) VALUES (:idClient,:PrixTotal,:tvq,:tps,:avTaxe,:objDateTime)"); 
        $query->bindValue(":idClient",$idClient);
        $query->bindValue(":PrixTotal",$PrixTotal);
        $query->bindValue(":tvq",$tvq);
        $query->bindValue(":tps",$tps);
        $query->bindValue(":avTaxe",$avTaxe);
        $query->bindValue(":objDateTime",$objDateTime);
        $query->execute();
    }
    public function getCommandeExistant($idClient,$objDateTime){
        $query = $this->_db->query("SELECT * FROM commande WHERE dateAchat = '".$objDateTime."' AND idClient = '".$idClient."'");
        $commande = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){

            $commande[] = new Commande($data);

        }     
        return $commande;  
    }
    public function getCommande($idCommande){
        $query = $this->_db->query("SELECT * FROM commande WHERE idCommande = ".$idCommande."");
        $commande = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){

            $commande[] = new Commande($data);

        }     
        return $commande;  
    }
    
}
?>