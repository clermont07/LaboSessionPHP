<?php
class CommentaireClientManager{
    //retour de l'objet de connexion PDO
    private $_db;

    //constructeur
    public function __construct($db){
        $this->setDb($db);
    }
    
    public function setDb($db){
        $this->_db = $db;
    }
    
    public function getDB(){
        return $this->_db;
    }
    public function CommentaireClientInserer($idClient,$commentaire,$idLivre){
        $query = $this->_db->prepare("INSERT into commentaireclient(idClient,Commentaire,idLivre) VALUES (:idClient,:com,:idLivre"); 
        $query->bindValue(":idClient",$idClient);
        $query->bindValue(":com",$commentaire);
        $query->bindValue(":idLivre",$idLivre);
        $query->execute();
    }
}

?>