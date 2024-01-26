<?php
/**
 * @author Carlos García Cachón
 * @version 1.0
 * @since 26/01/2024
 * 
 * @Annotation Proyecto LoginLogoutMulticapaPOO - Parte de 'cBorrarCuenta'
 * 
 */

//Si el usuario pulsa el botón 'Cancelar', mando al usuario al index de DWES
if(isset($_REQUEST['salirBorrarCuenta'])){ 

    // Asigno a la página en curso la pagina de inicioPrivado
    $_SESSION['paginaEnCurso'] = 'miCuenta'; 

    // Redirecciono al index de la APP
    header('Location: index.php'); 

    //Finalizo la ejecucion del scripr
    exit;
}

// Comprobamos que el usuario a pulsado el boton 'Eliminar Usuario'
if (isset($_REQUEST['eliminarUsuario'])) { 

    // Recupero y almaceno el código del usuario actual
    $oUsuarioAEliminar = $_SESSION['usuario']->getCodUsuario(); 
    
    if (UsuarioPDO::borrarUsuario($oUsuarioAEliminar)) {

        // Elimino la sesión
        session_destroy(); 

        // Asigno a la pagina en curso la pagina de inicioPublico
        $_SESSION['paginaEnCurso'] = 'inicioPublico'; 

         // Redirecciono al index de la APP
        header('Location: index.php');

        //Finalizo la ejecucion del script
        exit;
    }
}

// Cargo la vista de 'WIP'
require_once $aVistas['layout']; 