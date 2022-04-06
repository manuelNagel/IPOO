<?php

 class Viaje {
    //propiedades/atributos
    private $codigo;
    private $destino;
    private $pasajerosMax;
    private $pasajeros;

    //Constructor
    public function __construct($cod,$dest,$pasM,$pas)
    {
        $this->codigo = $cod;
        $this->destino= $dest;
        $this->pasajerosMax = $pasM;
        $this->pasajeros = $pas;
        
    }
    //Observadores
    /**
     * Metodo que devuelve el codigo del vuelo
     * @return string
     */
    public function getCodigo(){
        return $this->codigo;
    }

    /**
     * Metodo que retorna el destino del vuelo
     * @return string
     */
    public function getDestino(){
        return $this->destino;
    }

    /**
     * Metodo retorna el maximo de pasajeros
     * @return string
     */
    public function getMaxPasajeros(){
        return $this->pasajerosMax;
    }

    /**
     * Metodo que retorna pasajeros
     * @return string
     */
    public function getPasajeros(){
        return $this->pasajeros;
    }

    //Modificadores

    /**
     * Metodo que modifica el destino del vuelo
     * @param string $dest
     */
    public function setDestino($dest){
        $this->destino= $dest;
    }

        /**
     * Metodo que modifica el maximo de pasajeros del avion
     * @param int $pasM
     */
    public function setMaxPasajeros ($pasM){
        $this->maxPasajeros = $pasM;
    }

    /**
     * Metodo que modifica un pasajero en un asiento del avion
     * @param int $pas
     */
    public function setPasajeros($pas){
        $this->pasajeros = $pas;
    }

    //Metodo toString

    public function __toString(){
        $cad = "";
        for($numPasajero = 0; $numPasajero < count($this -> pasajeros); $numPasajero++ ){
            $cad = $cad."Pasajero nro " . $numPasajero+1 . "\nNombre: " . $this->pasajeros[$numPasajero]["nombre"] . " " . $this->pasajeros[$numPasajero]["apellido"] . ".\nDNI: " . $this->pasajeros[$numPasajero]["dni"]."\n";
        }
        return "\nVuelo " . $this->getCodigo() . ".\nDestino: " . $this->getDestino() . "\nCantidad maxima de pasajeros: " . $this->getMaxPasajeros() . ".\nPasajeros:\n" . $cad;
    }

}

    
?>