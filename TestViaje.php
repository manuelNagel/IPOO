<?php
include "Viaje.php";

function crearVuelo(){

    echo "Ingrese el codigo del vuelo: ";
    $codigo = trim(fgets(STDIN));
    echo "Luego, ingrese el destino del vuelo: ";
    $destino = trim(fgets(STDIN));
    echo "Ingrese la cantidad maxima de pasajeros del vuelo: ";
    $maximo = trim(fgets(STDIN));
    $arrPasajeros = crearArrPasajeros($maximo);
    $vuelo = new Viaje($codigo, $destino, $maximo, $arrPasajeros);
    return $vuelo;
}

/**
 * Modulo para creacion arreglo pasajeros
 * @param int $maximo
 * @return array
 */

 function crearArrPasajeros($maximo){
     $cantidadPasajeros=validacion($maximo);
     for ($numPasajero=1 ; $numPasajero <= $cantidadPasajeros ;$numPasajero++){
        echo "\nIngrese el nombre del pasajero número " . $numPasajero . " : ";
        $nombre = trim(fgets(STDIN));
        echo "\nIngrese el apellido del pasajero número " . $numPasajero . " : ";
        $apellido = trim(fgets(STDIN));
        echo "\nIngrese el documento del pasajero número " . $numPasajero . " : ";
        $documento = trim(fgets(STDIN));

        //Asignamos los datos al numero ingresado por parametro
        $arregloPasajeros[$numPasajero]["nombre"] = $nombre;
        $arregloPasajeros[$numPasajero]["apellido"] = $apellido;
        $arregloPasajeros[$numPasajero]["dni"] = $documento;
    }
    return $arregloPasajeros;
 }

 /**
  * Modulo que valida sque el valor sea correcto
  *@param int $max
  *@return int
  */
 function validacion($max){
     $cond=true;
     do{
        echo "\nIngrese la cantidad de pasajeros: ";
        $cantPas = trim(fgets(STDIN));
        if($cantPas<=$max && $cantPas>0){
            $cond = false;
        }else{
            echo "\n la cantidad de pasajeros es incorrecta.";
        }
     }while($cond==true);
     return $cantPas;

 }
/**
 * Modulo que agrega un nuevo pasajero al vuelo
 * @param VueloFeliz $vuelo
 */
function agregarPasajero($vuelo)
{
    if (validacionVueloCompleto($vuelo)) {
        $pasajeros = $vuelo->getPasajeros();
    //introduccion datos
        echo "\nIngrese el nombre del pasajero: ";
        $nombre = trim(fgets(STDIN));
        echo "ingrese el apellido del pasajero: " ;
        $apellido = trim(fgets(STDIN));
        echo "ingrese el documento del pasajero: ";
        $documento = trim(fgets(STDIN));

        //Asignamos los datos 
        $pasajeros[count($pasajeros)] = ["nombre" => $nombre, "apellido" => $apellido, "dni" => $documento];

        //seteamos pasajeros en el objeto
    $vuelo->setPasajeros($pasajeros);
    }
}

/**
 * Modulo que valida el ingreso de un nuevo pasajero
 * @param VueloFeliz $vuelo
 * @return boolean
 */
function validacionVueloCompleto($vuelo){
    if(count($vuelo->getPasajeros()) == $vuelo->getMaxPasajeros()){
        echo "\nEl vuelo esta lleno";
        $val = false;
    } else {
        $val = true;
    }
    return $val;
}

/**
 * Modulo para editar el arreglo de pasajeros
 * @param VueloFeliz $vuelo
 */
function editarPasajero($vuelo)
{
    $pasNuevo = $vuelo->getPasajeros();
    $num = valNumMod($vuelo);
    //Pedimos los datos del nuevo pasajero
    echo "\nIngrese el nombre del nuevo pasajero: ";
    $nombre = trim(fgets(STDIN));
    echo "ingrese el apellido del pasajero: ";
    $apellido = trim(fgets(STDIN));
    echo "ingrese el documento del pasajero: ";
    $documento = trim(fgets(STDIN));

    //Asignamos los datos del nro ingresado por parametro

    $pasajerosNuevo[$num-1]["nombre"] = $nombre;
    $pasajerosNuevo[$num-1]["apellido"] = $apellido;
    $pasajerosNuevo[$num-1]["dni"] = $documento;

    //Devolvemos el arreglo a la clase para que lo modifique
    $vuelo->setPasajeros($pasajerosNuevo);
}

/**
 * Modulo que valida que el numero ingresado se encuentre dentro del maximo de pasajeros y retorna el numero correcto
 * @param VueloFeliz $vuelo
 * @return int
 */
function valNumMod($vuelo)
{
    
    $cond = true;
    do{
        echo "\nPor favor ingrese el número: ";
        $num = trim(fgets(STDIN));
        if ($num <= count($vuelo->getPasajeros()) && $num > 0) {
            $cond = false;
        } else {
            echo "\nEl número ingresado no existe entre los pasajeros, intente de nuevo.";
        }
    }while($cond==true);
    return $num;
}

/**
 * Modulo que valida que la nueva cantidad maxima de pasajeros sea correcta
 * @param VueloFeliz $vuelo
 * @return int
 */
function valNuevoMax($vuelo){
    $cond = true;
    do {
        echo "\nIngrese la nueva cantidad maxima de pasajeros del vuelo: ";
            $nuevoMax = trim(fgets(STDIN));
        if ($nuevoMax >= count($vuelo->getPasajeros())) {
            $cond = false;
        } else {
            echo "\nEl numero ingresado no es correcto.";
             }
    }while($cond==true);

    return $nuevoMax;
}

/**
 * Main
 */

$vuelo = crearVuelo();
$cond = true;
//menu
do {
    echo "\nBienvenido, por favor Elija una opción\n";
    echo "1. Agregar un pasajero.\n";
    echo "2. Modificar un pasajero del vuelo.\n";
    echo "3. Mostrar datos del vuelo.\n";
    echo "4. Modificar el destino.\n";
    echo "5. Modificar la cantidad maxima de pasajeros.\n";
    echo "6. Salir.\n Opciones: ";
     
    $opcion = trim(fgets(STDIN));
    echo "eligio opción ".$opcion;

    switch ($opcion) {
        case 1: {
            agregarPasajero($vuelo);
            break;
        }
        case 2: {
            editarPasajero($vuelo);
            break;
        }
        case 3: {
            echo $vuelo;
            break;
        }
        case 4: {
            echo "\nIngrese el nuevo destino del vuelo: ";
            $nuevoDest = trim(fgets(STDIN));
            $vuelo->setDestino($nuevoDest);
            break;
        }
        case 5: {
            $nuevoMax = valNuevoMax($vuelo);
            $vuelo->setMaxPasajeros($nuevoMax);
            break;
        }
        case 6: {
            echo "\nGracias por usar la aplicación\n";
            $cond = false;
            break;
        }
        default: {
            echo "\nLa opcion ingresada no existe";
            break;
        }
    }
} while ($cond);

//desde ya muchas gracias por el tiempo qeu se tomaron en corregir. Saludos
?>