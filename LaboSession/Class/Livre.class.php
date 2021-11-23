<?php

declare(strict_types=1);


class Livre
{

    /** @var int */
    public int $idLivre;

    /** @var String */
    public String $Titre;

    /** @var String */
    public String $Auteur;

    /** @var Double */
    public Double $Prix;

    /** @var String */
    public String $Theme;

    /** @var String */
    public String $CommentaireClient;

    /** @var String */
    public String $Image;

    /** @var Int */
    public Int $Disponibilite;

    public  $ExtraitChapitre;



    /**
     * Default constructor
     */
    public function __construct()
    {
        // ...
    }

}
