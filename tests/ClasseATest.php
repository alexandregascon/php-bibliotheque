<?php


use PHPUnit\Framework\TestCase;

class ClasseATest extends TestCase
{
    /**
     * @test
     */
    public function fonctionne() {
        $this->assertEquals(1,1);
    }

    /**
     * @test
     */
    public function fonctionne_2() {
        $this->assertEquals(1,1);
    }
}