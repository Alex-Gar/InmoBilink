<?php

namespace Model;


class Propiedades extends ActiveRecord
{

    protected static $tabla = 'propiedades';
    protected static $atributoId = 'id';
    protected static $columnasDB = ['id', 'id_propietario', 'tipo_propiedad', 'precio', 'oferta', 'precio_oferta', 'descripcion', 'disponible', 'metros_cuadrados', 'fecha_registro', 'finalidad', 'alberca', 'juegos_infantiles', 'areas_deportivas', 'seguridad', 'jardin', 'elevador', 'wc', 'estacionamientos', 'habitaciones', 'terraza', 'balcon', 'cuarto_servicio', 'agua', 'electricidad', 'internet', 'telefono', 'cable', 'amueblada'];
    public $id;
    public $id_propietario;
    public $tipo_propiedad;
    public $precio;
    public $oferta;
    public $precio_oferta;
    public $descripcion;
    public $disponible;
    public $metros_cuadrados;
    public $fecha_registro;
    public $finalidad;

    public $alberca;
    public $juegos_infantiles;
    public $areas_deportivas;
    public $seguridad;
    public $jardin;
    public $elevador;
    public $balcon;
    public $terraza;
    public $cuarto_servicio;

    public $wc;
    public $estacionamientos;
    public $habitaciones;

    public $agua;
    public $electricidad;
    public $internet;
    public $telefono;
    public $cable;
    public $amueblada;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->id_propietario = $args['id_propietario'] ?? '';
        $this->tipo_propiedad = $args['tipo_propiedad'] ?? '';
        $this->precio = $args['precio'] ?? 0;
        $this->oferta = $args['oferta'] ?? 0;
        $this->precio_oferta = isset($args['precio_oferta']) ? intval($args['precio_oferta']) : 0;
        $this->descripcion = $args['descripcion'] ?? '';
        $this->disponible =  $args['disponible'] ?? 0;
        $this->finalidad =  $args['finalidad'] ?? '';
        $this->fecha_registro = DATE('Y-m-d');

        $this->metros_cuadrados = $args['metros_cuadrados'] ?? null;
        $this->alberca = $args['alberca'] ?? 0;
        $this->juegos_infantiles = $args['juegos_infantiles'] ?? 0;
        $this->areas_deportivas = $args['areas_deportivas'] ?? 0;
        $this->seguridad = $args['seguridad'] ?? 0;
        $this->jardin = $args['jardin'] ?? 0;
        $this->elevador = $args['elevador'] ?? 0;
        $this->wc = isset($args['wc']) ? intval($args['wc']) : 0;
        $this->estacionamientos = isset($args['estacionamientos']) ? intval($args['estacionamientos']) : 0;
        $this->habitaciones = isset($args['habitaciones']) ? intval($args['habitaciones']) : 0;
        $this->terraza = $args['terraza'] ?? 0;
        $this->balcon = $args['balcon'] ?? 0;
        $this->cuarto_servicio = $args['terraza'] ?? 0;

        $this->agua = $args['agua'] ?? 0;
        $this->electricidad = $args['electricidad'] ?? 0;
        $this->internet = $args['internet'] ?? 0;
        $this->telefono = $args['telefono'] ?? 0;
        $this->cable = $args['cable'] ?? 0;
        $this->amueblada = $args['amueblada'] ?? 0;
    }

    public function validar()
    {
        if (!$this->tipo_propiedad) {
            self::$errores[] = "Debes seleccionar el tipo de propiedad.";
        }
        if (!$this->precio) {
            self::$errores[] = "Error es Obligatorio agregar el precio.";
        }
        if (!$this->finalidad) {
            self::$errores[] = "Error la finalidad de la propiedad es obligatoria.";
        }
        if (!$this->descripcion && strlen($this->descripcion) > 25) {
            self::$errores[] = "La descripcion de la propiedad es obligatoria y debe contar con mas de 25 caracteres";
        }
        if (!$this->disponible) {
            self::$errores[] = "Debe marcar la propiedad como disponible.";
        }
        if (!$this->metros_cuadrados) {
            self::$errores[] = "Debe agregar los M² de la Propiedad.";
        }
        return self::$errores;
    }
}