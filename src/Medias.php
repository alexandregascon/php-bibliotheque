<?php

namespace App;

abstract class Medias{
    protected string $titre;

    /**
     * @param string $titre
     */
    public function __construct(string $titre){
        $this->titre = $titre;
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

}