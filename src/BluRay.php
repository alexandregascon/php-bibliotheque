<?php

namespace App;

class BluRay extends Medias{
    private string $realisateur;
    private string $duree;
    private \DateTime $anneeSortie;
    public function __construct(string $titre, int $dureeEmprunt, string $realisateur, string $duree, \DateTime $anneeSortie)
    {
        parent::__construct($titre, $dureeEmprunt);
        $this->realisateur = $realisateur;
        $this->duree = $duree;
        $this->anneeSortie = $anneeSortie;
    }
}