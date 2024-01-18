<?php
/**
 * @author Alvaro Cordero
 * @version 1.0
 * @since 16/01/2024
 * 
 * @Annotation Proyecto LoginLogoutMulticapaPOO - Interfaz DB
 * 
 */
interface DB {
    
    /**
     * 
     * Este metodo ejecuta las sentencias SQP recibidas
     * Le pasamos como parametro la sentencia SQL que queremos ejecutar
     * Este metodo esta progamado en la clase DBPDO     
     */
    public static function ejecutaConsulta($sentenciaSQL);
}
