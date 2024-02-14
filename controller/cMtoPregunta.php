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
if (isset($_REQUEST['salirPreguntas'])) {

    // Almaceno la página anterior para poder volver
    $_SESSION['paginaAnterior'] = 'consultarPreguntas';

    // Asigno a la página en curso la página inicioPublico
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';

    // Redirecciono al index de la APP
    header('Location: index.php');

    //Finalizamos la ejecucion del script
    exit;
}

// Estructura del botón editarDepartamento, si el usuario pulsa el botón del icono de un 'lapiz'
if (isset($_REQUEST['cConsultarPreguntas'])) {

    // Almaceno en una variable de sesión el Codigo del Departamento Seleccionado
    $_SESSION['codDepartamentoActual'] = $_REQUEST['cConsultarPreguntas']; 

     // Almaceno la página anterior para poder volver
    $_SESSION['paginaAnterior'] = 'consultarPreguntas';

    //Asignamos la pagina en curso a editarDepartamento
    $_SESSION['paginaEnCurso'] = 'editarPreguntas'; 

    // Redirecciono al index de la APP
    header('Location: index.php');

    //Finalizamos la ejecucion del script
    exit;
}

//Declaración de variables de estructura para validar la ENTRADA de RESPUESTAS o ERRORES

//Indica si todas las respuestas son correctas
$entradaOK = true;

// Almacena los errores
$aErrores['DescPregunta'] = ''; 


//Comprobamos si se ha pulsado el boton de buscar
if (isset($_REQUEST['buscarPreguntaPorDesc'])) {

    //Validamos que la descripcion es correcta mediante la libreria de validacion
    $aErrores['DescPregunta'] = validacionFormularios::comprobarAlfabetico($_REQUEST['descPregunta'], 255, 1, 0);

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
    $_SESSION['criterioBusquedaPreguntas']['descripcionBuscada'] = $_REQUEST['descPregunta'];
}

//Array para guardar el contenido de una  pregunta
$aPreguntasVista = []; 

//Contador para los registros
$numeroDeRegistrosConsulta = 0;

/**
 * Inicializamos el arrayDepartamentos buscados llamando al metodo buscaDepartamtosPorDesc de la clase DepartamentoPDO
 * Este metodo Realiza una consulta filtrando por descripcion de deparamentos y devuleve su resultado
 */
$aPreguntasBuscadas = PreguntaPDO::buscarPreguntaPorDesc($_SESSION['criterioBusquedaPreguntas']['descripcionBuscada'] ?? '');

// Ejecutando la declaración SQL
if ($aPreguntasBuscadas) {

    //Recorro el objeto del resultado que contiene un array
    foreach ($aPreguntasBuscadas as $aPregunta) { 

        //Hago uso del metodo array push para meter los valores en el array $aDepartamentosVista
        array_push($aPreguntasVista, [ 

            //Guardo en el valor codDepartamento el codigo del departamento
            'codPregunta' => $aPregunta->getCodPregunta(), 

            //Guardo en el valor descDepartamento la descripcion del departamento
            'descPregunta' => $aPregunta->getDescPregunta(), 

            //Guardo en el valor fechaAlta la fecha de alta del departamento
            'fechaAltaPregunta' => $aPregunta->getFechaAlta(), 

            //Guardo en el valor volumenNegocio el volumen de negocio del departamento
            'respuestaPregunta' => $aPregunta->getRespuesta(), 

            //Guardo en el valor fechaBaja la fecha de baja del departamento
            'autorRespuesta' => $aPregunta->getAutorRespuesta() ,

            'valorRespuesta' => $aPregunta->getValor(),

            'fechaBajaRespuesta' => !is_null($aPregunta->getFechaBaja()) ? $aPregunta->getFechaBaja() : '' ,

        ]);

        //Incremento el contador
        $numeroDeRegistrosConsulta++;
    }
} else {

    //Mostramos los errores
    $aErrores['DescPregunta'] = "No existen preguntas con esa descripcion";
}

// Cargo la vista de 'Layout'
require_once $aVistas['layout'];
