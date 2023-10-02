<?php

namespace App;

use Cassandra\Date;

class Adherents{
    private string $numAdherent;
    private string $prenom;
    private string $nom;
    private ?string $dateAdhesion;

    public function __construct(string $prenom, string $nom, ?string $dateAdhesion){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->numAdherent = "pas fini";
        $this->dateAdhesion = $dateAdhesion;
    }

    /**
     * @return string
     */
    public function getNumAdherent(): string
    {
        return $this->numAdherent;
    }

    /**
     * @param string $numAdherent
     */
    public function setNumAdherent(string $numAdherent): void
    {
        $this->numAdherent = $numAdherent;
    }

    /**
     * @return string
     */
    public function getPrenom(): string
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom(string $prenom): void
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getNom(): string
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    /**
     * @return \DateTime
     */
    public function getDateAdhesion(): \DateTime
    {
        return $this->dateAdhesion;
    }

    /**
     * @param \DateTime $dateAdhesion
     */
    public function setDateAdhesion(\DateTime $dateAdhesion): void
    {
        $this->dateAdhesion = $dateAdhesion;
    }



}