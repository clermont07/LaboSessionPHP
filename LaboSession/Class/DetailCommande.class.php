<?php

class DetailCommande
{
    private $_idCommande,$_idLivre,$_Quantiter;

    public function __construct(array $donnee = array()){
        if(!empty($donnee)){
            $this->hydrate($donnee);
        }
    }

    public function idCommande(){  return $this->_idCommande;}
    public function setIdCommande ($IdCommande){$this->_idCommande = $IdCommande;} 

    public function idLivre(){            return $this->_idLivre;}
    public function setIdLivre($IdLivre){              $this->_idLivre = $IdLivre;} 

    public function quantiter(){          return $this->_Quantiter;}
    public function setQuantiter($Quantiter){          $this->_Quantiter = $Quantiter;} 

    public function hydrate(array $donnee){
        foreach($donnee as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }
}
