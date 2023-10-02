<?php

namespace App;

class Livre extends Medias{

    private string $isbn;
    private string $auteur;
    private int $nbPages;
    public function __construct(string $titre, int $dureeEmprunt, string $isbn, string $auteur, int $nbPages)
    {
        parent::__construct($titre, $dureeEmprunt);
        $this->auteur = $auteur;
        $this->isbn = $isbn;
        $this->nbPages = $nbPages;
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



}