<?php

use PHPUnit\Framework\TestCase;
include './src/Enana.php';

class EnanaTest extends TestCase {
    
    public function testCreandoEnana() {
        #Se probará la creación de enanas vivas, muertas y en limbo y se comprobará tanto la vida como el estado
        $enana = new Enana("Alvaro",100);
        if ($enana->getPuntosVida() > 0){
            $enana->setSituacion("viva");
            $this->assertEquals("viva", $enana->getSituacion());
        } else if ($enana->getPuntosVida() == 0) {
            $enana->setSituacion("limbo");
            $this->assertEquals("limbo", $enana->getSituacion());
        } else {
            $enana->setSituacion("muerta");
            $this->assertEquals("muerta", $enana->getSituacion());
        }
    }
    public function testHeridaLeveVive() {
        #Se probará el efecto de una herida leve a una Enana con puntos de vida suficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es mayor que 0 y además que su situación es viva
        $enana = new Enana("Alvaro",100);
        if ($enana->getPuntosVida() > 10) {
            $enana->heridaLeve();
            $enana->setSituacion("viva");
            $this->assertEquals(90, $enana->getPuntosVida());
            $this->assertEquals("viva", $enana->getSituacion());
        }
    }

    public function testHeridaLeveMuere() {
        #Se probará el efecto de una herida leve a una Enana con puntos de vida insuficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es menor que 0 y además que su situación es muerta
        $enana = new Enana("Alvaro",5);
        if ($enana->getPuntosVida() < 10) {
            $enana->heridaLeve();
            $enana->setSituacion("muerta");
            $this->assertEquals(-5, $enana->getPuntosVida());
            $this->assertEquals("muerta", $enana->getSituacion());
        }
    }

    public function testHeridaGrave() {
        #Se probará el efecto de una herida grave a una Enana con una situación de viva.
        #Se tendrá que probar que la vida es 0 y además que su situación es limbo
        $enana = new Enana("Alvaro",100);
        $enana->heridaGrave();
        $enana->setPuntosVida(0);
        $this->assertEquals(0, $enana->getPuntosVida());
        $this->assertEquals("limbo", $enana->getSituacion());
    }
    
    public function testPocimaRevive() {
        #Se probará el efecto de administrar una pócima a una Enana muerta pero con una vida mayor que -10 y menor que 0
        #Se tendrá que probar que la vida es mayor que 0 y que su situación ha cambiado a viva
        $enana = new Enana("Alvaro",-5);
        if ($enana->getPuntosVida() > -10 && $enana->getPuntosVida() < 0){
            $enana->pocima();
            $enana->setSituacion("viva");
            $this->assertEquals(15, $enana->getPuntosVida());
            $this->assertEquals("limbo", $enana->getSituacion());
        }
    }

    public function testPocimaNoRevive() {
        #Se probará el efecto de administrar una pócima a una Enana en el libo
        #Se tendrá que probar que la vida y situación no ha cambiado

    }

    public function testPocimaExtraLimbo() {
        #Se probará el efecto de administrar una pócima Extra a una Enana en el limbo.
        #Se tendrá que probar que la vida es 50 y la situación ha cambiado a viva.

    }
}
?>