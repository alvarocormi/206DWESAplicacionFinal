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
class DepartamentoPDO
{

	/**
	 * Realiza una consulta filtrando por descripcion de deparamentos y devuleve su resultado
	 *
	 * @param string $descDepartamento Descripción del Departamento a buscar
	 * 
	 * @return array[object] $aDepartamentos Con todos los departamentos de la busqueda
	 * @return boolean false En caso de que la consulta sea incorrecta
	 */
	public static function buscaDepartamentosPorDesc($descDepartamento = '')
	{
		//Inicialicamos el array departamentos
		$aDepartamentos = [];

		// Consulta de busqueda según el valor del parametro introducido
		$consulta = <<<CONSULTA
            SELECT * FROM T02_Departamento 
            WHERE T02_DescDepartamento LIKE'%$descDepartamento%';
        CONSULTA;

		// Ejecutamos la consulta llamando al metodo de la clase DBPDO
		$resultadoConsulta = DBPDO::ejecutaConsulta($consulta); 

		if (!is_null($resultadoConsulta)) {

			// Guardo en la variable el resultado de la consulta en forma de objeto y lo recorro
			while ($oDepartamento = $resultadoConsulta->fetchObject()) { 

				//Creamos un nuevo departamento a partir de los datos que nos han pasado por la consulta
				$aDepartamentos[$oDepartamento->T02_CodDepartamento] = new Departamento(
					$oDepartamento->T02_CodDepartamento,
					$oDepartamento->T02_DescDepartamento,
					$oDepartamento->T02_FechaCreacionDepartamento,
					$oDepartamento->T02_VolumenDeNegocio,
					$oDepartamento->T02_FechaBajaDepartamento
				);
			}

			//Devolvemos un array que contiene los departamentos extraidos de la consulta
			return $aDepartamentos;

		//En el caso de que la consulta no se realice	
		} else {

			//Devolvemos false
			return false;
		}
	}
}
