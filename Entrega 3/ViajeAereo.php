<?php
include 'Viaje.php';
class ViajeAereo extends Viaje{
    private $numVuelo;
    private $categoriaAsiento;
    private $nombreAerolinea;
    private $escalas;
    
    public function __construct($cod,$dest,$pasM,$pas,$res,$num,$cat,$nom,$esc){
        parent::construct($cod,$dest,$pasM,$pas,$res);
        $this->numVuelo=$num;
        $this->categoriaAsiento=$cat;
        $this->nombreAerolinea=$nom;
        $this->escalas=$esc;
    }
    //metodos observadores
    /**
     * @return int
     */
    public function getNumVuelo(){
        return $this->numVuelo;
    }
    /**
     * @return int
     */
    public function getCatAsiento(){
        return $this->categoriaAsiento;
    }
    /**
     * @return string
     */
    public function getNombreAerolinea(){
        return $this->nombreAerolinea;
    }
    /**
     * @return int
     */
    public function getEscalas(){
        return $this->escalas;
    }
    //metodos modificadores
    /**
     * @param int $num
     */
    public function setNumVuelo($num){
        $this->numVuelo=$num;
    }
    /**
     * @param int $catA
     */
    public function setCatAsiento($catA){
        $this->categoriaAsiento=$catA;
    }
    /**
     * @param string $nom
     */
    public function setNombreAerolinea($nom){
        $this->nombreAerolinea = $nom;
    }
    /**
     * @param int $esc
     */
    public function setEscalas($esc){
        $this->escalas = $esc;
    }
    //metodos 
   
    /**
     * Modulo que actualiza el importe del viaje
     */
    public function actualizarImporte()
    {
        $importe = $this->getImporte();
        if (($this->getCatAsiento() == "Primera Clase")&&($this->getEscalas()==0)) {
            if ($this->getIdaVuelta()) {
                $importe = ($importe * 1.90);
            } else {
                $importe = ($importe * 1.40);
            }
        } elseif (($this->getCatAsiento() == "Primera Clase")&&($this->getEscalas()>0)){
            if($this->getIdaVuelta()) {
                $importe = ($importe * 2.10);
            }else{
                $importe = ($importe * 1.60);
            }
        }

        echo "\nEl importe final del pasaje es " . $importe ;
        //modificamos el importa del viaje
        $this->setImporte($importe);
    }

    /**
    * Modulo que se encarga de actualizar los datos del vuelo
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
        echo "Ingrese 'Primera Clase' o 'Clase Turista': ";
        $tipo = trim(fgets(STDIN));
        echo "Ingrese el nombre de la aerolinea: ";
        $nombre = trim(fgets(STDIN));
        echo "Ingrese la cantidad de escalas del vuelo: ";
        $escalas = trim(fgets(STDIN));
        
        $this->setDestino($dest);
        $this->setMaxPasajeros($max);
        $this->setImporte($imp);
        $this->actualizarImporte();
        $this->setIdaVuelta($idVu);
        $this->setCatAsiento($tipo);
        $this->setNombreAerolinea($nombre);
        $this->setEscalas($escalas);
        
    }
    //Metodo to string
    public function __toString(){
        $cad = parent::__toString();
        return "El numero del vuelo: ".$this->getNumVuelo().".\nLa categoria del asiento: ".$this->getCatAsiento() . 
        ".\nAerolinea: ". $this->getNombreAerolinea().".\nEscalas: ".$this->getEscalas().".\n" . $cad;
    }

}
?>