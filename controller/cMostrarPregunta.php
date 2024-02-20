<?php

/**
 * @author Alvaro Cordero
 * @version 1.0
 * @since 19/02/2024
 * 
 * 
 * @Annotation Aplicación Final - Parte de 'mostrarPregunta' 
 * 
 */
// Estructura del botón cancelar, si el usuario pulsa el botón 'cancelar'
if (isset($_REQUEST['cancelarMostrar'])) {

    // Almaceno la página anterior para poder volver
    $_SESSION['paginaAnterior'] = 'mostrarPregunta';

    // Asigno a la página en curso la pagina de consultarDepartamento
    $_SESSION['paginaEnCurso'] = 'consultarPregunta';

    // Redirecciono al index de la APP
    header('Location: index.php');

    //Finaliza la ejecucion del script
    exit;
}

/*
 * Recuperamos el código del departamento seleccionado anteriormente por medio de una variable de sesión
 * Y usando el metodo 'buscaDepartamentoPorCod' de la clase 'DepartamentoPDO' recuperamos el objeto completo
 */

$oPregunta = PreguntaPDO::buscarPreguntaPorCod($_SESSION['codPreguntaActual']);

// Almaceno la información del departamento actual en las siguiente variables, para mostrarlas en el formulario
if ($oPregunta) {
    $codPregunta = $oPregunta->getCodPregunta();
    $descripcionPregunta = $oPregunta->getDescPregunta();
    $fechaAltaPregunta = $oPregunta->getFechaAlta();
    $respuesta = $oPregunta->getRespuesta();
    $autorRespuesta = $oPregunta->getAutorRespuesta();
    $valor = $oPregunta->getValor();
    $fechaBajaPregunta = $oPregunta->getFechaBaja();
} 

// Cargo la vista de 'consultarModificarDepartamento'
require_once $aVistas['layout'];
