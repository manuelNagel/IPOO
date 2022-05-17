<?php
include "Viaje.php";
include "ResponsableV.php";
include "Pasajero.php";
include "ViajeAereo.php";
include "ViajeTerrestre.php";

//funcion para precarga de una coleccion con objetos
/**
 * @return object
 */
function preCarga(){
    $coleccionPasajeros= array( 
                    new Pasajero("Manuel","Nagel",20280046,2995579157),
                    new Pasajero("Lucia","Castro",42735572,2995579164),
                    new Pasajero("Juani","Beilicke",13508059,11559487),
                    new Pasajero("Franciso","Impini",40020782,15732892),
                    new Pasajero("Luz","Almiron",35809143,42735973)
   
                        );
    $responsableV= new ResponsableV(1,13,"Gustavo","McNiles");
    $ViajeDefault = new Viaje(4290,"Chile",35,$coleccionPasajeros,$responsableV,7000,true);
    return $ViajeDefault;
}
function preCargaVTerrestre(){
    $coleccionPasajeros= array( 
        new Pasajero("Manuel","Nagel",20280046,2995579157),
        new Pasajero("Lucia","Castro",42735572,2995579164),
        new Pasajero("Juani","Beilicke",13508059,11559487),
        new Pasajero("Franciso","Impini",40020782,15732892),
        new Pasajero("Luz","Almiron",35809143,42735973)

            );
    $responsableV= new ResponsableV(1,13,"Gustavo","McNiles");
    $ViajeDefault = new ViajeTerrestre(4290,"Chile",35,$coleccionPasajeros,$responsableV,8000,false,"Cama");
    return $ViajeDefault;
}
function preCargaVAereo(){
    $coleccionPasajeros= array( 
        new Pasajero("Manuel","Nagel",20280046,2995579157),
        new Pasajero("Lucia","Castro",42735572,2995579164),
        new Pasajero("Juani","Beilicke",13508059,11559487),
        new Pasajero("Franciso","Impini",40020782,15732892),
        new Pasajero("Luz","Almiron",35809143,42735973)

            );
    $responsableV= new ResponsableV(1,13,"Gustavo","McNiles");
    $ViajeDefault = new ViajeAereo(4290,"Chile",35,$coleccionPasajeros,$responsableV,15370,true,46,"Primera Clase","FlyBondi",3);
    return $ViajeDefault;
}


function crearVuelo(){

    echo "Ingrese el codigo del vuelo: ";
    $codigo = trim(fgets(STDIN));
    echo "Luego, ingrese el destino del vuelo: ";
    $destino = trim(fgets(STDIN));
    echo "Ingrese la cantidad maxima de pasajeros del vuelo: ";
    $maximo = trim(fgets(STDIN));
    $responsable= crearResponsable();
    $arrPasajeros = crearArrPasajeros($maximo);
    echo"Ingrese el importe";
    $importe=trim(fgets(STDIN));
    echo "Es ida y vuelta? Si:True No:False";
    $idVu=trim(fgets(STDIN));
    $vuelo = new Viaje($codigo, $destino, $maximo, $arrPasajeros,$responsable,$importe,$idVu);
    return $vuelo;
}
/**
 * Modulo para crear un nuevo viaje aereo
 * @return ViajeAereo
 */
function crearViajeAereo()
{
    echo "\nIngrese el codigo del vuelo: ";
    $cod = trim(fgets(STDIN));
    echo "Luego, ingrese el destino del vuelo: ";
    $dest = trim(fgets(STDIN));
    echo "Ingrese la cantidad maxima de pasajeros del vuelo: ";
    $max = trim(fgets(STDIN));
    echo "Ingrese el importe del viaje: ";
    $importe = trim(fgets(STDIN));
    echo "Es ida y vuelta? Si:True No:False";
    $idVu = trim(fgets(STDIN));
    echo "Ingrese 'Primera Clase' o 'Clase Turista': ";
    $clase = trim(fgets(STDIN));
    echo "Ingrese el numero de vuelo: ";
    $nroVuelo = trim(fgets(STDIN));
    echo "Ingrese el nombre de la aerolinea: ";
    $nombre = trim(fgets(STDIN));
    echo "Ingrese la cantidad de escalas del vuelo: ";
    $escalas = trim(fgets(STDIN));

    $responsable= crearResponsable();
    $arrPasajeros = crearArrPasajeros($max);

    
    $vuelo = new ViajeAereo($cod, $dest, $max, $arrPasajeros, $responsable, $importe, $idVu, $nroVuelo, $clase, $nombre, $escalas);
   

    return $vuelo;
}

