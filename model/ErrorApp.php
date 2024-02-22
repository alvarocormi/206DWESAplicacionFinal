<?php

/**
 * @author Alvaro Cordero
 * @version 1.0
 * @since 17/01/2024
 * 
 * @Annotation Proyecto LoginLogoutMulticapaPOO - Clase Error
 * 
 */
/**
 * Clase ErrorApp
 */
class ErrorApp {
    
    
    private $codError;
    private $descError;
    private $archivoError;
    private $lineaError;
        
    /**
     * __construct
     *
     * @param  mixed $codError
     * @param  mixed $descError
     * @param  mixed $archivoError
     * @param  mixed $lineaError
     * @return void
     */
    public function __construct($codError, $descError, $archivoError, $lineaError) {
        $this->codError = $codError;
        $this->descError = $descError;
        $this->archivoError = $archivoError;
        $this->lineaError = $lineaError;
    }
        
    /**
     * getCodError
     *
     * @return void
     */
    public function getCodError() {
        return $this->codError;
    }
    
    /**
     * getDescError
     *
     * @return void
     */
    public function getDescError() {
        return $this->descError;
    }
    
    /**
     * getArchivoError
     *
     * @return void
     */
    public function getArchivoError() {
        return $this->archivoError;
    }
    
    /**
     * getLineaError
     *
     * @return void
     */
    public function getLineaError() {
        return $this->lineaError;
    }

}
