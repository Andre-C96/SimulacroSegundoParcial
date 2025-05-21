<?php
include_once "Locomotora.php";
include_once "Vagon.php";
include_once "VagonPasajeros.php";
include_once "VagonCarga.php";

class Formacion {
    private $objLocomotora; 
    private $coleccionVagones; 
    private $maxVagones; 

    public function __construct($objLocomotora, $maxVagones) {
        $this->objLocomotora = $objLocomotora;
        $this->coleccionVagones = [];
        $this->maxVagones = $maxVagones;
    }

    // Getters y Setters
    public function getObjLocomotora() {
        return $this->objLocomotora;
    }

    public function setObjLocomotora($objLocomotora) {
        $this->objLocomotora = $objLocomotora;
    }

    public function getColeccionVagones() {
        return $this->coleccionVagones;
    }

    public function setColeccionVagones($coleccionVagones) {
        $this->coleccionVagones = $coleccionVagones;
    }

    public function getMaxVagones() {
        return $this->maxVagones;
    }

    public function setMaxVagones($maxVagones) {
        $this->maxVagones = $maxVagones;
    }

    public function incorporarVagonFormacion($vagon) {
        $exito = false;
        if (count($this->coleccionVagones) < $this->getMaxVagones()) {
            $this->coleccionVagones[] = $vagon;
            $exito = true;
        }
        return $exito;
    }

    public function incorporarPasajeroFormacion($cantPasaj) {
        $exito = false;
        $i = 0;
        $cantVagones = count($this->coleccionVagones);
        while ($i < $cantVagones && $cantPasaj > 0) {
            $vagon = $this->coleccionVagones[$i];
            if (is_a($vagon, 'VagonPasajeros')) {
                $espacioDisponible = $vagon->getMaxPasajeros() - $vagon->getPasajerosActuales();
                $cantidadAIngresar = ($cantPasaj <= $espacioDisponible) ? $cantPasaj : $espacioDisponible;
                if ($cantidadAIngresar > 0) {
                    $vagon->incorporarPasajeroVagon($cantidadAIngresar);
                    $cantPasaj -= $cantidadAIngresar;
                }
            }
            $i++;
        }
        if ($cantPasaj == 0) {
            $exito = true;
        }
        return $exito;
    }


    public function promedioPasajeroFormacion() {
        $suma = 0;
        $cantidad = 0;
        $i = 0;
        $cantVagones = count($this->coleccionVagones);

        while ($i < $cantVagones) {
            $vagon = $this->coleccionVagones[$i];
            if (is_a($vagon, 'VagonPasajeros')) {
                $suma += $vagon->getPasajerosActuales();
                $cantidad++;
            }
            $i++;
        }

        $promedio = 0;
        if ($cantidad > 0) {
            $promedio = $suma / $cantidad;
        }

        return $promedio;
    }


    public function pesoFormacion() {
        $vagones = $this->getColeccionVagones();
        $pesoTotal = $this->getObjLocomotora()->getPeso() * 1000;

        $i = 0;
        $cantVagones = count($vagones);

        while ($i < $cantVagones) {
            $vagon = $vagones[$i];
            $pesoTotal += $vagon->calcularPesoVagon();
            $i++;
        }

        return $pesoTotal;
    }

    public function retornarVagonSinCompletar() {
        $i = 0;
        $vagonEncontrado = null;
        $vagones = $this->getColeccionVagones();
        $cantVagones = count($vagones);

        while ($i < $cantVagones && $vagonEncontrado === null) {
            $vagon = $vagones[$i];
            if ($vagon->getMaxPasajeros() > 0 && $vagon->getPasajerosActuales() < $vagon->getMaxPasajeros()) {
                $vagonEncontrado = $vagon;
            }
            $i++;
        }

        return $vagonEncontrado;
    }

    public function __toString() {
        $info = "Formación:\n" . $this->getObjLocomotora()->__toString();
        $vagones = $this->getColeccionVagones();
        $cantVagones = count($vagones);
        $info .= "Cantidad de vagones: " . $cantVagones . "\n";

        $i = 0;
        while ($i < $cantVagones) {
            $vagon = $vagones[$i];
            if ($vagon->getMaxPasajeros() > 0) {
                $info .= "Vagón de Pasajeros:\n" . $vagon->__toString() . "\n";
            } else {
                $info .= "Vagón de Carga:\n" . $vagon->__toString() . "\n";
            }
            $i++;
        }

        return $info;
    }
}
?>