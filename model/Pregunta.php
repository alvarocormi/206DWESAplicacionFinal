<?php

/**
 * @author Alvaro Cordero
 * @version 1.0
 * @since 12/01/2024
 * 
 * 
 * @Annotation Aplicación Final - Clase Pregunta 
 * 
 */

/**
 * Clase Pregunta
 */
class Pregunta
{	
	private $codPregunta;	
	
	private $descPregunta;
	private $fechaAlta;
	private $respuesta;
	private $autorRespuesta;
	private $valor;
	private $fechaBaja;

	
	/**
	 * __construct
	 *
	 * @param  mixed $codPregunta
	 * @param  mixed $descPregunta
	 * @param  mixed $fechaAlta
	 * @param  mixed $respuesta
	 * @param  mixed $autorRespuesta
	 * @param  mixed $valor
	 * @param  mixed $fechaBaja
	 * @return void
	 */
	public function __construct($codPregunta, $descPregunta, $fechaAlta, $respuesta, $autorRespuesta, $valor, $fechaBaja = null)
	{
		$this->codPregunta = $codPregunta;
		$this->descPregunta = $descPregunta;
		$this->fechaAlta = $fechaAlta;
		$this->respuesta = $respuesta;
		$this->autorRespuesta = $autorRespuesta;
		$this->valor = $valor;
		$this->fechaBaja = $fechaBaja;
	}

	public function getCodPregunta()
	{
		return $this->codPregunta;
	}

	public function getDescPregunta()
	{
		return $this->descPregunta;
	}

	public function getFechaAlta()
	{
		return $this->fechaAlta;
	}

	public function getRespuesta()
	{
		return $this->respuesta;
	}

	public function getAutorRespuesta()
	{
		return $this->autorRespuesta;
	}

	public function getValor()
	{
		return $this->valor;
	}

	public function getFechaBaja()
	{
		return $this->fechaBaja;
	}

	public function setCodPregunta($codPregunta): void
	{
		$this->codPregunta = $codPregunta;
	}

	public function setDescPregunta($descPregunta): void
	{
		$this->descPregunta = $descPregunta;
	}

	public function setFechaAlta($fechaAlta): void
	{
		$this->fechaAlta = $fechaAlta;
	}

	public function setRespuesta($respuesta): void
	{
		$this->respuesta = $respuesta;
	}

	public function setAutorRespuesta($autorRespuesta): void
	{
		$this->autorRespuesta = $autorRespuesta;
	}

	public function setValor($valor): void
	{
		$this->valor = $valor;
	}

	public function setFechaBaja($fechaBaja): void
	{
		$this->fechaBaja = $fechaBaja;
	}
}
