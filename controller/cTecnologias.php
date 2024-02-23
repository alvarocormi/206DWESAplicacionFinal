<?php
/*
 * @author Rebeca Sánchez Pérez
 * @version 1.0
 * @since 17/01/2023
 */

/**
 * Si le da al boton de volver 
 * */ 
if (isset($_REQUEST['volver'])) {

    $_SESSION['paginaEnCurso'] = 'inicioPublico';

    // Redirecciono al index de la APP
    header('Location: index.php');

    //Finalizo la ejecucion del scripr
    exit;
}

//Importamos la vista
require_once $aVistas['layout'];
