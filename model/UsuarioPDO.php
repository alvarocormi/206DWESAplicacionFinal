<?php

/**
 * @author Alvaro Cordero
 * @version 1.0
 * @since 16/01/2024
 * 
 * @Annotation Proyecto LoginLogoutMulticapaPOO - Clase Usuario
 * 
 */

/**
 * Clase UsuarioPDO
 */
class UsuarioPDO implements UsuarioDB {

    /**
     * validarUsuario
     *  
     * Método estático para validar un usuario en la base de datos   
     * 
     * @param  mixed $codUsuario
     * @param  mixed $password
     * @return void
     */
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
    
    /**
     * registrarUltimaConexion
     * 
     * Método estático para registrar la última conexión de un usuario en la base de datos
     *
     * @param  mixed $oUsuario
     * @return void
     */
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

    
    /**
     * Mediante este metodo podremos dar de alta a un usuario en nuestra base de datos
     * Es decir realizar una consulta de insercion pasandole los siguientes parametros
     * 
     * @param string $codUsuario El codigo del usuario
     * @param string $password La password del usuario
     * @param string $descUsuario La descripcion del usuario
     * 
     * @return boolean false | object Usuario Devuelve un objeto Usuario nuevo si se ha podido crear, de lo contrario devuelve un @boolean que sera 'false'
     */
    public static function altaUsuario($codUsuario, $password, $descUsuario) {

        //CONSULTA SQL - INSERT
        $consultaCrearUsuario = <<<CONSULTA
            INSERT INTO T01_Usuario(T01_CodUsuario, T01_Password, T01_DescUsuario, T01_NumConexiones, T01_FechaHoraUltimaConexion) 
            VALUES ("{$codUsuario}", SHA2("{$codUsuario}{$password}", 256), "{$descUsuario}", 1, now());
        CONSULTA;
        
        //Si se ejecuta la consulta correctamente
        if (DBPDO::ejecutaConsulta($consultaCrearUsuario)) { 

            //Creo un usuario con los valores recogidos como parametros
            return new Usuario($codUsuario, $password, $descUsuario, 1, date('Y-m-d H:i:s'), null, 'usuario');

            // Si la consulta falla devuelvo
        } else {

            //Devuelvo false
            return false; 
        }
    }


    /**
     * Metodo que nos permite validar si el código de un usuario existe en la BD
     * 
     * @param string $codUsuario El código del usuario
     * 
     * @return object  con el primer resultado de la consulta ejecutada
     */
    public static function validarCodNoExiste($codUsuario) {

        //CONSULTA SQL - SELECT mediante la cual comprobamos si el codigo esta en la base de datos
        $consultaExisteUsuario = <<<CONSULTA
            SELECT T01_CodUsuario FROM T01_Usuario WHERE T01_CodUsuario='{$codUsuario}';
        CONSULTA;

        //Devolvemos un objeto con el primer resultado de la consulta
        return DBPDO::ejecutaConsulta($consultaExisteUsuario)->fetchObject();
    }


     /**
     * 
     * Metodo que nos permite modificar la descripción de un Usuario existente en la BD
     * 
     * @param object $oUsuario Objeto usuario
     * @param string $descUsuario La nueva descripción
     * 
     * @return boolean | object Un objeto usuario, si el usuario existe y se puede cambiar, de lo contrario un boolean a 'false'
     */
    public static function modificarUsuario($oUsuario, $descUsuario) {
        //CONSULTA SQL - UPDATE
        $consultaModificarUsuario = <<<CONSULTA
            UPDATE T01_Usuario SET T01_DescUsuario="{$descUsuario}" WHERE T01_CodUsuario="{$oUsuario->getCodUsuario()}";
        CONSULTA;

        $oUsuario->setDescUsuario($descUsuario);

        if (DBPDO::ejecutaConsulta($consultaModificarUsuario)) { // Ejecuto la consulta
            return $oUsuario; // Devuelvo un objeto Usuario
        } else {
            return false;
        }
    }


     /**
     * Metodo que nos permite eliminar un usuario existente en la BD
     * 
     * @param string $codUsuario El código del usuario
     * 
     * @return bool True si el usuario se eliminó correctamente, False si hubo un error.
     */
    public static function borrarUsuario($codUsuario) {
        //CONSULTA SQL - DELETE
        $consultaEliminarUsuario = <<<CONSULTA
            DELETE FROM T01_Usuario WHERE T01_CodUsuario = '{$codUsuario}';
        CONSULTA;

        //Devolvemos el resultado de la consulta
        return DBPDO::ejecutaConsulta($consultaEliminarUsuario);
    }


     /**
     * Metodo cambiarPassword()
     * 
     * Metodo que nos permite cambiar la password anterior por una nueva
     * 
     * @param object $oUsuario Objeto usuario
     * @param string $password La password nueva
     * 
     * @return boolean Un objeto usuario si el usuario existe y se puede cambiar la password, de lo contrario un boolean a false
     */
    public static function cambiarPassword($oUsuario, $password){
        //Consulta SQL para modificar la password de un usuario
        $consultaModificarPassword = <<<CONSULTA
            UPDATE T01_Usuario SET T01_Password=SHA2("{$oUsuario->getCodUsuario()}{$password}", 256) WHERE T01_CodUsuario="{$oUsuario->getCodUsuario()}";
        CONSULTA;
        
        /*
         * La siguente línea de código hago un hash con la nueva contraseña, para que cuando edite la 
         * contraseña del objeto Usuario, no me la guarde en el objeto sin encriptar.
         */
        $hashPassword = hash("sha256", ($oUsuario->getCodUsuario() . $password)); 
        $oUsuario->setPassword($hashPassword);
        
        if(DBPDO::ejecutaConsulta($consultaModificarPassword)){
            return $oUsuario;
        }else{
            return false;
        }
    }

}


