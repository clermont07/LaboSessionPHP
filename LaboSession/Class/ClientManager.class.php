<?php
class ClientManager{
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

    public function getClientExistant($clientExistant){
        $query = $this->_db->query("SELECT * FROM client WHERE Courriel = '".$clientExistant."'");
        $client = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){

            $client[] = new Client($data);

        }     
        return $client;  
    }

    public function ClientUpdate($nom,$prenom,$adresse,$codePostal,$numCarte,$dateExpiration,$numCVC,$Courriel){
        $query = $this->_db->prepare(" UPDATE client SET Nom = (:nom),Prenom = (:prenom),adresse = (:adresse),CodePostal = (:codePostal),NumeroDeCarte = (:numCarte),DateExpiration = (:dateExpiration),NumCVC = (:numCVC) WHERE Courriel=(:Courriel)"); 
        $query->bindValue(":nom",$nom);
        $query->bindValue(":prenom",$prenom);
        $query->bindValue(":adresse",$adresse);
        $query->bindValue(":codePostal",$codePostal);
        $query->bindValue(":numCarte",$numCarte);
        $query->bindValue(":dateExpiration",$dateExpiration);
        $query->bindValue(":numCVC",$numCVC);
        $query->bindValue(":Courriel",$Courriel);
        $query->execute();
    }
    
    public function ClientInscrit($nom,$prenom,$adresse,$codePostal,$numCarte,$dateExpiration,$numCVC,$Courriel){
        $query = $this->_db->prepare("INSERT into client(Nom,Prenom,adresse,CodePostal,NumeroDeCarte,DateExpiration,NumCVC,Courriel) VALUES (:nom,:prenom,:adresse,:codePostal,:numCarte,:dateExpiration,:numCVC,:Courriel)"); 
        $query->bindValue(":nom",$nom);
        $query->bindValue(":prenom",$prenom);
        $query->bindValue(":adresse",$adresse);
        $query->bindValue(":codePostal",$codePostal);
        $query->bindValue(":numCarte",$numCarte);
        $query->bindValue(":dateExpiration",$dateExpiration);
        $query->bindValue(":numCVC",$numCVC);
        $query->bindValue(":Courriel",$Courriel);
        $query->execute();
    }
    
    public function getClient($idClient){
        $query = $this->_db->query("SELECT * FROM client WHERE idClient = '".$idClient."'");
        $client = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){

            $client[] = new Client($data);

        }     
        return $client;  
    }
}
?>