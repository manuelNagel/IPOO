<?php
include "Pasajero.php";

$coleccionPasajeros= array( 
    new Pasajero("Manuel","Nagel",20280046,2995579157),
    new Pasajero("Lucia","Castro",42735572,2995579164),
    new Pasajero("Juani","Beilicke",13508059,11559487),
    new Pasajero("Franciso","Impini",40020782,15732892),
    new Pasajero("Luz","Almiron",35809143,42735973)

        );
        $cond = array_search(42735572,$coleccionPasajeros->getDocumento());
        echo $cond;

?>