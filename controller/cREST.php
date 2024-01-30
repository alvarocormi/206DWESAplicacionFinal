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



// Si el usuario pulsa el boton de volver
if (isset($_REQUEST['volver'])) {

    // Establece la variable de sesión 'paginaEnCurso' en 'inicioPrivado'
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';

    // Redirecciono al index de la APP
    header('Location: index.php');

    //Finalizo la ejecucion del script
    exit;
}


//Si no le da al boton de enviar
if (isset($_REQUEST['nasa'])) {

    //Guardamos la fecha en la sesion
    $_SESSION['fecha'] = $_REQUEST['fecha'];

    //Guardamos la informacion de la api en una variable
    $Nasa = REST::pedirFotoNasa($_REQUEST['fecha']);

    //Guardamos la url de la imagen en una variable
    $imagen = $Nasa['hdurl'];

    //Gurdamos el titulo en una variable
    $title  = $Nasa['title'];
} else {

    //Si no pulsa el boton aceptar le pondrsmos la fecha de hoy
    $Nasa = REST::pedirFotoNasa(date('Y-m-d'));

    //Guardamos la url de la imagen en una variable
    $imagen = $Nasa['hdurl'];

    //Gurdamos el titulo en una variable
    $title  = $Nasa['title'];
}


//Si ha pulsado el boton de enviar
if (isset($_REQUEST['traductor'])) {

    //Guardamos en la sesion el texto introducido por el usuario
    $_SESSION['texto'] = $_REQUEST['texto'];

    //Guardamos la informacion de la api en una variable
    $textTranslator = REST::textTranslator($_REQUEST['texto']);
}



//Guardo la informacion de la api en una variable
$github = REST::gitHub();

//Y muestro los siguientes datos
$name = $github['name'];
$avatar_url = $github['avatar_url'];
$company = $github['company'];
$bio = $github['bio'];
$public_repos = $github['public_repos'];


// Cargo la vista de 'layout'
require_once $aVistas['layout'];
