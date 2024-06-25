<?php

namespace Model;

class Ubicaciones extends ActiveRecord
{

    protected static $tabla = 'ubicaciones';
    protected static $atributoId = 'id_propiedad';
    protected static $columnasDB = ['id', 'id_propiedad', 'estado', 'municipio', 'localidad', 'colonia', 'calle', 'no_exterior', 'no_interior' /*, 'latitud', 'longitud'*/];
    public $id;
    public $id_propiedad;
    public $estado;
    public $municipio;
    public $localidad;
    public $colonia;
    public $calle;
    public $no_exterior;
    public $no_interior;
    /*public $latitud;
    public $longitud;*/


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->id_propiedad = $args['id_propiedad'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->municipio = $args['municipio'] ?? '';
        $this->localidad = $args['localidad'] ?? '';
        $this->colonia = $args['colonia'] ?? '';
        $this->calle = $args['calle'] ?? '';
        $this->no_exterior = isset($args['no_exterior']) ? intval($args['no_exterior']) : 0;
        $this->no_interior = isset($args['no_interior']) ? intval($args['no_interior']) : 0;
        /*  $this->latitud = isset($args['latitud']) ? intval($args['latitud']) : 0;
        $this->longitud = isset($args['longitud']) ? intval($args['longitud']) : 0;*/
    }

    public function validar()
    {
        if (!$this->estado) {
            self::$alertas[] = "Error el estado es obligatorio.";
        }
        if (!$this->municipio) {
            self::$alertas[] = "Error el municipio es obligatoria.";
        }
        if (!$this->localidad) {
            self::$alertas[] = "Error la localidad es obligatoria.";
        }
        if (!$this->colonia) {
            self::$alertas[] = "Error la colonia es obligatoria.";
        }
        if (!$this->calle) {
            self::$alertas[] = "Error la calle es obligatoria.";
        }
        return self::$alertas;
    }
}
