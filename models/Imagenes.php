<?php

namespace Model;

class Imagenes extends ActiveRecord
{

    protected static $tabla = 'imagenes';
    protected static $atributoId = 'id_propiedad';
    protected static $columnasDB = ['id', 'id_propiedad', 'img1', 'img2', 'img3', 'img4', 'img5'];
    public $id;
    public $id_propiedad;
    public $img1;
    public $img2;
    public $img3;
    public $img4;
    public $img5;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? '';
        $this->id_propiedad = $args['id_propiedad'] ?? '';
        $this->img1 = $args['img1'] ?? '';
        $this->img2 = $args['img2'] ?? '';
        $this->img3 = $args['img3'] ?? '';
        $this->img4 = $args['img4'] ?? '';
        $this->img5 = $args['img5'] ?? '';
    }

    public function validar()
    {
        if (!$this->img1 & !$this->img2 & !$this->img3 & !$this->img4 & !$this->img5) {
            self::$errores[] = "Error todas las imágenes son obligatorio.";
        }
        return self::$errores;
    }
}
