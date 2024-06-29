<?php
namespace Controllers;

use Model\Paquetes;
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

        $propiedadesRestantes = $limitePropiedades - $noPropiedades;

        $datos[] = [
            'etiqueta' => 'Propiedades Disponibles',
            'valor' => $propiedadesRestantes
        ];

        // Convertir todo el array en JSON y enviarlo como respuesta
        echo json_encode($datos);
        return;
    }

    public static function infoPropiedades()
    {
        $infoPropiedades = VPropiedad::all();
        echo json_encode($infoPropiedades);
    }
}
