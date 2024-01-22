<?php

/**
 * @author  CrsitinaSauces, mejorado Alvaro Cordero
 * @version 1.0
 * @since 14/01/2024
 * 
 * @Annotation Proyecto LoginLogoutMulticapaPOO - Parte de 'cRest'
 * 
 */

 //Inicializamos las variables a null
$Nasa = null;
$explicacion = null;
$imagen = null;
$title = null;

// Si el usuario no se ha logueado
if (!isset($_SESSION['usuario'])) {

    //Recargamos el index
    header('Location: index.php');

    //Finalizamos la ejecuion del script
    exit;
}

//Si el usuario pulsa el boton de volver
if (isset($_REQUEST['volver'])) {

    //Cargamos PaginaAnterior de inicio a inicioPrivado
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';

    //Redirigimos al usuario al programa de nuevo
    header('Location: index.php');

    //Finalizamos la ejecuion del script
    exit;
}


if (isset($_REQUEST['nasa'])) {

    //Guardamos la informacion de la api en una variable
    $Nasa = REST::pedirFotoNasa($_REQUEST['fecha']);

    //Guardamos el texto en una variable
    $explicacion = $Nasa['explanation'];

    //Guardamos la url de la imagen en una variable
    $imagen = $Nasa['hdurl'];

    //Gurdamos el titulo en una variable
    $title  = $Nasa['title'];
}




// Cargo la vista de 'WIP'
require_once $aVistas['layout'];
