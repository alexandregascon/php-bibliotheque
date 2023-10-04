<?php


use PHPUnit\Framework\TestCase;

class ClasseATest extends TestCase
{
    /**
     * @test
     */
    public function DateAdhesion_DateDuJourSiNonPrecise_DateDuJour() {
        $adherent = new \App\Adherents("Pierre","Gasly","");
        $date = new DateTime();
        $date = $date->format("d/m/Y");
        $this->assertEquals($date,$adherent->getDateAdhesion()->format("d/m/Y"));
    }

//    /**
//     * @test
//     */
//    public function fonctionne_2() {
//        $this->assertEquals(1,1);
//    }
}