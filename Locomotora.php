<?php
class Locomotora {
    private $peso;
    private $velocidadMaxima;

    public function __construct($peso, $velocidadMaxima) {
        $this->peso = $peso;
        $this->velocidadMaxima = $velocidadMaxima;
    }

    // GETTERS y SETTERS
    public function getPeso() {
        return $this->peso;
    }
    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function getVelocidadMaxima() {
        return $this->velocidadMaxima;
    }
    public function setVelocidadMaxima($velocidadMaxima) {
        $this->velocidadMaxima = $velocidadMaxima;
    }

    // TO STRING
    public function __toString() {
        return "Locomotora:\nPeso: " . $this->getPeso() . " Toneladas.\nVelocidad máxima: " . $this->getVelocidadMaxima() . " km/h\n";
    }
}
?>