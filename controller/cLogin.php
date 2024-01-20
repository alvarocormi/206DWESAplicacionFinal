<?php

/**
 * @author Alvaro Cordero <https://github.com/alvarocormi>
 * @author Ismael Ferreras <https://github.com/IsmaelFG>
 * @author  Carlos Garcia 
 * @version 1.0
 * @since 16-01-2024
 * 
 * @Annotation Proyecto LoginLogOFF Alvaro Cordero - Parte Login
 */
// Verifica si la variable 'cancelar' está definida en la solicitud ($_REQUEST)
if (isset($_REQUEST['cancelar'])) {

    // Establece la variable de sesión 'paginaEnCurso' en 'inicioPublico'
    $_SESSION['paginaEnCurso'] = 'inicioPublico';

    // Requiere el archivo correspondiente al controlador asociado a 'inicioPublico'
    // a través del array $aControladores
    require_once $aControladores[$_SESSION['paginaEnCurso']];

    // Finaliza la ejecución del script
    exit();
}

//Si el usuario pulsa el botón 'Registrarse', mando al usuario al index de DWES
if(isset($_REQUEST['registrarse'])){
    
    // Asigno a la página anterior la página de login
    $_SESSION['paginaAnterior'] = 'login';
    
    // Asigno a la pagina en curso la pagina de registro
    $_SESSION['paginaEnCurso'] = 'registro'; 

    // Redirecciono al index de la APP
    header('Location: index.php'); 

    //Finalizado la ejecucion del script
    exit;
}

//Esta variable booleana la usaremos para indicar si las respuestas son correctas
$entradaOK = true;

/**
 * Almacenamos los errores del usuario en un array asociativo
 * Estos errores van a controlar la auteticacion del usuario
 * Guardaremos un mensaje en cada uno de ellos cuando ocurra un error en el mismo
 */
$aErrores = [
    'usuario' => '',
    'contrasena' => ''
];

/**
 * @link https://www.php.net/manual/function.isset.php
 * 
 * Comprobamos mediante la funcion isset si el usuario le ha dado a enviar 
 * La funcion isset() Determina si una variable está definida y no es null .
 */
if (isset($_REQUEST['enviar'])) {
    
    //Guardamos en la sesion la paginaAnterior y le cargamos el login
    $_SESSION['paginaAnterior']='login';

    // Validamos si el usuario existe y es oUsuarioActivo utilizando el metodo 'validarUsuario()' de la clase 'UsuarioPDO'
    $oUsuarioActivo = UsuarioPDO::validarUsuario($_REQUEST['usuario'], $_REQUEST['contrasena']);

    // Comprobamos si '$oUsuarioActivo' no esta declarado o es 'null'
    if (!isset($oUsuarioActivo)) {

        // En caso verdadero cambiamos el valor de '$entradaOK' a 'false'
        $entradaOK = false;
    }
    
    /**
     * Validamos el usuario 
     * Validamos la contrseña
     * 
     * Todas estas validaciones estan realizdas usando la libreria de validacion
     * comprobarAlfanumerico() -> Funcion que compueba si el parametro recibido esta compuesto por caracteres alfabeticos y numericos conjuntamente.
     * validarPassword() -> Funcion que compueba si el parametro recibido es una contraseña valida.
     */
    $aErrores = [
        'usuario' => (!$oUsuarioActivo) ? 'Error de autentificacion.' : validacionFormularios::comprobarAlfaNumerico($_REQUEST['usuario'], 32, 4, 1),
        'contrasena' => (!$oUsuarioActivo) ? 'Error de autentificacion.' : validacionFormularios::validarPassword($_REQUEST['contrasena'], 32, 4, 2, 1)
    ];

    // Recorre aErrores para ver si hay algun error
    foreach ($aErrores as $campo => $valor) {

        //Si el valor es distinto de null
        if ($valor != null) {

            //Ponemos la entradaOK a false
            $entradaOK = false;

            // Limpiamos el campo
            $_REQUEST[$campo] = '';
        }
    }
    //Si el usuario no ha pulsado el boton enviar 
} else {

    //Ponemos la entradaOK a false
    $entradaOK = false;
}

//En caso de que '$entradaOK' sea true, cargamos las respuestas en el array '$aRespuestas' 
if ($entradaOK) {

    //Abrimos un bloque try catch para tener un mejor control de los errores
    try {
        // Actualizamos la fecha y hora de la última conexión
        $oUsuarioActivo = UsuarioPDO::registrarUltimaConexion($oUsuarioActivo);

        /**
         * Configuramos las sesiones para almacenar los datos del usuario
         * Lo realizamos mediante la variable $_SESSION
         */
        $_SESSION['usuario'] = $oUsuarioActivo;
        $_SESSION['paginaEnCurso'] = 'inicioPrivado';

        //Importamos la sesion se la paginaActiva
        require_once $aControladores[$_SESSION['paginaEnCurso']];

        /**
         * @link https://www.php.net/manual/function.exit.php
         * 
         * Cerramos la ejecucion del progama
         * Mediante exit podremos cerrar la ejecucion del progama
         */
        exit();

        /**
         * @link https://www.php.net/manual/class.pdoexception.php
         * 
         * Controlamos los errores mediante la clase PDOException
         * PDOException() -> Representa un error generado por PDO.
         */
    } catch (PDOException $exception) {

        // Si aparecen errores, se muestra por pantalla el error
        echo ('<div><p>Ha fallado la conexion: ' . $exception->getMessage() . '</p></div>');

        //Pase lo que pase 
    } finally {

        // Se cierra la conexion con la base de datos
        unset($miDB);
    }

    //Si el fromulario a sido enviado pero el usuario o contraseña no ha sido valdiado 
} else {

    //Importamos la vista
    require_once $aVistas['layout'];
}
