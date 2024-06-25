<?php

namespace Model;

class Finalidades extends ActiveRecord{
    
        protected static $tabla = 'finalidades';
        protected static $atributoId = 'id';
        protected static $columnasDb = ['id', 'finalidad'];
        public $id;
        public $finalidad;
    
        public function __construct($args = []){
            $this->id = $args['id'] ?? '';
            $this->finalidad = $args['finalidad'] ?? '';
        }
    
        public function validarInformacion(){
            if(!$this->finalidad){
                self::$errores[] = "Error la finalidad de la propiedad es obligatoria.";
            }
    }
    
}