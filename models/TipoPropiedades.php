<?php

namespace Model;

class TipoPropiedades extends ActiveRecord
{

    protected static $tabla = 'tipo_propiedades';
    protected static $atributoId = 'id';
    protected static $columnasDb = ['id', 'tipo_propiedad'];
    public $id;
    public $tipo_propiedad;

    public function __construct($args = []){
        $this->id = $args['id'] ?? '';
        $this->tipo_propiedad = $args['tipo_propiedad'] ?? '';
    }

    public function validarInformacion(){
        if(!$this->tipo_propiedad){
            self::$errores[] = "Error el tipo de propiedad es obligatorio.";
        }
    }
}
