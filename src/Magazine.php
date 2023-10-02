<?php

namespace App;

class Magazine extends Medias{
    private string $numero;
    private \DateTime $datePublication;
    public function __construct(string $titre, int $dureeEmprunt, string $numero, \DateTime $datePublication)
    {
        parent::__construct($titre, $dureeEmprunt);
        $this->numero = $numero;
        $this->datePublication = $datePublication;
    }
}