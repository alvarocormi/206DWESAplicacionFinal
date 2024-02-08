<?php

/**
 * @author Carlos García Cachón
 * @version 1.0
 * @since 11/01/2024
 * @copyright Todos los derechos reservados a Carlos García
 * 
 * @Annotation Aplicación Final - Parte de 'editarDepartamento' 
 * 
 */
// Estructura del botón cancelar, si el usuario pulsa el botón 'cancelar'
if (isset($_REQUEST['cancelarEditar'])) {

    // Almaceno la página anterior para poder volver
    $_SESSION['paginaAnterior'] = 'editarDepartamento';

    // Asigno a la página en curso la pagina de consultarDepartamento
    $_SESSION['paginaEnCurso'] = 'consultarDepartamento';

    // Redirecciono al index de la APP
    header('Location: index.php');

    //Finaliza la ejecucion del script
    exit;
}

// Declaracion de la variable de confirmación de envio de formulario correcto
$entradaOK = true;

// Declaramos el array de errores y lo inicializamos vacío
$aErrores = [
    'T02_DescDepartamento' => '',
    'T02_VolumenDeNegocio' => ''
];

/*
 * Recuperamos el código del departamento seleccionado anteriormente por medio de una variable de sesión
 * Y usando el metodo 'buscaDepartamentoPorCod' de la clase 'DepartamentoPDO' recuperamos el objeto completo
 */
$oDepartamentoAEditar = DepartamentoPDO::buscaDepartamentoPorCod($_SESSION['codDepartamentoActual']);

// Almaceno la información del departamento actual en las siguiente variables, para mostrarlas en el formulario
if ($oDepartamentoAEditar) {
    $codDepartamentoAEditar = $oDepartamentoAEditar->getCodDepartamento();
    $descripcionDepartamentoAEditar = $oDepartamentoAEditar->getDescDepartamento();
    $fechaCreacionDepartamentoAEditar = $oDepartamentoAEditar->getFechaCreacionDepartamento();
    $volumenNegocioAEditar = $oDepartamentoAEditar->getVolumenDeNegocio();
}

if (isset($_REQUEST['confirmarCambiosEditar'])) { // Comprobamos que el usuario haya enviado el formulario para 'confirmar los cambios'
    $aErrores['T02_DescDepartamento'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['T02_DescDepartamento'], 255, 3, 1);
    $aErrores['T02_VolumenDeNegocio'] = validacionFormularios::comprobarFloat($_REQUEST['T02_VolumenDeNegocio'], PHP_FLOAT_MAX, -PHP_FLOAT_MAX, 0);

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

    // Y usando el metodo 'modificaDepartamento' de la clase 'DepartamentoPDO' recuperamos el objeto completo
    DepartamentoPDO::modificaDepartamento($_SESSION['codDepartamentoActual'], $_REQUEST['T02_DescDepartamento'], $_REQUEST['T02_VolumenDeNegocio']);

    // Almaceno la página anterior para poder volver
    $_SESSION['paginaAnterior'] = 'editarDepartamento';

    // Asigno a la página en curso la pagina de consultarDepartamento
    $_SESSION['paginaEnCurso'] = 'consultarDepartamento';

    // Redirecciono al index de la APP
    header('Location: index.php');

    //Finalizo la ejecucion del script
    exit;
}

// Cargo la vista de 'consultarModificarDepartamento'
require_once $aVistas['layout'];
