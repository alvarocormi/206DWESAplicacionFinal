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
$textTranslator = null;


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

//Si no hay nada guardado en la variable de sesion de la fecha
if (!isset($_SESSION['fecha'])) {

    //Guardamos la fecha actual
    $_SESSION['fecha'] = date('Y-m-d');
}

//Si no hay nada guardado en la variable de sesion de texto
if (!isset($_SESSION['texto'])) {

    //Dejamos el texto vacio
    $_SESSION['texto'] = ' ';
}


//Si le da al botón de enviar
if (isset($_REQUEST['nasa'])) {

    //Guardamos la fecha en la sesión
    $_SESSION['fecha'] = $_REQUEST['fecha'];

    //Guardamos la información de la API en una variable
    $Nasa = REST::pedirFotoNasa($_REQUEST['fecha']);

    //Si la Nasa devuelve un string
    if (is_string($Nasa)) {

        // Si es un mensaje de error, haz algo para manejarlo, por ejemplo, mostrarlo en la vista
        $mensajeErrorNasa = $Nasa;
    }

    //Creamos un mensaje de error
    $mensajeErrorNasa = 'Error, no se ha encontrado informacion en esta fecha';

    // Verificamos si la clave 'hdurl' está definida antes de acceder
    $imagen = isset($Nasa['hdurl']) ? $Nasa['hdurl'] : $mensajeErrorNasa;

    // Verificamos si la clave 'title' está definida antes de acceder
    $title = isset($Nasa['title']) ? $Nasa['title'] : $mensajeErrorNasa;

    //Si todavia no le ha dado al boton de enviar
} else {
    //Si no pulsa el boton aceptar le pondrsmos la fecha de hoy
    $Nasa = REST::pedirFotoNasa(date('Y-m-d'));

    // Verificamos si la clave 'hdurl' está definida antes de acceder
    $imagen = isset($Nasa['hdurl']) ? $Nasa['hdurl'] : null;

    // Verificamos si la clave 'title' está definida antes de acceder
    $title = isset($Nasa['title']) ? $Nasa['title'] : null;
}


//Si ha pulsado el boton de enviar
if (isset($_REQUEST['traductor'])) {

    //Guardamos en la sesion el texto introducido por el usuario
    $_SESSION['texto'] = $_REQUEST['texto'];

    //Guardamos la informacion de la api en una variable
    $textTranslator = REST::textTranslator($_REQUEST['texto']);

    // Verifica si $traduccion es un mensaje de error
    if (strpos($textTranslator, 'Error') !== false) {

        // Si es un mensaje de error, haz algo para manejarlo, por ejemplo, mostrarlo en la vista
        $mensajeError = $textTranslator;
    }
}



// Guardo la informacion de la API en una variable
$github = REST::gitHub();

//Si devuelve texto
if (is_string($github)) {

    // Si es un mensaje de error, haz algo para manejarlo, por ejemplo, mostrarlo en la vista
    $mensajeErrorGithub = $github;
}

//Creamos un mensaje de error
$mensajeErrorGithub = 'Error, has enviado demasiadas solictudes al servidor';

// Y muestro los siguientes datos después de verificar su existencia
$name = isset($github['name']) ? $github['name'] : $mensajeErrorGithub;
$avatar_url = isset($github['avatar_url']) ? $github['avatar_url'] : null;
$company = isset($github['company']) ? $github['company'] : null;
$bio = isset($github['bio']) ? $github['bio'] : null;
$public_repos = isset($github['public_repos']) ? $github['public_repos'] : null;



// Cargo la vista de 'layout'
require_once $aVistas['layout'];
