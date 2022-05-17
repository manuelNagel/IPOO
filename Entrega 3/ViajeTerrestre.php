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
    
    /**
     * Modulo que actualiza el importe del viaje
     */
    public function actualizarImporte()
    {
        $importe = $this->getImporte();
        if (($this->getComodidad() == "Cama")) {
            if ($this->getIdaVuelta()) {
                $importe = $importe * 1.75;
            } else {
                $importe = $importe * 1.25;
            }
        } elseif ($this->getIdaVuelta()) {
            $importe = $importe * 1.50;
        }

        echo "\nEl importe final del pasaje es " . $importe ;
        //modificamos el importa del viaje
        $this->setImporte($importe);
    }

    /**
    * Modulo que se encarga de actualizar los datos del vuelo
    * 
    */
    public function actualizarDatos()
    {   
        echo "Ingrese el destino del vuelo: ";
        $dest = trim(fgets(STDIN));
        echo "Ingrese la cantidad maxima de pasajeros del vuelo: ";
        $max = trim(fgets(STDIN));
        echo "Ingrese el importe del viaje: ";
        $imp = trim(fgets(STDIN));
        echo "Si el viaje es Ida y vuelta ingrese 'true' sino 'false': ";
        $idVu = trim(fgets(STDIN));
        echo "Ingrese 'Cama' o 'Semi Cama': ";
        $com = trim(fgets(STDIN));
        
        $this->setDestino($dest);
        $this->setMaxPasajeros($max);
        $this->setImporte($imp);
        $this->actualizarImporte();
        $this->setIdaVuelta($idVu);
        $this->setComodidad($com);
        
    }
    //Metodo toString
    public function __toString(){
        $cadena = parent::__toString();

        return $cadena."\n El tipo de asiento es ".$this->getComodidad();
    }
    
}
?>