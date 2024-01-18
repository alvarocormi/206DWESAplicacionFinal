<?php

/**
 * @author Carlos Garcia, mejorado Alvaro Cordero
 * @version 1.0
 * @since 17/01/2024
 * 
 * @Annotation Proyecto LoginLogoutMulticapaPOO - Parte de 'cError'
 * 
 */
// Si el usuario pulsa el botón 'Salir', mando al usuario a la página "anterior"
if (isset($_REQUEST['salir'])) {
    
    // Asigno a la página en curso la página anterior
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior'];
    
    // Cierro la sesión de error
    unset($_SESSION['error']); 
    
    // Redirecciono al index de la APP
    header('Location: index.php'); 
    
    //Finalizamos la ejecucion del script
    exit;
}

// Asigno a cada variable los datos almacenamos la variable se sesión 'error' 
$codError = $_SESSION['error']->getCodError(); // Código del error
$descError = $_SESSION['error']->getDescError(); // Descripción del error
$archivoError = $_SESSION['error']->getArchivoError(); // Archivo donde ocurrio el error
$lineaError = $_SESSION['error']->getLineaError(); // Línea en la cual se produjo el error

require_once $aVistas['layout']; // Cargo la vista de 'error'