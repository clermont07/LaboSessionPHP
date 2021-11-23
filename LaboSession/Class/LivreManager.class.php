<?php

class LivreManager{
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

    //fonctions
    public function getLivresTheme($theme){
        $query = $this->_db->query("SELECT * FROM livre WHERE Theme = '".$theme."'");
        $livres = array();
        
        while($data=$query->fetch(PDO::FETCH_ASSOC)){
  
            $livres[] = new Livre($data);
  
        }     
        return $livres;  
    }

    public function getLivresId($id){
        $req = $this->_db->query("SELECT * FROM livre WHERE idLivre = ".$id."");
        $data=$req->fetch(PDO::FETCH_ASSOC);
        if($data !== Null){
            $obj1 = new Livre($data);
            return $obj1;
        }
        return false;
    }
    

}