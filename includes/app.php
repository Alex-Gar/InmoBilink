<?php
require 'funciones.php';
require 'database.php';
require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
//Conexion a la base de datos
$db = conectarDB();

use Model\ActiveRecord;
// Conectarnos a la base de datos
ActiveRecord::setDB($db);
