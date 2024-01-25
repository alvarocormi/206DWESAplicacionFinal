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
 * Usuario
 */
class Usuario {

    // Propiedades privadas para almacenar información del usuario
    private $codUsuario;
    private $password;
    private $descUsuario;
    private $numAcceso;
    private $fechaHoraUltimaConexion;
    private $fechaHoraUltimaConexionAnterior;
    private $perfil;

    /**
     * __construct
     *
     * @param  mixed $codUsuario
     * @param  mixed $password
     * @param  mixed $descUsuario
     * @param  mixed $numAcceso
     * @param  mixed $fechaHoraUltimaConexion
     * @param  mixed $fechaHoraUltimaConexionAnterior
     * @param  mixed $perfil
     * @return void
     */
    public function __construct($codUsuario, $password, $descUsuario, $numAcceso, $fechaHoraUltimaConexion, $fechaHoraUltimaConexionAnterior, $perfil) {
        $this->codUsuario = $codUsuario;
        $this->password = $password;
        $this->descUsuario = $descUsuario;
        $this->numAcceso = $numAcceso;
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
        $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
        $this->perfil = $perfil;
    }


    /**
     * Obtiene el código del usuario.
     * @return mixed
     */
    public function getCodUsuario() {
        return $this->codUsuario;
    }

    /**
     * Obtiene la contraseña del usuario.
     * @return mixed
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Obtiene la descripción del usuario.
     * @return mixed
     */
    public function getDescUsuario() {
        return $this->descUsuario;
    }

    /**
     * Obtiene el número de accesos del usuario.
     * @return mixed
     */
    public function getNumAcceso() {
        return $this->numAcceso;
    }

    /**
     * Obtiene la fecha y hora de la última conexión del usuario.
     * @return mixed
     */
    public function getFechaHoraUltimaConexion() {
        return $this->fechaHoraUltimaConexion;
    }

    /**
     * Obtiene la fecha y hora de la conexión anterior del usuario.
     * @return mixed
     */
    public function getFechaHoraUltimaConexionAnterior() {
        return $this->fechaHoraUltimaConexionAnterior;
    }

    /**
     * Obtiene el perfil del usuario.
     * @return mixed
     */
    public function getPerfil() {
        return $this->perfil;
    }

    // Métodos de modificación (setters) para actualizar las propiedades privadas

    /**
     * Establece el código del usuario.
     * @param mixed $codUsuario
     */
    public function setCodUsuario($codUsuario): void {
        $this->codUsuario = $codUsuario;
    }

    /**
     * Establece la contraseña del usuario.
     * @param mixed $password
     */
    public function setPassword($password): void {
        $this->password = $password;
    }

    /**
     * Establece la descripción del usuario.
     * @param mixed $descUsuario
     */
    public function setDescUsuario($descUsuario): void {
        $this->descUsuario = $descUsuario;
    }

    /**
     * Establece el número de accesos del usuario.
     * @param mixed $numAcceso
     */
    public function setNumAcceso($numAcceso): void {
        $this->numAcceso = $numAcceso;
    }

    /**
     * Establece la fecha y hora de la última conexión del usuario.
     * @param mixed $fechaHoraUltimaConexion
     */
    public function setFechaHoraUltimaConexion($fechaHoraUltimaConexion): void {
        $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
    }

    /**
     * Establece la fecha y hora de la conexión anterior del usuario.
     * @param mixed $fechaHoraUltimaConexionAnterior
     */
    public function setFechaHoraUltimaConexionAnterior($fechaHoraUltimaConexionAnterior): void {
        $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
    }

    /**
     * Establece el perfil del usuario.
     * @param mixed $perfil
     */
    public function setPerfil($perfil): void {
        $this->perfil = $perfil;
    }
}

?>
