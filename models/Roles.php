<?php

namespace Model;

class Roles extends ActiveRecord{

    protected static $tabla = 'roles';
    protected static $atributoId = 'id';
    protected static $columnasDB = ['id', 'rol', 'numero_propiedades', 'limite_propiedades'];
    public $id;
    public $rol;
    public $numero_propiedades;
    public $limite_propiedades;

    public function __construct($args = []){
        $this->id = $args['id'] ?? '';
        $this->rol = $args['rol'] ?? '';
        $this->numero_propiedades = $args['numero_propiedades'] ?? '';
        $this->limite_propiedades = $args['limite_propiedades'] ?? '';
    }

    public function validarInformacion(){
        if (!$this->rol) {
            self::$errores[] = "Error el nombre del rol.";
        }
        if (!$this->numero_propiedades) {
            self::$errores[] = "Error el campo numero de propiedades.";
        }
        if (!$this->limite_propiedades) {
            self::$errores[] = "Error el campo limite de propiedades.";
        }
        return self::$errores;
    }
}