<?php
/**
 * @author Carlos García Cachón, mejorado por Alvaro Cordero
 * @version 1.0
 * @since 04/01/2024
 * 
 * @Annotation Proyecto LoginLogoutMulticapaPOO - Parte de 'cMiCuenta'
 * 
 */

//Si el usuario pulsa el botón 'Cambiar Contraseña', mando al usuario al index de DWES
if(isset($_REQUEST['cambiarContraseña'])){ 

     // Asigno a la página en curso la pagina de cambiarContraseña
    $_SESSION['paginaEnCurso'] = 'cambiarContraseña';

    // Redirecciono al index de la APP
    header('Location: index.php'); 

    //Finalizo la ejecucion del script
    exit;
}

//Si el usuario pulsa el botón 'Cambiar Contraseña', mando al usuario al index de DWES
if(isset($_REQUEST['eliminarUsuario'])){ 

     // Asigno a la página en curso la pagina de borrarCuenta
    $_SESSION['paginaEnCurso'] = 'borrarCuenta';

    // Redirecciono al index de la APP
    header('Location: index.php'); 
    exit;
}


//Si el usuario pulsa el botón 'Cancelar', mando al usuario al index de DWES
if(isset($_REQUEST['cancelar'])){ 

    // Asigno a la página en curso la pagina de inicioPrivado
    $_SESSION['paginaEnCurso'] = 'inicioPrivado'; 

    // Redirecciono al index de la APP
    header('Location: index.php'); 

    //Finalizao la ejecucion del script
    exit;
}


// Declaracion de la variable de confirmación de envio de formulario correcto
$entradaOK = true;

// Declaramos el array de errores y lo inicializamos vacío
$aErrores['T01_DescUsuario'] = "";

//Si el usuario pulsa el botón 'Confirmar Cambios', mando al usuario al index de DWES
if(isset($_REQUEST['confirmarCambios'])){ 
    $aErrores['T01_DescUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['T01_DescUsuario'], 255, 3, 0);

    // Recorremos el array de errores
    foreach ($aErrores as $campo => $error) {
        if ($error != null) { // Comprobamos que el campo no esté vacio
            $entradaOK = false; // En caso de que haya algún error le asignamos a entradaOK el valor false para que vuelva a rellenar el formulario
            $_REQUEST[$campo] = ""; // Limpiamos los campos del formulario
        }
    }

} else {
    $entradaOK = false; // Si el usuario no ha enviado el formulario asignamos a entradaOK el valor false para que rellene el formulario
}
// Si la entrada esta correcta iniciamos la modificación del la descripción del usuario
if ($entradaOK) { 
    // Utilizamos el método 'modificarUsuario()' de la clase 'UsuarioPDO' para cambiar la descripción y almacenarla en la variable de sesión
    $_SESSION['usuario'] = UsuarioPDO::modificarUsuario($_SESSION['usuario'], $_REQUEST['T01_DescUsuario']);
    $_SESSION['paginaEnCurso'] = 'inicioPrivado'; // Asigno a la página en curso la pagina de inicioPrivado
    header('Location: index.php'); // Redirecciono al index de la APP
    exit; 
}

// Almaceno...
$aVMiCuenta = [
    'codigoUsuarioActual' => $_SESSION['usuario']->getCodUsuario(), // Código del usuario actual
    'contraseñaUsuarioActual' => $_SESSION['usuario']->getPassword(), // Contraseña del usuario actual
    'descripcionUsuarioActual' => $_SESSION['usuario']->getDescUsuario(), // Descripción del usuario actual
    'nConexionesUsuarioActual' => $_SESSION['usuario']->getNumAcceso(), // Numero de conexiones del usuario actual
    'fechaHoraUltimaConexionAnteriorUsuarioActual' => $_SESSION['usuario']->getFechaHoraUltimaConexionAnterior() // Fecha/Hora conexión anterior del usuario actual
];


require_once $aVistas['layout']; // Cargo la vista de 'miCuenta'