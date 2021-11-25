<?php



class Client 
{
    private $_idClient,$_Nom,$_Prenom,$_Courriel,$_Adresse,$_CodePostal,$_NumeroDeCarte,$_DateExpiration,$_NumCVC;

    public function __construct(array $donnee = array()){
        if(!empty($donnee)){
            $this->hydrate($donnee);
        }
    }

    public function idClient(){  return $this->_idClient;}
    public function setIdClient ($idClient){$this->_idClient = $idClient;} 

    public function nom(){            return $this->_Nom;}
    public function setNom($Nom){              $this->_Nom = $Nom;} 

    public function prenom(){          return $this->_Prenom;}
    public function setPrenom($Prenom){          $this->_Prenom = $Prenom;} 

    public function courriel(){              return $this->_Courriel;}
    public function setCourriel($Courriel){          $this->_Courriel = $Courriel;} 

    public function adresse(){  return $this->_Adresse;}
    public function setAdresse ($Adresse){$this->_Adresse = $Adresse;} 

    public function codePostal(){            return $this->_CodePostal;}
    public function setCodePostal($CodePostal){              $this->_CodePostal = $CodePostal;} 

    public function numeroDeCarte(){          return $this->_NumeroDeCarte;}
    public function setNumeroDeCarte($NumeroDeCarte){          $this->_NumeroDeCarte = $NumeroDeCarte;} 

    public function dateExpiration(){              return $this->_DateExpiration;}
    public function setDateExpiration($DateExpiration){          $this->_DateExpiration = $DateExpiration;}
    
    public function numCVC(){              return $this->_NumCVC;}
    public function setNumCVC($NumCVC){          $this->_NumCVC = $NumCVC;} 

    public function hydrate(array $donnee){
        foreach($donnee as $key => $value){
            $method = 'set'.ucfirst($key);
            if(method_exists($this,$method)){
                $this->$method($value);
            }
        }
    }
}
