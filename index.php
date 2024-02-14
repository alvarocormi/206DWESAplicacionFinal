<?php

/**
 * @author Carlos Garcia Cachon, mejorado por Alvaro Cordero
 * @version 1.0
 * @since 10/01/2024
 */

// Incluyo la configuracion de la app
require_once 'config/confAPP.php';

//Incluyo la configuracion de la base de datos
require_once 'config/confDBPDO.php'; 

/*Creo o recupero la sesion mediante la funcion session_start()*/
session_start(); 

// Si no hay una pagina en curso dentro de la sesión
if(!isset($_SESSION['paginaEnCurso'])){ 
    
    // Asigno a la pagina en curso la pagina de 'inicioPublico'
    $_SESSION['paginaEnCurso'] = 'inicioPublico'; 
}

// Si desde el footer pulso el boton de tecnologias
if(isset($_REQUEST['tecnologias'])){ 
    $_SESSION['paginaAnterior'] = $_SESSION['paginaEnCurso'];
    $_SESSION['paginaEnCurso'] = 'tecnologias';
}

// Cargo la pagina en curso
require_once $aControladores[$_SESSION['paginaEnCurso']]; 
