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
 * DepartamentoPDO
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


}
