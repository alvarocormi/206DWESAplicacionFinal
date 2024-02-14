<?php
/**
 * @author Carlos García Cachón, mejorado por Alvaro Cordero
 * @version 1.0
 * @since 14/01/2024
 * 
 * @Annotation Proyecto LoginLogoutMulticapaPOO - Parte de 'cInicioPublico'
 * 
 */

// Si el usuario pulsa el botón 'Salir', mando al usuario a la página 'inicioPublico'
if(isset($_REQUEST['salirDeWIP'])){
    
    // Asigno a la página en curso la página inicioPublico
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior']; 
    
    // Redirecciono al index de la APP
    header('Location: index.php');
    
    //Finalizamos la ejecucion del script
    exit;
}

// Cargo la vista de 'WIP'
require_once $aVistas['layout']; 