<?php

/**
 * @author Carlos García Cachón, mejorado por Alvaro Cordero
 * @version 1.0
 * @since 10/01/2024
 * 
 * @Annotation Proyecto LoginLogoutMulticapaPOO - Parte de 'cInicioPublico'
 * 
 */
// Comprobamos si la cookie esta declarada
if (!isset($_COOKIE['idioma'])) {

    // En caso negativo la creamos y ponemos el valor por defecto
    setcookie("idioma", "es", time() + (30 * 24 * 60 * 60), "/");

    header('Location: index.php'); // Redirecciono al index de la APP
    exit();
}


// Si el usuario pulsa el botón 'Login', mando al usuario a la página del login
if (isset($_REQUEST['login'])) {

    // Asigno a la pagina en curso la pagina de login
    $_SESSION['paginaEnCurso'] = 'login';

    // Redirecciono al index de la APP
    header('Location: index.php');

    //Finalizamos la ejecucion del script
    exit;
}


//Si se ha pulsado el boton del idioma español
if (isset($_REQUEST['spain'])) {
    /**
     * @link https://www.php.net/manual/function.setcookie.php
     * 
     * Creamos una cookie y le pasamos el idioma y el tiempo que queremos que dure la cookie
     * setcookie -> define una cookie para ser enviada junto con el resto de cabeceras HTTP
     */
    setcookie("idioma", "es", time() + 2592000);

    // Te redirige a la página en la que estás actualmente
    header('Location: index.php');

    // Finalizamos la ejecución del script
    exit();
}

//Si se ha pulsado el boton del idioma ingles
if (isset($_REQUEST['english'])) {
    /**
     * @link https://www.php.net/manual/function.setcookie.php
     * 
     * Creamos una cookie y le pasamos el idioma y el tiempo que queremos que dure la cookie
     * setcookie -> define una cookie para ser enviada junto con el resto de cabeceras HTTP
     */
    setcookie("idioma", "en", time() + 2592000);

    // Te redirige a la página en la que estás actualmente
    header('Location: index.php');

    // Finalizamos la ejecución del script
    exit();
}


// Cargo la vista de 'inicioPublico'
require_once $aVistas['layout'];
