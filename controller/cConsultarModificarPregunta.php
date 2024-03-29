<?php

/**
 * @author Alvaro Cordero
 * @version 1.0
 * @since 14/02/2024
 * 
 * 
 * @Annotation Aplicación Final - Parte de 'editarPregunta' 
 * 
 */
// Estructura del botón cancelar, si el usuario pulsa el botón 'cancelar'
if (isset($_REQUEST['cancelarEditar'])) {

    // Almaceno la página anterior para poder volver
    $_SESSION['paginaAnterior'] = 'editarPregunta';

    // Asigno a la página en curso la pagina de consultarPregunta
    $_SESSION['paginaEnCurso'] = 'consultarPregunta';

    // Redirecciono al index de la APP
    header('Location: index.php');

    //Finaliza la ejecucion del script
    exit;
}

// Declaracion de la variable de confirmación de envio de formulario correcto
$entradaOK = true;

// Declaramos el array de errores y lo inicializamos vacío
$aErrores = [
    'T08_DescPregunta' => '',
    'T08_Valor' => '',
    'T08_AutorRespuesta' => ''
];

/*
 * Recuperamos el código del Pregunta seleccionado anteriormente por medio de una variable de sesión
 * Y usando el metodo 'buscaPreguntaPorCod' de la clase 'PreguntaPDO' recuperamos el objeto completo
 */

$oPreguntaAEditar = PreguntaPDO::buscarPreguntaPorCod($_SESSION['codPreguntaActual']);

// Almaceno la información del Pregunta actual en las siguiente variables, para mostrarlas en el formulario
if ($oPreguntaAEditar) {
    $codPreguntaAEditar = $oPreguntaAEditar->getCodPregunta();
    $descripcionPreguntaAEditar = $oPreguntaAEditar->getDescPregunta();
    $fechaAltaPreguntaAEditar = $oPreguntaAEditar->getFechaAlta();
    $respuestaAEditar = $oPreguntaAEditar->getRespuesta();
    $autorRespuestaAEditar = $oPreguntaAEditar->getAutorRespuesta();
    $valorAEditar = $oPreguntaAEditar->getValor();
    $fechaBajaPreguntaAEditar = $oPreguntaAEditar->getFechaBaja();
}

// Comprobamos que el usuario haya enviado el formulario para 'confirmar los cambios'
if (isset($_REQUEST['confirmarCambiosEditar'])) { 

    //Almacenamos los errores
    $aErrores['T08_DescPregunta'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['T08_DescPregunta'], 255, 3, 1);
    $aErrores['T08_Valor'] = validacionFormularios::comprobarFloat($_REQUEST['T08_Valor'], PHP_FLOAT_MAX, -PHP_FLOAT_MAX, 1);
    $aErrores['T08_AutorRespuesta'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['T08_AutorRespuesta'], 255, 3, 1);

    // Recorremos el array de errores
    foreach ($aErrores as $campo => $error) {

        // Comprobamos que el campo no esté vacio
        if ($error != null) {

            // En caso de que haya algún error le asignamos a entradaOK el valor false para que vuelva a rellenar el formulario
            $entradaOK = false;

            // Limpiamos los campos del formulario
            $_REQUEST[$campo] = "";
        }
    }
} else {

    // Si el usuario no ha enviado el formulario asignamos a entradaOK el valor false para que rellene el formulario
    $entradaOK = false;
}

// Si el usuario ha rellenado el formulario correctamente rellenamos el array aFormulario con las respuestas introducidas por el usuario
if ($entradaOK) {

    // Y usando el metodo 'modificaPregunta' de la clase 'PreguntaPDO' recuperamos el objeto completo
    PreguntaPDO::modificarPregunta($_SESSION['codPreguntaActual'], $_REQUEST['T08_DescPregunta'], $_REQUEST['T08_Valor'],$_REQUEST['T08_AutorRespuesta']);

    // Almaceno la página anterior para poder volver
    $_SESSION['paginaAnterior'] = 'editarPregunta';

    // Asigno a la página en curso la pagina de consultarPregunta
    $_SESSION['paginaEnCurso'] = 'consultarPregunta';

    // Redirecciono al index de la APP
    header('Location: index.php');

    //Finalizo la ejecucion del script
    exit;
}

// Cargo la vista de 'consultarModificarPregunta'
require_once $aVistas['layout'];
