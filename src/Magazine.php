<?php

namespace App;

class Magazine extends Medias{
    private string $numero;
    private \DateTime $datePublication;
    private int $dureeEmprunt;
    public function __construct(string $titre, string $numero, string $datePublication)
    {
        parent::__construct($titre);
        $this->numero = $numero;
        $this->datePublication = \DateTime::createFromFormat('d/m/Y',$datePublication);
        $this->dureeEmprunt=10;
    }

    public function informationsMagazine(): array{
        $resultat = [
            $this->getTitre(),
            $this->getNumero(),
            $this->getDatePublication()->format("d/m/Y"),
            $this->getDureeEmprunt()
        ];
        return $resultat;
    }

    /**
     * @return string
     */
    public function getNumero(): string
    {
        return $this->numero;
    }

    /**
     * @return \DateTime
     */
    public function getDatePublication(): \DateTime
    {
        return $this->datePublication;
    }

    /**
     * @return int
     */
    public function getDureeEmprunt(): int
    {
        return $this->dureeEmprunt;
    }



}