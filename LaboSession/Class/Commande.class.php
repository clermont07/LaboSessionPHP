<?php


class Commande 
{
    private $_idClient,$_idCommande,$_PrixTotal,$_DateAchat,$_PrixSomLivre,$_Tps,$_Tvq;

    public function __construct(array $donnee = array()){
        if(!empty($donnee)){
            $this->hydrate($donnee);
        }
    }
    public function prixSomLivre(){              return $this->_PrixSomLivre;}
    public function setPrixSomLivre($PrixSomLivre){          $this->_PrixSomLivre = $PrixSomLivre;} 

    public function tps(){  return $this->_Tps;}
    public function setTps ($Tps){$this->_Tps = $Tps;} 

    public function tvq(){            return $this->_Tvq;}
    public function setTvq($Tvq){              $this->_Tvq = $Tvq;} 

    public function dateAchat(){  return $this->_DateAchat;}
    public function setDateAchat ($DateAchat){$this->_DateAchat = $DateAchat;} 

    public function idClient(){  return $this->_idClient;}
    public function setIdClient ($idClient){$this->_idClient = $idClient;} 

    public function idCommande(){            return $this->_idCommande;}
    public function setIdCommande($idCommande){              $this->_idCommande = $idCommande;} 

    public function prixTotal(){          return $this->_PrixTotal;}
    public function setPrixTotal($PrixTotal){          $this->_PrixTotal = $PrixTotal;} 

    public function hydrate(array $donnee){
        foreach($donnee as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }

}
