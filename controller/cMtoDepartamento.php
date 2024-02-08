<?php

/**
 * @author Carlos García Cachón
 * @version 1.0
 * @since 26/01/2024
 * 
 * @Annotation Proyecto LoginLogoutMulticapaPOO - Parte de 'MtoDepartamentos'
 * 
 */

// Si el usuario pulsa el botón 'Salir', mando al usuario a la página 'inicioPrivado'
if (isset($_REQUEST['salirDepartamentos'])) {

    // Almaceno la página anterior para poder volver
    $_SESSION['paginaAnterior'] = 'consultarDepartamento';

    // Asigno a la página en curso la página inicioPublico
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';

    // Redirecciono al index de la APP
    header('Location: index.php');

    //Finalizamos la ejecucion del script
    exit;
}

// Estructura del botón editarDepartamento, si el usuario pulsa el botón del icono de un 'lapiz'
if (isset($_REQUEST['cConsultarModificarDepartamento'])) {

    // Almaceno en una variable de sesión el Codigo del Departamento Seleccionado
    $_SESSION['codDepartamentoActual'] = $_REQUEST['cConsultarModificarDepartamento']; 

     // Almaceno la página anterior para poder volver
    $_SESSION['paginaAnterior'] = 'consultarDepartamento';

    //Asignamos la pagina en curso a editarDepartamento
    $_SESSION['paginaEnCurso'] = 'editarDepartamento'; 

    // Redirecciono al index de la APP
    header('Location: index.php');

    //Finalizamos la ejecucion del script
    exit;
}

//Declaración de variables de estructura para validar la ENTRADA de RESPUESTAS o ERRORES

//Indica si todas las respuestas son correctas
$entradaOK = true;

// Almacena los errores
$aErrores['DescDepartamento'] = ''; 


//Comprobamos si se ha pulsado el boton de buscar
if (isset($_REQUEST['buscarDepartamentoPorDesc'])) {

    //Validamos que la descripcion es correcta mediante la libreria de validacion
    $aErrores['DescDepartamento'] = validacionFormularios::comprobarAlfabetico($_REQUEST['DescDepartamento'], 255, 1, 0);

    //Recorremos el array de errores
    foreach ($aErrores as $sCampo => $sError) {

        // Si hay errores
        if ($sError != null) { 

            // Limpio el campo del formulario
            $_REQUEST[$sCampo] = ''; 

            // Y cambio el valor de entrada a False
            $entradaOK = false; 
        }
    }

   //Si no ha pulsado el botón de buscar
} else {

    //la validación es incorrecta.
    $entradaOK = false;   
}

//Si la entrada es Ok almacenamos el valor de la respuesta del usuario en el array $aRespuestas
if ($entradaOK) {

    //Almacenamos el valor en el array en la session
    $_SESSION['criterioBusquedaDepartamentos']['descripcionBuscada'] = $_REQUEST['DescDepartamento'];
}

//Array para guardar el contenido de un departamento
$aDepartamentosVista = []; 

//Contador para los registros
$numeroDeRegistrosConsulta = 0;

/**
 * Inicializamos el arrayDepartamentos buscados llamando al metodo buscaDepartamtosPorDesc de la clase DepartamentoPDO
 * Este metodo Realiza una consulta filtrando por descripcion de deparamentos y devuleve su resultado
 */
$aDepartamentosBuscados = DepartamentoPDO::buscaDepartamentosPorDesc($_SESSION['criterioBusquedaDepartamentos']['descripcionBuscada'] ?? '');

// Ejecutando la declaración SQL
if ($aDepartamentosBuscados) {

    //Recorro el objeto del resultado que contiene un array
    foreach ($aDepartamentosBuscados as $aDepartamento) { 

        //Hago uso del metodo array push para meter los valores en el array $aDepartamentosVista
        array_push($aDepartamentosVista, [ 

            //Guardo en el valor codDepartamento el codigo del departamento
            'codDepartamento' => $aDepartamento->getCodDepartamento(), 

            //Guardo en el valor descDepartamento la descripcion del departamento
            'descDepartamento' => $aDepartamento->getDescDepartamento(), 

            //Guardo en el valor fechaAlta la fecha de alta del departamento
            'fechaCreacionDep' => $aDepartamento->getFechaCreacionDepartamento(), 

            //Guardo en el valor volumenNegocio el volumen de negocio del departamento
            'volumenDeNegocio' => $aDepartamento->getVolumenDeNegocio(), 

            //Guardo en el valor fechaBaja la fecha de baja del departamento
            'fechaBajaDep' => !is_null($aDepartamento->getFechaBajaDepartamento()) ? $aDepartamento->getFechaBajaDepartamento() : '' 
        ]);

        //Incremento el contador
        $numeroDeRegistrosConsulta++;
    }
} else {

    //Mostramos los errores
    $aErrores['DescDepartamento'] = "No existen departamentos con esa descripcion";
}

// Cargo la vista de 'Layout'
require_once $aVistas['layout'];
