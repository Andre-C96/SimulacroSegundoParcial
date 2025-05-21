<?php

class Vagon{
    private $anioInstalacion;
    private $largoVagon;
    private $anchoVagon;
    private $pesoVacio;

  public function __construct($anioInstalacion, $largoVagon, $anchoVagon, $pesoVacio) {
    $this->anioInstalacion = $anioInstalacion;
    $this->largoVagon = $largoVagon;
    $this->anchoVagon = $anchoVagon;
    $this->pesoVacio = $pesoVacio;
}

    //GETTERS y SETTERS
    public function getAnioInstalacion()
    {
        return $this->anioInstalacion;
    }
    public function setAnioInstalacion($anioInstalacion)
    {
        $this->anioInstalacion = $anioInstalacion;

    }

   
    public function getLargoVagon()
    {
        return $this->largoVagon;
    } 
    public function setLargoVagon($largoVagon)
    {
        $this->largoVagon = $largoVagon;

    }

    
    public function getAnchoVagon()
    {
        return $this->anchoVagon;
    }
    public function setAnchoVagon($anchoVagon)
    {
        $this->anchoVagon = $anchoVagon;

    }


    public function getPesoVacio()
    {
        return $this->pesoVacio;
    }
    public function setPesoVacio($pesoVacio)
    {
        $this->pesoVacio = $pesoVacio;

    }
  
 
    // MÉTODO PARA CALCULAR EL PESO TOTAL DEL VAGÓN
    public function calcularPesoVagon() {
        return $this->getPesoVacio();
    }


    //TOSTRING
    public function __toString(){
       return "Vagón:\nAño de Instalacion: ". $this->getAnioInstalacion()."\nLargo: ". $this->getLargoVagon() . 
       "\nAncho: ". $this->getAnchoVagon() . "\nPeso del vagón vacío: " . $this->getPesoVacio() ;
    }

  
}
?>