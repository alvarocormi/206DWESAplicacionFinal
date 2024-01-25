<?php
/**
 * @author Alvaro Cordero
 * @version 1.0
 * @since 16/01/2024
 * 
 * @Annotation Proyecto LoginLogoutMulticapaPOO - Interfaz UsuarioDB
 * 
 */

interface UsuarioDB {
        
    /**
     * validarUsuario
     * 
     * Mediante esta funcion validaremos que si un usuario es correcto
     *
     * @param  mixed $codUsuario
     * @param  mixed $password
     * @return void
     */
    public static function validarUsuario($codUsuario, $password);
}
