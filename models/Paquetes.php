<?php

namespace Model;

class Paquetes extends ActiveRecord{

    protected static $tabla = 'paquetes';
    protected static $atributoId = 'id';
    protected static $columnasDB = ['id', 'nombre', 'precio', 'meses', 'no_propiedades'];
    public $id;
    public $nombre;
    public $precio;
    public $meses;
    public $no_propiedades;

    public function __construct($args = []){
        $this->id = $args['id'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->meses = $args['meses'] ?? '';
        $this->meses = $args['no_propiedades'] ?? '';
    }

    public function validar(){
        if (!$this->nombre) {
            self::$errores[] = "Error el campo nombre del paquete es obligatorio.";
        }
        if (!$this->precio) {
            self::$errores[] = "Error el campo precio el obligatorio.";
        }
        if (!$this->meses) {
            self::$errores[] = "Error el numero de meses el obligatorio.";
        }
    }
}