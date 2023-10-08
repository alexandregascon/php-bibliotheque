<?php

namespace App;

use Cassandra\Date;

class Adherents{
    private string $numAdherent;
    private string $prenom;
    private string $nom;
    private \DateTime $dateAdhesion;

    /**
     *  @param null|string $dateAdhesion
     */
    public function __construct(string $prenom, string $nom, ?string $dateAdhesion){
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->numAdherent = $this->genererNumero();
        if($dateAdhesion == null){
            $this->dateAdhesion = new \DateTime();
            $this->dateAdhesion->format("d/m/Y");
        }else{
            $this->dateAdhesion = \DateTime::createFromFormat('d/m/Y',$dateAdhesion);
        }
    }

    public function genererNumero(): string{
        return "AD-".rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
    }

    public function renouvelerAdhesion(): void{
        $this->dateAdhesion->modify("+1 years");
    }

    public function getInformationsAdherent(): array{
        $resultat = [
            $this->nom,
            $this->prenom,
            $this->numAdherent,
            $this->dateAdhesion->format("d/m/Y")
        ];
        return $resultat;
    }

    public function etatAdhesion(): bool{
        $date = new \DateTime();
        if($this->dateAdhesion < date_modify($date,"-1 years")){
            return false;
        }else{
            return true;
        }
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