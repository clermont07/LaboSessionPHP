<?php


class Commande 
{

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

    /** @var Int */
    public Int $IdCommande;

    /** @var [object Object] */
    public Client $idClient;

    /** @var Double */
    public Double $PrixTotal;



    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

    /**
     * 
     */
    public function CalculPrixTotal()
    {
        // TODO implement here
    }

}
