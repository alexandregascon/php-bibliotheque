<?php

namespace App;

class Emprunts{
    private \DateTime $dateEmprunt;
    private \DateTime $dateRetour;
    private Medias $medias;
    private Adherents $adherent;

    public function __construct(\DateTime $dateEmprunt, \DateTime $dateRetour, Adherents $adherent, Medias $medias){
        $this->adherent = $adherent;
        $this->dateEmprunt = $dateEmprunt;
        $this->dateRetour = $dateRetour;
        $this->medias = $medias;
    }
}