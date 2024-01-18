<?php

/**
 * @author Alvaro Cordero
 * @version 1.0
 * @since 16/01/2024
 * 
 * @Annotation Proyecto LoginLogoutMulticapaPOO - Clase Usuario
 * 
 */
// Definición de la clase UsuarioPDO que implementa la interfaz UsuarioDB
class UsuarioPDO implements UsuarioDB {

    // Método estático para validar un usuario en la base de datos
    public static function validarUsuario($codUsuario, $password) {
        
        // Inicializa la variable para almacenar el objeto Usuario
        $oUsuario = null; 
        
        // Construye la consulta SQL con los parámetros proporcionados
        $consulta = <<<CONSULTA
            SELECT * FROM T01_Usuario 
            WHERE T01_CodUsuario = '{$codUsuario}' 
            AND T01_Password = SHA2('{$codUsuario}{$password}', 256);
        CONSULTA;

        // Ejecuta la consulta utilizando la clase DBPDO
        $resultado = DBPDO::ejecutaConsulta($consulta);

        // Si la consulta devuelve al menos una fila, crea un objeto Usuario
        if ($resultado->rowCount() > 0) {
            
            //Guarda el resultado en un objeto
            $oResultado = $resultado->fetchObject();

            // Crea un nuevo objeto Usuario con las propiedades recuperadas de la base de datos
            if ($oResultado) {
                
                //Instancia un nuevo Usuario
                $oUsuario = new Usuario(
                        $oResultado->T01_CodUsuario,
                        $oResultado->T01_Password,
                        $oResultado->T01_DescUsuario,
                        $oResultado->T01_NumConexiones,
                        $oResultado->T01_FechaHoraUltimaConexion,
                        $oResultado->T01_FechaHoraUltimaConexionAnterior=null,
                        $oResultado->T01_Perfil
                );
            }
        }

        // Devuelve el objeto Usuario, que puede ser null si la autenticación falla
        return $oUsuario;
    }

    // Método estático para registrar la última conexión de un usuario en la base de datos
    public static function registrarUltimaConexion($oUsuario) {
        
        // Actualiza el número de accesos y la fecha de última conexión anterior en el objeto Usuario
        $oUsuario->setNumAcceso($oUsuario->getNumAcceso() + 1);
        $oUsuario->setFechaHoraUltimaConexionAnterior($oUsuario->getFechaHoraUltimaConexion());

        // Construye la consulta SQL para actualizar la información del usuario en la base de datos
        $consultaActualizacionFechaUltimaConexion = <<<CONSULTA
            UPDATE T01_Usuario 
            SET T01_NumConexiones = T01_NumConexiones + 1, T01_FechaHoraUltimaConexion = NOW() 
            WHERE T01_CodUsuario = '{$oUsuario->getCodUsuario()}';
        CONSULTA;

        // Ejecuta la consulta utilizando el metodo ejecutaConsulta la clase DBPDO
        DBPDO::ejecutaConsulta($consultaActualizacionFechaUltimaConexion);

        // Devuelve el objeto Usuario actualizado
        return $oUsuario;
    }
}


