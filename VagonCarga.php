<?php
include_once "Vagon.php";

class VagonCarga extends Vagon {
    private $pesoMaximoCarga;
    private $pesoCargaActual;
    private $indiceCarga;

    public function __construct($anioInstalacion, $largoVagon, $anchoVagon, $pesoVacio, $pesoMaximoCarga) {
        parent::__construct($anioInstalacion, $largoVagon, $anchoVagon, $pesoVacio);
        $this->pesoMaximoCarga = $pesoMaximoCarga;
        $this->pesoCargaActual = 0;
        $this->indiceCarga = 0.2;
    }

    // GETTERS y SETTERS
    public function getPesoMaximoCarga() {
        return $this->pesoMaximoCarga;
    }
    public function setPesoMaximoCarga($pesoMaximoCarga) {
        $this->pesoMaximoCarga = $pesoMaximoCarga;
    }

    public function getPesoCargaActual() {
        return $this->pesoCargaActual;
    }
    public function setPesoCargaActual($pesoCargaActual) {
        $this->pesoCargaActual = $pesoCargaActual;
    }

    public function getIndiceCarga() {
        return $this->indiceCarga;
    }
    public function setIndiceCarga($indiceCarga) {
        $this->indiceCarga = $indiceCarga;
    }

    // MÉTODO PARA INCORPORAR CARGA
    public function incorporarCargaVagon($cantidad) {
        $exito = false;
        if ($this->pesoCargaActual + $cantidad <= $this->pesoMaximoCarga) {
            $this->pesoCargaActual += $cantidad;
            $exito = true;
        }
        return $exito;
    }

    // REDEFINIR CALCULO DE PESO
    public function calcularPesoVagon() {
        $pesoCarga = $this->pesoCargaActual;
        $pesoExtra = $pesoCarga * $this->indiceCarga;
        return $this->getPesoVacio() + $pesoCarga + $pesoExtra;
    }

    // TO STRING
    public function __toString() {
        return parent::__toString() . "\nPeso máximo de carga: " . $this->pesoMaximoCarga . 
        "\nCarga actual: " . $this->pesoCargaActual;
    }
}
?>
