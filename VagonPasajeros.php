<?php
include_once "Vagon.php";

class VagonPasajeros extends Vagon {
    private $maxPasajeros;
    private $pasajerosActuales;
    private $pesoPromedioPasajero;

    public function __construct($anioInstalacion, $largo, $ancho, $pesoVagonVacio, $maxPasajeros, $pasajerosActuales) {
        parent::__construct($anioInstalacion, $largo, $ancho, $pesoVagonVacio);
        $this->maxPasajeros = $maxPasajeros;
        $this->pasajerosActuales = $pasajerosActuales;
        $this->pesoPromedioPasajero = 50; // valor fijo
    }

    // GETTERS y SETTERS
    public function getMaxPasajeros() {
        return $this->maxPasajeros;
    }
    public function setMaxPasajeros($maxPasajeros) {
        $this->maxPasajeros = $maxPasajeros;
    }

    public function getPasajerosActuales() {
        return $this->pasajerosActuales;
    }
    public function setPasajerosActuales($pasajerosActuales) {
        $this->pasajerosActuales = $pasajerosActuales;
    }

    public function getPesoPromedioPasajero() {
        return $this->pesoPromedioPasajero;
    }
    public function setPesoPromedioPasajero($pesoPromedio) {
        $this->pesoPromedioPasajero = $pesoPromedio;
    }

    // MÉTODO PARA INCORPORAR PASAJEROS
    public function incorporarPasajeroVagon($cantidad) {
        $exito = false;
        if ($this->pasajerosActuales + $cantidad <= $this->maxPasajeros) {
            $this->pasajerosActuales += $cantidad;
            $exito = true;
        }
        return $exito;
    }

    // CALCULA EL PESO TOTAL DEL VAGÓN
    public function calcularPesoVagon() {
        $pesoPasajeros = $this->pasajerosActuales * $this->pesoPromedioPasajero;
        return $this->getPesoVacio() + $pesoPasajeros;
    }

    // TO STRING
    public function __toString() {
        return parent::__toString() . "\nCapacidad máxima de pasajeros: " . $this->maxPasajeros . 
        "\nPasajeros actuales: " . $this->pasajerosActuales;
    }
}
?>
