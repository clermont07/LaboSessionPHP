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
    
    public function getDB(){
        return $this->_db;
    }

    //fonctions

    

}