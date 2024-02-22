<?php

/**
 * @author Carlos García Cachón, mejorado por Alvaro Cordero
 * @version 1.0
 * @since 18/01/2024
 * 
 * @Annotation Aplicación Final - Clase DepartamentoPDO
 * 
 */


/**
 * Clase PreguntaPDO
 */
class PreguntaPDO
{

    public static function buscarPreguntaPorDesc($descPregunta = '')
    {
        //Inicialicamos el array departamentos
        $aPreguntas = [];

        // Consulta de busqueda según el valor del parametro introducido
        $consulta = <<<CONSULTA
            SELECT * FROM T08_Pregunta 
            WHERE T08_DescPregunta LIKE'%$descPregunta%';
        CONSULTA;

        // Ejecutamos la consulta llamando al metodo de la clase DBPDO
        $resultadoConsulta = DBPDO::ejecutaConsulta($consulta);

        if (!is_null($resultadoConsulta)) {

            // Guardo en la variable el resultado de la consulta en forma de objeto y lo recorro
            while ($oPregunta = $resultadoConsulta->fetchObject()) {

                //Creamos un nuevo departamento a partir de los datos que nos han pasado por la consulta
                $aPreguntas[$oPregunta->T08_CodPregunta] = new Pregunta(
                    $oPregunta->T08_CodPregunta,
                    $oPregunta->T08_DescPregunta,
                    $oPregunta->T08_FechaAlta,
                    $oPregunta->T08_Respuesta,
                    $oPregunta->T08_AutorRespuesta,
                    $oPregunta->T08_Valor,
                    $oPregunta->T08_FechaBaja
                );
            }

            //Devolvemos un array que contiene los departamentos extraidos de la consulta
            return $aPreguntas;

            //En el caso de que la consulta no se realice	
        } else {

            //Devolvemos false
            return false;
        }
    }

    /**
     * Metodo que nos permite buscar una Pregunta por el código 
     * 
     * @param string $codPregunta El código de la pregunta
     * 
     * @return object Pregunta
     */
    public static function buscarPreguntaPorCod($codPregunta)
    {
        //CONSULTA SQL - SELECT
        $consulta = <<<CONSULTA
            SELECT * FROM T08_Pregunta 
            WHERE T08_CodPregunta = '{$codPregunta}';
        CONSULTA;

        $resultado = DBPDO::ejecutaConsulta($consulta); // Ejecuto la consulta

        if ($resultado->rowCount() > 0) { // Si la consulta tiene más de '0' valores
            $oPregunta = $resultado->fetchObject(); // Guardo en la variable el resultado de la consulta en forma de objeto

            if ($oPregunta) { // Instancio un nuevo objeto Pregunta con todos sus datos
                return new Pregunta( // Y lo devuelvo
                    $oPregunta->T08_CodPregunta,
                    $oPregunta->T08_DescPregunta,
                    $oPregunta->T08_FechaAlta,
                    $oPregunta->T08_Respuesta,
                    $oPregunta->T08_AutorRespuesta,
                    $oPregunta->T08_Valor,
                    $oPregunta->T08_FechaBaja
                );
            } else {
                return $oPregunta; // Si no devuelvo el valor por defecto 'NULL'
            }
        }
    }

    /**
     * Modifica los valores de una pregunta
     *
     * @param int $codPregunta Codigo de la pregunta a editar
     * @param int $valorPregunta Valor de la pregunta a editar
     * @param string $descPregunta Descripción de la pregunta a editar
     * @param string $autorRespuestaPregunta Autor de la pregunta a editar
     * 
     * @return PDOStatment Devuelve el resultado de la coonsulta
     */
    public static function modificarPregunta($codPregunta, $descPregunta, $valorPregunta, $autorRespuestaPregunta)
    {

        // Consulta de busqueda según el valor del parametro introducido
        $consulta = <<<CONSULTA
            UPDATE T08_Pregunta SET 
            T08_DescPregunta = '{$descPregunta}',
            T08_AutorRespuesta = '{$autorRespuestaPregunta}',
            T08_Valor = {$valorPregunta}
            WHERE T08_CodPregunta = '{$codPregunta}';
        CONSULTA;

        return DBPDO::ejecutaConsulta($consulta); // Ejecutamos y devolvemos la consulta
    }

    /**
     * borrarPregunta
     *
     * @param  mixed $codPregunta
     * @return void
     */
    public static function borrarPregunta($codPregunta)
    {

        //Preparamos una consulta para eliminar un departamento por codigo
        $consulta = "DELETE FROM T08_Pregunta WHERE T08_CodPregunta= '$codPregunta';";

        //Ejecutamos la consulta
        if (DBPDO::ejecutaConsulta($consulta)) {

            //Si la consulta se ejecuta correctamente devolvemos true
            return true;
        } else {

            //Si hay algun fallo al ejecutar la consulta devolvemos false
            return false;
        }
    }

    public static function altaPregunta($codPregunta, $descPregunta, $fechaAlta, $respuesta, $autor, $valor)
    {   
        /**
         * Preparamos la consulta de insercion
         */
        $consultaInsercion = "INSERT INTO T08_Pregunta VALUES('$codPregunta', '$descPregunta', '$fechaAlta', '$respuesta', '$autor', $valor,null)";

        /**
         * Ejecuto la consulta mediante la clase DBPDO
         */
        if (DBPDO::ejecutaConsulta($consultaInsercion)) { 

            /**
             * Devolvemos una pregunta
             */
            return new Pregunta($codPregunta, $descPregunta, $fechaAlta, $respuesta, $autor, $valor,null); 
        } else {

            // Si la consulta falla devuelvo 'false'
            return false; 
        }
    }
}
