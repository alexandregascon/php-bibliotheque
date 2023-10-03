<?php

namespace App;

class Livre extends Medias{

    private string $isbn;
    private string $auteur;
    private int $nbPages;
    private int $dureeEmprunt;
    public function __construct(string $titre, string $isbn, string $auteur, int $nbPages)
    {
        parent::__construct($titre);
        $this->auteur = $auteur;
        $this->isbn = $isbn;
        $this->nbPages = $nbPages;
        $this->dureeEmprunt= 21;

    }

    public function informationsLivre(): array{
        $resultat = [
            $this->getTitre(),
            $this->getAuteur(),
            $this->getIsbn(),
            $this->getNbPages(),
            $this->getDureeEmprunt()
        ];

        return $resultat;
    }

    /**
     * @return string
     */
    public function getIsbn(): string
    {
        return $this->isbn;
    }

    /**
     * @return string
     */
    public function getAuteur(): string
    {
        return $this->auteur;
    }

    /**
     * @return int
     */
    public function getNbPages(): int
    {
        return $this->nbPages;
    }

    /**
     * @return int
     */
    public function getDureeEmprunt(): int
    {
        return $this->dureeEmprunt;
    }



}