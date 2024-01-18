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
    
    // Validar las credenciales del usuario
    public static function validarUsuario($codUsuario, $password);
}
