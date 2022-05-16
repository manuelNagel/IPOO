<?php
include 'Viaje.php';
class ViajeAereo extends Viaje{
    private $numVuelo;
    private $categoriaAsiento;
    private $nombreAerolinea;
    private $escalas;
    
    public function __construct($cod,$dest,$pasM,$pas,$res,$num,$cat,$nom,$esc){
        parent::construct($cod,$dest,$pasM,$pas,$res)
    }
}
?>