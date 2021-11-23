<?php



class Client extends Utilisateur
{

    /** @var Int */
    public Int $idClient;

    /** @var String */
    public String $Nom;

    /** @var String */
    public String $Prenom;

    /** @var String */
    public String $Courriel;

    /** @var String */
    public String $Adresse;

    /** @var String */
    public String $CodePostal;

    /** @var Int */
    public Int $NumeroDeCarte;

    /** @var Date */
    public Date $DateExpiration;

    /** @var Int */
    public Int $NumCVC;



    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

}
