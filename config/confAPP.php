<?php
/**
 * @author Carlos García Cachón, mejorado por Álvaro Cordero
 * @version 1.0
 * @since 10/01/2024
 * 
 * @Annotation Proyecto LoginLogoutMulticapaPOO - Parte de configuración
 * 
 */

//Importamos la libreria de validacion de formularios
require_once 'core/231018libreriaValidacion.php';


require_once 'model/DB.php';
require_once 'model/DBPDO.php';
require_once 'model/ErrorApp.php';
require_once 'model/Usuario.php';
require_once 'model/UsuarioDB.php';
require_once 'model/UsuarioPDO.php';
require_once 'model/REST.php';

//Creamos un array asociativo para añadir los controladores
$aControladores = [
    'inicioPublico' => 'controller/cInicioPublico.php',
    'login' => 'controller/cLogin.php',
    'inicioPrivado' => 'controller/cInicioPrivado.php',
    'detalle' => 'controller/cDetalle.php',
    'wip' => 'controller/cWIP.php',
    'error' => 'controller/cError.php',
    'registro' => 'controller/cRegistro.php',
    'miCuenta' => 'controller/cMiCuenta.php',
    'rest' => 'controller/cREST.php'

];

//Creamos un array asociativo para añadir las vistas
$aVistas = [
    'layout' => 'view/Layout.php',
    'inicioPublico' => 'view/vInicioPublico.php',
    'login' => 'view/vLogin.php',
    'inicioPrivado' => 'view/vInicioPrivado.php',
    'detalle' => 'view/vDetalle.php',
    'wip' => 'view/vWIP.php',
    'error' => 'view/vError.php',
    'registro' => 'view/vRegistro.php',
    'miCuenta' => 'view/vMiCuenta.php',
    'rest' => 'view/vREST.php'
];