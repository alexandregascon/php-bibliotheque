<?php

namespace App;

abstract class Medias{
    protected string $titre;
    protected int $dureeEmrpunt;

    /**
     * @param string $titre
     * @param int $dureeEmprunt
     */
    public function __construct(string $titre, int $dureeEmprunt){
        $this->titre = $titre;
        $this->dureeEmrpunt = $dureeEmprunt;
    }

    /**
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @return int
     */
    public function getDureeEmrpunt()
    {
        return $this->dureeEmrpunt;
    }

}