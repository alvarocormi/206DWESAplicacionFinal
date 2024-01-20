<?php
/**
 * @author Carlos García Cachón, mejorado por Alvaro Cordero
 * @version 1.0
 * @since 20/01/2024
 * 
 * @Annotation Proyecto LoginLogoutMulticapaPOO - Parte de 'cInicioPublico'
 * 
 */

//Si el usuario pulsa el botón 'Cancelar', mando al usuario al index de DWES
if (isset($_REQUEST['cancelar'])) {

    // Asigno a la pagina en curso la pagina de anterior que es la de login
    $_SESSION['paginaEnCurso'] = $_SESSION['paginaAnterior']; 

    // Redirecciono al index de la APP
    header('Location: index.php'); 

    //Finalizo la ejecucion del script
    exit;
}


// Declaración de variables de estructura para validar la ENTRADA de RESPUESTAS o ERRORES
// Valores por defecto
$entradaOK = true;

//En este array se almacenaran las respuestas
$aRespuestas = [
    'T01_CodUsuario' => "",
    'T01_DescUsuario' => "",
    'T01_Password' => "",
    'repetirPassword' => ""
];

//En este array se almacenaran los errores
$aErrores = [
    'T01_CodUsuario' => "",
    'T01_DescUsuario' => "",
    'T01_Password' => "",
    'repetirPassword' => ""
];

//Si el usuario pulsa el botón 'Registrarse', mando al usuario al index de DWES
if (isset($_REQUEST['registrarse'])) {

    /*
     * Ahora inicializo cada 'key' del ARRAY utilizando las funciónes de la clase de 'validacionFormularios' , la cuál 
     * comprueba el valor recibido (en este caso el que recibe la variable '$_REQUEST') y devuelve 'null' si el valor es correcto,
     * o un mensaje de error personalizado por cada función dependiendo de lo que validemos.
     */

    //Introducimos valores en el array $aErrores si ocurre un error
    $aErrores['T01_CodUsuario'] = validacionFormularios::comprobarAlfabetico($_REQUEST['T01_CodUsuario'], 8, 3, 1);
    $aErrores['T01_DescUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['T01_DescUsuario'], 255, 3, 1);
    $aErrores['T01_Password'] = validacionFormularios::validarPassword($_REQUEST['T01_Password'], 8, 3, 1, 1);
    $aErrores['repetirPassword'] = validacionFormularios::validarPassword($_REQUEST['repetirPassword'], 8, 3, 1, 1);

    // Comprobamos por medio del metodo 'validarCodNoExiste()' de la clase 'UsuarioPDO' si el código del usuario existe
    $oUsuarioExistente = UsuarioPDO::validarCodNoExiste($_REQUEST['T01_CodUsuario']);
                
    // En caso de existir cargamos un mensaje al array de errores
    if ($oUsuarioExistente) {

        //Mostramos un mensaje de error diciendo que el usuario ya existe
        $aErrores['T01_CodUsuario'] = "El usuario ya existe";
    }

    // Comprobamos si son distintas las contraseñas y cargamos un mensaje de error
    if ($_REQUEST['T01_Password'] != $_REQUEST['repetirPassword']) {

            //Mostramos un mensaje de error        
            $aErrores['T01_Password'] = "Las contraseñas no coinciden.";
            $aErrores['repetirPassword'] = "Las contraseñas no coinciden.";
    }
            
    /*
     * En este foreach recorremos el array buscando que exista NULL (Los metodos anteriores si son correctos devuelven NULL)
     * y en caso negativo cambiara el valor de '$entradaOK' a false y borrara el contenido del campo.
     */
    foreach ($aErrores as $campo => $error) {

        //Si hay errores
        if ($error != null) {

            //Ponemos el campo en blanco
            $_REQUEST[$campo] = "";

            //Y la entradaOK la ponemos a false
            $entradaOK = false;
        }
    }
} else {
    $entradaOK = false;
}


//En caso de que '$entradaOK' sea true, 
if ($entradaOK) {

    //Cargamos las respuestas en el array '$aRespuestas'
    $aRespuestas['T01_CodUsuario'] = $_REQUEST['T01_CodUsuario'];
    $aRespuestas['T01_DescUsuario'] = $_REQUEST['T01_DescUsuario'];
    $aRespuestas['T01_Password'] = $_REQUEST['T01_Password'];
    $aRespuestas['repetirPassword'] = $_REQUEST['repetirPassword'];

    //Damos de alta al usuario utilizando el metodo altaUsuario() de la clase PDO
    $oRegistroUsuario = UsuarioPDO::altaUsuario($_REQUEST['T01_CodUsuario'], $_REQUEST['T01_Password'], $_REQUEST['T01_DescUsuario']);

    // Almaceno el nuevo Usuario en una variable de sesión 
    $_SESSION['usuario'] = $oRegistroUsuario;
    
    // Asigno a la pagina en curso la pagina de inicioPrivado
    $_SESSION['paginaEnCurso'] = 'inicioPrivado';
    
    // Redirecciono al index de la APP mediante la etiqueta header
    header('Location: index.php'); 

    //Finalizo la ejecucion del script
    exit;
}

require_once $aVistas['layout']; // Cargo la vista de 'registro'