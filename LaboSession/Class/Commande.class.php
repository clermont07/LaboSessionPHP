<?php

declare(strict_types=1);


class Commande extends Client
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

    public  $Attribute2;

    /** @var [object Object] */
    public Client $idClient;

    /** @var Double */
    public Double $PrixTotal;

    public  $Attribute1;



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
