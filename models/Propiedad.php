<?php

namespace Model;

class Propiedad extends ActiveRecord
{

    protected static $tabla = 'infoPropiedades';
    protected static $atributoId = 'id_propiedad';
    protected static $columnasDB = ['id_propiedad', 'id_propietario', 'precio', 'oferta', 'precio_oferta', 'descripcion', 'disponible', 'fecha_registro', 'metros_cuadrados', 'alberca', 'juegos_infantiles', 'areas_deportivas', 'seguridad', 'jardin', 'elevador', 'wc', 'estacionamientos', 'habitaciones', 'terraza', 'balcon', 'cuarto_servicio', 'agua', 'electricidad', 'internet', 'telefono', 'cable', 'amueblada', 'estado', 'municipio', 'localidad', 'colonia', 'calle', 'no_exterior', 'no_interior', 'img1', 'img2', 'img3', 'img4', 'img5', 'tipo_propiedad_nombre', 'finalidad_nombre'];

    public $id_propiedad;
    public $id_propietario;
    public $precio;
    public $oferta;
    public $precio_oferta;
    public $descripcion;
    public $disponible;
    public $fecha_registro;
    public $metros_cuadrados;
    public $alberca;
    public $juegos_infantiles;
    public $areas_deportivas;
    public $seguridad;
    public $jardin;
    public $elevador;
    public $wc;
    public $estacionamientos;
    public $habitaciones;
    public $terraza;
    public $balcon;
    public $cuarto_servicio;
    public $agua;
    public $electricidad;
    public $internet;
    public $telefono;
    public $cable;
    public $amueblada;
    public $estado;
    public $municipio;
    public $localidad;
    public $colonia;
    public $calle;
    public $no_exterior;
    public $no_interior;
    public $img1;
    public $img2;
    public $img3;
    public $img4;
    public $img5;
    public $tipo_propiedad;
    public $finalidad;
}