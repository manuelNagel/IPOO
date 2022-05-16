<?php
include 'Viaje.php';
class ViajeTerrestre extends Viaje{
    //clase qeu representa a un viaje terrestre
    private $comodidad;
    public function __construct($cod,$dest,$pasM,$pas,$res,$com)
    {
        parent::__construct($cod,$dest,$pasM,$pas,$res);
        $this->comodidad = $com;
        
    }
    //metodos observadores
    public function getComodidad(){
        return $this->comodidad;
    }
    //metodos modificadores
    /**
     * @param string $com
     */
    public function setComodidad($com){
        $this->comodidad = $com;
    }
    //metodos propios
    
    //Metodo toString
    public function __toString(){
        $cadena = parent::__toString();

        return $cadena."\n El tipo de asiento es ".$this->getComodidad();
    }
    
}
?>