/**
 * Modulo para crear un nuevo viaje terrestre 
 * @return ViajeTerrestre
 */
function crearViajeTerrestre()
{
    echo "\nIngrese el codigo del viaje: ";
    $cod = trim(fgets(STDIN));
    echo "Luego, ingrese el destino del viaje: ";
    $dest = trim(fgets(STDIN));
    echo "Ingrese la cantidad maxima de pasajeros del viaje: ";
    $max = trim(fgets(STDIN));
    echo "Ingrese el importe del viaje: ";
    $importe = trim(fgets(STDIN));
    echo "Es ida y vuelta? Si:True No:False";
    $idVu = trim(fgets(STDIN));
    echo "Ingrese 'Coche Cama' o 'Semi Cama': ";
    $clase = trim(fgets(STDIN));

    $responsable= crearResponsable();
    $arrPasajeros = crearArrPasajeros($max);

    $terrestre = new ViajeTerrestre($cod, $dest, $max, $arrPasajeros, $responsable, $importe, $idVu, $clase);
    
    return $terrestre;
}
/**
 * Modulo que crea un vuelo manual
 * @return Object
 */
function crearViaje(){
    echo "Ingrese que tipo de viaje desea= Default(1) Aereo(2) Terrestre(3)";
    $tipo=trim(fgets(STDIN));
    switch($tipo){
        case 1:return crearVuelo();break;
        case 2:return crearViajeAereo();break;
        case 3:return crearViajeTerrestre();break;
        default:echo"Valor invalido";
                return ;break;
    }
}
/**
 * Modulo para crear al responsable del vuelo
 * @return object
 */
function crearResponsable(){
    echo "\nIngrese por favor el numero del responsable: ";
    $numR = trim(fgets(STDIN));
    echo "\nIngrese el numero de licencia del responsable: ";
    $numL = trim(fgets(STDIN));
    echo "\nIngrese el nombre del responsable";
    $nom = trim(fgets(STDIN));
    echo  "\nIngrese el apellido del responsable";
    $apel= trim(fgets(STDIN));
    return new ResponsableV($numR,$numL,$nom,$apel);
}
/**
 * Modulo para creacion arreglo pasajeros
 * @param int $maximo
 * @return array
 */

 function crearArrPasajeros($maximo){
     $cantidadPasajeros=validacionMaxPasajeros($maximo);
     $numPasajero=0;
     $arregloPasajeros = array() ;
     do{
        
        $documento = validacionRepetidos($arregloPasajeros,$numPasajero);
        echo "\nIngrese el nombre del pasajero número ". ($numPasajero+1) . " : ";
        $nombre = trim(fgets(STDIN));
        echo "\nIngrese el apellido del pasajero número " .($numPasajero+1) . " : ";
        $apellido = trim(fgets(STDIN));
        echo "\nIngrese el número de telefono del pasajero". ($numPasajero+1). " : ";
        $telefono = trim(fgets(STDIN));
        //Asignamos los datos al numero ingresado por parametro
        $arregloPasajeros[$numPasajero]= new Pasajero($nombre,$apellido,$documento,$telefono);
        $numPasajero++;
     }while($numPasajero<$cantidadPasajeros);
    
     return $arregloPasajeros;
 }
/**
 * Modulo que verifica que el pasajero no este repetido
 * @param array $aPas
 * @param int $iteracion
 * @return int
 */
