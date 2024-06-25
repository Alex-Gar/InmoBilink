<?php

namespace Model;

class Empresas extends ActiveRecord
{

    protected static $tabla = 'empresas';
    protected static $atributoId = 'id';
    protected static $columnasDB = ['id', 'id_propietario', 'nombre_empresa', 'descripcion', 'pais', 'estado', 'municipio', 'localidad', 'colonia', 'calle', 'no_exterior', 'no_interior', 'codigo_postal', 'slogan', 'img1', 'img2'];
    public $id;
    public $id_propietario;
    public $nombre_empresa;
    
    public $descripcion;
    public $pais;
    public $estado;
    public $municipio;
    public $localidad;
    public $colonia;
    public $calle;
    public $no_exterior;
    public $no_interior;
    public $codigo_postal;
    public $slogan;
    public $img1;
    public $img2;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->id_propietario = $args['id_propietario'] ?? '';
        $this->nombre_empresa = $args['nombre_empresa'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->pais = $args['pais'] ?? '';
        $this->estado =  $args['estado'] ?? '';
        $this->municipio = $args['municipio'] ?? '';
        $this->localidad = $args['localidad'] ?? '';
        $this->colonia = $args['colonia'] ?? '';
        $this->calle = $args['calle'] ?? '';
        $this->calle = $args['calle'] ?? '';
        $this->no_exterior = isset($args['no_exterior']) ? intval($args['no_exterior']) : 0;
        $this->no_interior = isset($args['no_interior']) ? intval($args['no_interior']) : 0;
        $this->codigo_postal = $args['codigo_postal'] ?? '';
        $this->slogan = $args['slogan'] ?? '';
        $this->img1 = $args['img1'] ?? '';
        $this->img2 = $args['img2'] ?? '';
    }

    public function validar()
    {
        if (!$this->nombre_empresa) {
            self::$errores[] = "Error el nombre de la empresa es obligatorio.";
        }
        if (!$this->descripcion) {
            self::$errores[] = "Error la descripcion de la empresa es obligatoria.";
        }
        if (!$this->pais) {
            self::$errores[] = "Error el pais es obligatorio.";
        }
        if (!$this->estado) {
            self::$errores[] = "Error el estado es obligatorio.";
        }
        if (!$this->municipio) {
            self::$errores[] = "Error el municipio es obligatorio.";
        }
        if (!$this->localidad) {
            self::$errores[] = "Error la localidad es obligatoria.";
        }
        if (!$this->colonia) {
            self::$errores[] = "Error la colonia es obligatoria.";
        }
        if (!$this->calle) {
            self::$errores[] = "Error la calle es obligatoria.";
        }
        if (!$this->no_exterior) {
            self::$errores[] = "Error el numero exterior es obligatoria.";
        }
        if (!$this->codigo_postal) {
            self::$errores[] = "Error el codigo postal es obligatorio.";
        }
      /*  if (!$this->img1) {
            self::$errores[] = "Error la imagen o logo de la empresa es obligatoria.";
        }
        if (!$this->img2) {
            self::$errores[] = "Error la imagen o logo de la empresa es obligatoria.";
        }*/
        return self::$errores;
    }
}
