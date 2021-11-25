<?php



class CommentaireClient
{
    private $_idClient,$_Commentaire,$_idLivre;

    public function __construct(array $donnee = array()){
        if(!empty($donnee)){
            $this->hydrate($donnee);
        }
    }

    public function idClient(){  return $this->_idClient;}
    public function setIdClient ($idClient){$this->_idClient = $idClient;} 

    public function commentaire(){            return $this->_Commentaire;}
    public function setCommentaire($Commentaire){              $this->_Commentaire = $Commentaire;} 

    public function idLivre(){          return $this->_idLivre;}
    public function setIdLivre($IdLivre){          $this->_idLivre = $IdLivre;} 

    public function hydrate(array $donnee){
        foreach($donnee as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }

}
