<?php

/**
 * @author  Alvaro Cordero
 * @version 1.0
 * @since 14/01/2024
 * 
 * @Annotation Proyecto LoginLogoutMulticapaPOO - Parte de 'crest'
 * 
 */

// Si el usuario no se ha logueado
if (!isset($_SESSION['usuario'])) {

    //Recargamos el index
    header('Location: index.php');

    //Finalizamos la ejecuion del script
    exit;
}

//Si el usuario pulsa el boton de volver
if (isset($_REQUEST['volver'])) {

    //Cargamos PaginaAnterior de inicio en PaginaenCurso
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];

    //Redirigimos al usuario al programa de nuevo
    header('Location: index.php');

    //Finalizamos la ejecuion del script
    exit;
}

//Guardamos la informacion de la api en una variable
$Nasa = REST::pedirFotoNasa();

//Guardamos el texto en una variable
$explicacion = $Nasa['explanation'];

//Guardamos la url de la imagen en una variable
$imagen = $Nasa['hdurl'];

//Gurdamos el titulo en una variable
$title  = $Nasa['title'];




// Asigno a la página en curso la pagina de inicioPrivado
$_SESSION['paginaEnCurso'] = 'rest';

// Cargo la vista de 'WIP'
require_once $aVistas['layout'];
