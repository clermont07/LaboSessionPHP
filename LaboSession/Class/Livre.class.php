<?php



class Livre
{

    private int $idLivre;

    private String $titre;

    private String $auteur;

    private float $prix;

    private String $theme;

    private String $commentaireClient;

    private String $image;

    private int $disponible;

    private String $extraitChapitre;

    //getters
    public function getIdLivre(){
        return $this->idLivre;
    }
    public function getTitre(){
        return $this->titre;
    }
    public function getAuteur(){
        return $this->auteur;
    }
    public function getPrix(){
        return $this->prix;
    }
    public function getTheme(){
        return $this->theme;
    }
    public function getCommentaireClient(){
        return $this->commentaireClient;
    }
    public function getImage(){
        return $this->image;
    }
    public function getDisponible(){
        return $this->disponible;
    }
    public function getExtraitChapitre(){
        return $this->extraitChapitre;
    }

    //setters

    public function setIdLivre($x){
        $this->idLivre = $x;
    }
    public function setTitre($x){
        $this->titre = $x;
    }
    public function setAuteur($x){
        $this->auteur = $x;
    }
    public function setPrix($x){
        $this->prix = floatval($x);
    }
    public function setTheme($x){
        $this->theme = $x;
    }
    public function setCommentaireClient($x){
        $this->commentaireClient = $x;
    }
    public function setImage($x){
        $this->image = $x;
    }
    public function setDisponible($x){
        $this->disponible = $x;
    }
    public function setExtraitChapitre($x){
        $this->extraitChapitre = $x;
    }


    public function __construct(array $donnees){

        $this->hydrate($donnees);
    
    } 

    public function hydrate(array $donnees){
    foreach ($donnees as $key => $value)
        {
        $method = 'set'.ucfirst($key);

        if (method_exists($this, $method)){

            $this->$method($value);
        }
        }
    }

}
