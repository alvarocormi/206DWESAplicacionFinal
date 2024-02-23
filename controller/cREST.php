<?php

/**
 * @author  CrsitinaSauces, mejorado Alvaro Cordero
 * @version 1.0
 * @since 14/01/2024
 * 
 * @Annotation Proyecto LoginLogoutMulticapaPOO - Parte de 'cRest'
 * 
 */

//Inicializamos la variable text a null
$text = null;

/**
 * Creamos un array para almacenar las respuestas de la api
 */
$aVistaRest = [
    'nasa' => [],
];


// Si el usuario no se ha logueado
if (!isset($_SESSION['usuario'])) {

     // Redirige a la página de inicio
     $_SESSION['paginaActiva'] = 'inicioPublico';

    //Recargamos el index
    header('Location: index.php');

    //Finalizamos la ejecuion del script
    exit;
}


// Si el usuario pulsa el boton de volver
if (isset($_REQUEST['volver'])) {

    // Establece la variable de sesión 'paginaEnCurso' en 'inicioPrivado'
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';

    // Redirecciono al index de la APP
    header('Location: index.php');

    //Finalizo la ejecucion del script
    exit;
}

//Si  hay algo en el campo fecha
if (isset($_REQUEST['fecha'])) {

    //Guardamos la fecha en la sesion
    $_SESSION['nasaFecha'] = $_REQUEST['fecha'];
}

//Si hay algo en el campo texto
if (isset($_REQUEST['texto'])) {

    //Guardamos la fecha en la sesion
    $_SESSION['textoTraducido'] = $_REQUEST['texto'];
}


/**
 * Llamamos a los metodos de la clase REST
 * textTrasnlator , pedirFotoNasa
 */
$text = REST::textTranslator(isset( $_SESSION['textoTraducido']) ?  $_SESSION['textoTraducido'] : null);
$aVistaRest['nasa'] = REST::pedirFotoNasa(isset( $_SESSION['nasaFecha']) ?  $_SESSION['nasaFecha'] : date('Y-m-d'));


// Cargo la vista de 'layout'
require_once $aVistas['layout'];
