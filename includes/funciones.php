<?php

define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/build/img/imgDb');

function debuguear($variable) : string {
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    exit;
}

// Escapa / Sanitizar el HTML
function s($html) : string {
    $s = htmlspecialchars($html);
    return $s;
}
function validarORedireccionar(string $url){
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    if(!$id){
        header("location: ${url}");
    }
    return $id;
}
function formatearMoneda($cantidad) {
    return '$' . number_format(intval($cantidad), 2, '.', ',');
}
