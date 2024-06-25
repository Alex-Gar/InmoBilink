<?php

namespace Controllers;

use Model\Empresas;
use Model\Paquetes;
use Model\Propiedades;
use Model\Propietarios;
use Model\VPropiedad;

class ApiController
{
    public static function noPropiedades()
    {
        $datos = [];
        $idPropietario = $_SESSION['id'];
        $propiedades = Propietarios::find($idPropietario);
        $noPropiedades = $propiedades->no_propiedades;
        $datos[] = [
            'etiqueta' => 'Numero propiedades',
            'valor' => $propiedades->no_propiedades
        ];

        $noPaquetes = $propiedades->paquete;
        $noPaquete = Paquetes::find($noPaquetes);
        $limitePropiedades = $noPaquete->no_propiedades;

        $propiedadesRestantes =  $limitePropiedades - $noPropiedades;
        $datos[] = [
            'etiqueta' => 'Propiedades Disponibles',
            'valor' => $propiedadesRestantes
        ];

        echo json_encode($datos);
        return;
    }

    public static function infoPropiedades()
    {
        $infoPropiedades = VPropiedad::all();
        echo json_encode($infoPropiedades);
    }
}
