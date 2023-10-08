<?php

namespace App;

class Emprunts
{
    private \DateTime $dateEmprunt;
    private \DateTime $dateRetourEstimee;
    private ?\DateTime $dateRetour;
    private Medias $medias;
    private Adherents $adherent;

    public function __construct(Adherents $adherent, Medias $medias)
    {
        $this->adherent = $adherent;
        $this->dateEmprunt = new \DateTime();
        $this->dateEmprunt->format("d/m/Y");
        $this->medias = $medias;
        if ($this->medias instanceof Livre) {
            $this->dateEmprunt->modify("+21 days");
            $this->dateRetourEstimee = $this->dateEmprunt;
        }
        if ($this->medias instanceof BluRay) {
            $this->dateEmprunt->modify("+15 days");
            $this->dateRetourEstimee = $this->dateEmprunt;
        }
        if ($this->medias instanceof Magazine) {
            $this->dateEmprunt->modify("+10 days");
            $this->dateRetourEstimee = $this->dateEmprunt;
        }
        $this->dateRetour = null;
        $this->dateEmprunt = new \DateTime();
    }

    public function informationsEmprunt(): array
    {
        $resultat = [
            $this->dateEmprunt->format("d/m/Y"),
            $this->dateRetourEstimee->format("d/m/Y"),
            $this->adherent->getNumAdherent(),
            $this->adherent->getPrenom(),
            $this->adherent->getNom(),
            $this->adherent->getDateAdhesion()->format("d/m/Y")
        ];
        if ($this->medias instanceof Livre) {
            $resultat[] = $this->medias->getTitre();
            $resultat[] = $this->medias->getNbPages();
            $resultat[] = $this->medias->getDureeEmprunt();
            $resultat[] = $this->medias->getIsbn();
            $resultat[] = $this->medias->getAuteur();
        }

        if ($this->medias instanceof Magazine) {
            $resultat[] = $this->medias->getTitre();
            $resultat[] = $this->medias->getNumero();
            $resultat[] = $this->medias->getDatePublication()->format("d/m/Y");
            $resultat[] = $this->medias->getDureeEmprunt();
        }

        if ($this->medias instanceof BluRay) {
            $resultat[] = $this->medias->getDuree();
            $resultat[] = $this->medias->getRealisateur();
            $resultat[] = $this->medias->getAnneeSortie();
            $resultat[] = $this->medias->getDureeEmprunt();
            $resultat[] = $this->medias->getTitre();
        }
        return $resultat;
    }

    public function retourEmprunt(): bool
    {
        if ($this->dateRetour == null) {
            return false;
        }
        return true;
    }

    public function alerteEmprunt(): bool
    {
        if ($this->retourEmprunt() == false and $this->dateRetourEstimee < new \DateTime()) {
            return true;
        } else {
            return false;
        }
    }

    public function respectDureeEmprunt(): int
    {
        if ($this->retourEmprunt() == true and $this->dateRetour > $this->dateRetourEstimee) {
            return 1;
        } elseif ($this->retourEmprunt() == true and $this->dateRetour <= $this->dateRetourEstimee) {
            return 2;
        } elseif ($this->retourEmprunt() == false) {
            return 3;
        }else{
            return 0;
        }


    }

    /**
     * @return \DateTime
     */
    public function getDateEmprunt(): \DateTime
    {
        return $this->dateEmprunt;
    }

    /**
     * @param string $dateEmprunt
     */
    public function setDateEmprunt(string $dateEmprunt): void
    {
        $this->dateEmprunt = \DateTime::createFromFormat("d/m/Y",$dateEmprunt);
    }

    /**
     * @return \DateTime
     */
    public function getDateRetourEstimee(): \DateTime
    {
        return $this->dateRetourEstimee;
    }

    /**
     * @param string $dateRetourEstimee
     */
    public function setDateRetourEstimee(string $dateRetourEstimee): void
    {
        $this->dateRetourEstimee = \DateTime::createFromFormat("d/m/Y",$dateRetourEstimee);
    }

    /**
     * @return Medias
     */
    public function getMedias(): Medias
    {
        return $this->medias;
    }

    /**
     * @param Medias $medias
     */
    public function setMedias(Medias $medias): void
    {
        $this->medias = $medias;
    }

    /**
     * @return Adherents
     */
    public function getAdherent(): Adherents
    {
        return $this->adherent;
    }

    /**
     * @param Adherents $adherent
     */
    public function setAdherent(Adherents $adherent): void
    {
        $this->adherent = $adherent;
    }

    /**
     * @return \DateTime|null
     */
    public function getDateRetour(): ?\DateTime
    {
        return $this->dateRetour;
    }

    /**
     * @param string $dateRetour
     */
    public function setDateRetour(string $dateRetour): void
    {
        $this->dateRetour = \DateTime::createFromFormat("d/m/Y",$dateRetour);
    }



}