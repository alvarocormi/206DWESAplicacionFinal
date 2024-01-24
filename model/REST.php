<?php

/**
 * @author CristinaMLSauces , mejorado por Alvaro Cordero
 * @version 1.0
 * @since 22/01/2024
 * 
 * @Annotation Proyecto LoginLogoutMulticapaPOO - Clase REST
 * 
 */


class REST
{
    public static function pedirFotoNasa($fecha)
    {
        try {
            // obtenemos el resultado del servidor del api rest
            $resultado = file_get_contents("https://api.nasa.gov/planetary/apod?api_key=rAIYGgvhzNQg1Lxtpe90waf8orEmQPTrZrfdra14&date=$fecha", true);

            // si no obtenemos el resultado esperado
            if ($resultado == false) {

                //Lanzamos una excepcion
                throw new Exception("Error en la conexión con el servidor, vuelva a intentarlo mas tarde");
            }

            // Almacenamos el array devuelto por json_decode
            $aNasa = json_decode($resultado, true);

            //devolvemos un array con los datos que queremos devolver
            return $aNasa;
        } catch (Exception $excepcion) {

            //Asignamos a un array el mensaje de error de la excepcion
            $aRespuesta[0] = $excepcion->getMessage();

            // devolvemos el array con el mensaje de error
            return $aRespuesta;
        }
    }

    public static function gitHub()
    {
        // Configura el encabezado User-Agent
        $options = [
            'http' => [
                'header' => "User-Agent: MiAplicacion\r\n",
                'method' => 'GET',
            ],
        ];

        // Crea el contexto de la solicitud
        $context = stream_context_create($options);

        // Realiza la solicitud a la API de GitHub
        $response = file_get_contents('https://api.github.com/users/alvarocormi', false, $context);

        // Verifica si la solicitud fue exitosa
        if ($response === FALSE) {
            die('Error al realizar la solicitud a la API de GitHub');
        }

        // Decodifica la respuesta JSON
        $aRepos = json_decode($response, true);

        return $aRepos;
    }
}
