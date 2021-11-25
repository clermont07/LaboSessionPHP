<?php
class DetailCommandeManager{
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
    
    public function detailInserer($idCommande,$idLivre,$Quantiter){
        $query = $this->_db->prepare("INSERT into detailcommande(idCommande,idLivre,Quantiter) VALUES (:idCommande,:idLivre,:Quantiter)"); 
        $query->bindValue(":idCommande",$idCommande);
        $query->bindValue(":idLivre",$idLivre);
        $query->bindValue(":Quantiter",$Quantiter);
        $query->execute();
    }
    
    public function getDetails($idCommande){
        $query = $this->_db->query("SELECT * FROM detailcommande WHERE idCommande = ".$idCommande."");
        $detail = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){

            $detail[] = new DetailCommande($data);

        }     
        return $detail;  
    }
}
?>