function validacionRepetidos($aPas,$iteracion){
//$aPas[0]->getDocumento();
$cond=true;
if($iteracion==0){
    return $doc;
}
while($cond){
    echo "\nIngrese el documento del pasajero número " . ($iteracion+1) . " : ";
        $doc = trim(fgets(STDIN));
        $cond2=true;
        foreach ($aPas as $value) {
            $valores= $value->getDocumento();
            if($doc==$valores){
                echo "este pasajero ya existe.";
                $cond2=false;
                break;
            }
          }
          if($cond2==true){
            return $doc;
          }
          

}

    
}
 /**
  * Modulo que valida sque el valor sea correcto
  *@param int $max
  *@return int
  */
 function validacionMaxPasajeros($max){
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
        echo "Ingrese el telefono del pasajero";
        $telefono=trim(fgets(STDIN));

        //Asignamos los datos 
        $pasajero = new Pasajero($nombre,$apellido,$documento,$telefono);
        $pasajeros[count($pasajeros)] = $pasajero;

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
    echo "Ingrese el telefono del pasajero";
    $telefono=trim(fgets(STDIN));

    //Asignamos los datos del nro ingresado por parametro
   $pasNuevo[$num-1]= new Pasajero($nombre,$apellido,$documento,$telefono);

    //Devolvemos el arreglo a la clase para que lo modifique
    $vuelo->setPasajeros($pasNuevo);
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
 * Modulo que crea un nuevo responsable y modifica al del vuelo
 * @param Viaje $vuelo
 */
function editarResponsable ($vuelo){
    echo "\nPor favor ingrese el nombre del nuevo responsable del vuelo: ";
    $nombre = trim(fgets(STDIN));
    echo "Luego, ingrese su apellido: ";
    $apellido = trim(fgets(STDIN));
    echo "Ahora ingrese el numero de licencia: ";
    $nroLic = trim(fgets(STDIN));
    echo "Y por ultimo, ingrese el numero de empleado: ";
    $nroEmp = trim(fgets(STDIN));
    $responsable = new ResponsableV($nroEmp, $nroLic, $nombre, $apellido);

    $vuelo->setResponsable($responsable);
}
/**
 * Main
 */


$cond = true;
//menu
do {
    echo "\nBienvenido, por favor Elija una opción\n";
    echo "1. Crear Vuelo Nuevo\n";
    echo "2. Utilizar valores precargados\n";
    echo "3. Agregar un pasajero.\n";
    echo "4. Modificar un pasajero del vuelo.\n";
    echo "5. Mostrar datos del vuelo.\n";
    echo "6. Modificar el responsable del vuelo\n";
    echo "7. Modificar el destino.\n";
    echo "8. Modificar la cantidad maxima de pasajeros.\n";
    echo "9. Salir.\n Opciones: ";
     
    $opcion = trim(fgets(STDIN));
    echo "eligio opción ".$opcion;

    switch ($opcion) {
        case 1: {
            $vuelo = crearViaje();
            break;
        }
        case 2: {
            echo "Desea cargar el vuelo predeterminad: Comun(1) Aereo(2) Terrestre(3)";
            $opc=trim(fgets(STDIN));
                    switch($opc){
                        case 1:$vuelo=preCarga();break;
                        case 2:$vuelo=preCargaVAereo();break;
                        case 3:$vuelo=preCargaVTerrestre();break;
                        default:echo "valor incorrecto";break;
                    }
            break;
        }
        case 3: {
            agregarPasajero($vuelo);
            
            break;
        }
        case 4: {
            editarPasajero($vuelo);
            break;
        }
        case 5: {
            echo $vuelo;
            break;
        }
        case 6: {
            echo "\nGracias por usar la aplicación\n";
            $cond = false;
            break;
        }
        case 7: {
            echo "\nIngrese el nuevo destino del vuelo: ";
            $nuevoDest = trim(fgets(STDIN));
            $vuelo->setDestino($nuevoDest);break;
        }
        case 8: {
            $nuevoMax = valNuevoMax($vuelo);
            $vuelo->setMaxPasajeros($nuevoMax);break;
        }
        case 9:{
            echo "Hasta Luego!";
            $cond=false;
        }
        default: {
            echo "\nLa opcion ingresada no existe";
            break;
        }
    }
} while ($cond);

//desde ya muchas gracias por el tiempo qeu se tomaron en corregir. Saludos
?>