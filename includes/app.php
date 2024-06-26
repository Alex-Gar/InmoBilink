<?php
require 'funciones.php';
require 'database.php';
require __DIR__ . '/../vendor/autoload.php';

use Model\ActiveRecord;

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

//Conexion a la base de datos
$db = conectarDB();

// Conectarnos a la base de datos
ActiveRecord::setDB($db);
