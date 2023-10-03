<?php

namespace App;

class Emprunts{
    private \DateTime $dateEmprunt;
    private \DateTime $dateRetourEstimee;
    private Medias $medias;
    private Adherents $adherent;

    public function __construct(string $dateEmprunt, Adherents $adherent, Medias $medias){
        $this->adherent = $adherent;
        $this->dateEmprunt = \DateTime::createFromFormat('d/m/Y',$dateEmprunt);
        $this->dateRetourEstimee = $this->dateEmprunt->modify("+21 days");
        $this->medias = $medias;
    }

    public function informationsEmprunt(): array
    {
            $resultat = [
                $this->dateEmprunt->format("d/m/Y"),
                $this->dateRetourEstimee->format("d/m/Y"),
                $this->adherent->getNumAdherent()
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

    /**
     * @return \DateTime
     */
    public function getDateEmprunt(): \DateTime
    {
        return $this->dateEmprunt;
    }

    /**
     * @param \DateTime $dateEmprunt
     */
    public function setDateEmprunt(\DateTime $dateEmprunt): void
    {
        $this->dateEmprunt = $dateEmprunt;
    }

    /**
     * @return \DateTime
     */
    public function getDateRetourEstimee(): \DateTime
    {
        return $this->dateRetourEstimee;
    }

    /**
     * @param \DateTime $dateRetour
     */
    public function setDateRetourEstimee(\DateTime $dateRetourEstimee): void
    {
        $this->dateRetour = $dateRetourEstimee;
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



}