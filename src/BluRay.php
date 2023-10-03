<?php

namespace App;

class BluRay extends Medias{
    private string $realisateur;
    private string $duree;
    private string $anneeSortie;
    private int $dureeEmprunt;
    public function __construct(string $titre, string $realisateur, string $duree, string $anneeSortie)
    {
        parent::__construct($titre);
        $this->realisateur = $realisateur;
        $this->duree = $duree;
        $this->anneeSortie = $anneeSortie;
        $this->dureeEmprunt= 15;
    }

    public function informationsBluRay(): array{
        $resultat = [
            $this->getTitre(),
            $this->getRealisateur(),
            $this->getDuree(),
            $this->getAnneeSortie(),
            $this->getDureeEmprunt()
        ];
        return $resultat;
    }

    /**
     * @return string
     */
    public function getRealisateur(): string
    {
        return $this->realisateur;
    }

    /**
     * @return string
     */
    public function getDuree(): string
    {
        return $this->duree;
    }

    /**
     * @return string
     */
    public function getAnneeSortie(): string{
        return $this->anneeSortie;
    }

    /**
     * @return int
     */
    public function getDureeEmprunt(): int
    {
        return $this->dureeEmprunt;
    }



}