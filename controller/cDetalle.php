<?php
/**
 * @author Alvaro Cordero
 * @version 1.0
 * @since 15/01/2024
 * 
 * @Annotation Proyecto LoginLogoutMulticapaPOO - Parte de 'cDetalle'
 * 
 */

//Si el usuario pulsa el botón 'Volver', mando al usuario al inicioPrivado
if(isset($_REQUEST['volver'])){ 
    
    // Asigno a la página en curso la pagina de inicioPrivado
    $_SESSION['paginaEnCurso'] = 'inicioPrivado'; 
    
    // Redirecciono al index de la APP
    header('Location: index.php'); 
    
    //Finalizo la ejecucion del script
    exit;
}

// Cargo la vista de 'detalle' 
require_once $aVistas['layout'];  