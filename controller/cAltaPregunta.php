<?php

/**
 * @author Alvaro Cordero
 * @version 1.0
 * @since 21/02/2024
 * 
 * 
 * @Annotation Aplicación Final - Parte de 'altaPregunta' 
 * 
 */

/**
 * Si le da al boton de cancelar
 */
if (isset($_REQUEST['cancelarAñadirPregunta'])) {

	// Almaceno la página anterior para poder volver
	$_SESSION['paginaAnterior'] = 'mostrarPregunta';

	// Asigno a la página en curso la pagina de consultarDepartamento
	$_SESSION['paginaEnCurso'] = 'consultarPregunta';

	// Redirecciono al index de la APP
	header('Location: index.php');

	//Finaliza la ejecucion del script
	exit;
}

//Variable booleana
$entradaOK = true;

//Variablle para guardar mensajes de confirmacion
$mensajeDeConfirmacion = '';

/**
 * Array para controlar los errores
 */
$aErrores = [
	'T08_CodPregunta' => '',
	'T08_DescPregunta' => '',
	'T08_FechaAlta' => '',
	'T08_Respuesta' => '',
	'T08_AutorRespuesta' => '',
	'T08_Valor' => '',
];

/**
 * Si el usuario le da al boton de añadir animal
 */
if (isset($_REQUEST['añadirPregunta'])) {

	/**
	 * Ahora inicializo cada 'key' del ARRAY utilizando las funciónes de la clase de 'validacionFormularios' , la cuál 
	 * comprueba el valor recibido (en este caso el que recibe la variable '$_REQUEST') y devuelve 'null' si el valor es correcto,
	 * o un mensaje de error personalizado por cada función dependiendo de lo que validemos.
	 */


	//Introducimos valores en el array $aErrores si ocurre un error
	$aErrores['T08_CodPregunta'] = validacionFormularios::comprobarAlfanumerico($_REQUEST['codPregunta'], 3, 3, 1);

	/**
	 * Validamos si el codigo ha tenido algun error
	 */
	if ($aErrores['T08_CodPregunta'] == null) {

		/*
         * Por medio del metodo 'buscarPreguntaPorCod' de la clase 'PreguntaPDO' comprobamos que el código no este en uso
         */
		if (PreguntaPDO::buscarPreguntaPorCod($_REQUEST['codPregunta'])) {

			//Almacenamos un mensaje de error
			$aErrores['T08_CodPregunta'] = "El código de Animal ya existe";
		}

		/**
		 * Comprobamos los errores mediante la libreria de validacion
		 * Almacenamos los mensajes de error en un array
		 */
		$aErrores['T08_DescPregunta'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descPregunta'], 255, 1, 1);
		$aErrores['T08_FechaAlta'] = validacionFormularios::validarFecha($_REQUEST['fechaAlta'],date('Y-m-d'),'01/01/1901', 1);
		$aErrores['T08_Respuesta'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['respuesta'], 255, 1, 1);
		$aErrores['T08_AutorRespuesta'] = validacionFormularios::comprobarAlfabetico($_REQUEST['autor'], 255, 3, 1);
		$aErrores['T08_Valor'] = validacionFormularios::comprobarFloat($_REQUEST['valor'], 9999999999, 0, 1);

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

		//Si el codigo ha tenido algun error	
	} else {

		//La variable entradOK la pondremos a false
		$entradaOK = false;
	}

	//En caso de que '$entradaOK' sea true
	if ($entradaOK) {

		// Usando el metodo 'altaPregunta' de la clase 'PreguntaPDO' añadimos el Animal
		$oPreguntaNueva = PreguntaPDO::altaPregunta($_REQUEST['codPregunta'], $_REQUEST['descPregunta'], $_REQUEST['fechaAlta'], $_REQUEST['respuesta'], $_REQUEST['autor'], $_REQUEST['valor']);

		/**
		 * Si la pregunta nueva se ha creado correctamente
		 */
		if ($oPreguntaNueva) {

			//Guardamos un mensaje de confirmacion
			$mensajeDeConfirmacion = "Se añadio la pregunta de manera correcta.";
		} else {

			//Guardamos un mensaje de error
			$mensajeDeConfirmacion = "Error al añadir la pregunta.";
		}

		// Almaceno la página anterior para poder volver
		$_SESSION['paginaAnterior'] = 'altaPregunta';

		// Asigno a la página en curso la pagina de consultarDepartamento
		$_SESSION['paginaEnCurso'] = 'consultarPregunta';
	
		// Redirecciono al index de la APP
		header('Location: index.php');
	
		//Finalizo la ejecucion del script
		exit;
	}
}

 //Importamos la vista
 require_once $aVistas['layout'];
