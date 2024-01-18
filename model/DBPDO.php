<?php

/**
 * @author Alvaro Cordero
 * @version 1.0
 * @since 17/01/2024
 * 
 * @Annotation Proyecto LoginLogoutMulticapaPOO - Clase DBPDO
 * 
 */
class DBPDO implements DB {

    /**
     * Un metodo static es aquel elemento que pertenecen a la clase y no a una instancia de la misma
     * Este metodo realizara una conexion con la base de datos y ejecutara la consulta pasada como parametro
     */
    public static function ejecutaConsulta($sentenciaSQL) {

        try {
            // Instanciamos un objeto PDO y establecemos la conexión
            $miDB = new PDO(DSN, USERNAME, PASSWORD);

            // Prepara la consulta
            $oConsulta = $miDB->prepare($sentenciaSQL);

            // Ejecuta la consulta
            $oConsulta->execute();

            // Devuelvo el resultado de la consulta
            return $oConsulta;

            // Código que se ejecuta si hay algún error
        } catch (PDOException $excepcion) {

            // Asigno a la página en curso la página de error
            $_SESSION['paginaEnCurso'] = 'error';

            /**
             * Creo una variable de SESSION llamada 'error' y almaceno un objeto de la clase ErrorApp
             * 
             * En la variable '$_SESSION['paginaAnterior']' almacenamos la página anterior para poder volver una vez visualicemos el error en 'vError.php'
             */
            $_SESSION['error'] = new ErrorApp($excepcion->getCode(), $excepcion->getMessage(), $excepcion->getFile(), $excepcion->getLine());
            
            //Redirige al usuario al index
            header('Location: index.php');
            
            //Finaliza la ejecucion del script
            exit;
            
        } finally {

            // Cierra la conexión con la BD
            unset($miDB);
        }
    }
}
