<?php

/**
 * @author CristinaMLSauces , mejorado por Alvaro Cordero
 * @version 1.0
 * @since 22/01/2024
 * 
 * @Annotation Proyecto LoginLogoutMulticapaPOO - Clase REST
 * 
 */

/**
 * REST
 */
class REST
{
    /**
     * pedirFotoNasa
     *
     * @param  mixed $fecha
     * @return void
     */
    public static function pedirFotoNasa($fecha)
    {
        try {
            // Configuramos el contexto para manejar errores HTTP
            $context = stream_context_create(['http' => ['ignore_errors' => true]]);

            // obtenemos el resultado del servidor del api rest
            $resultado = file_get_contents("https://api.nasa.gov/planetary/apod?api_key=rAIYGgvhzNQg1Lxtpe90waf8orEmQPTrZrfdra14&date=$fecha", false, $context);

            // Verificamos si hay errores HTTP
            if ($resultado === false) {
                throw new Exception("Error en la conexión con el servidor, vuelva a intentarlo más tarde");
            }

            // Almacenamos el array devuelto por json_decode
            $aNasa = json_decode($resultado, true);

            // Verificamos errores en json_decode
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception("Error al decodificar la respuesta JSON de la API");
            }

            // Verificamos si la API devuelve un error
            if (isset($aNasa['error'])) {
                throw new Exception("Error en la respuesta de la API: {$aNasa['error']['msg']}");
            }

            // Devolvemos un array con los datos que queremos devolver
            return $aNasa;
        } catch (Exception $excepcion) {
            // Asignamos a un array el mensaje de error de la excepción
            $aRespuesta[0] = $excepcion->getMessage();

            // Devolvemos el array con el mensaje de error
            return $aRespuesta;
        }
    }


    /**
     * gitHub
     *
     * @return void
     */
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


    /**
     * textTranslator
     *
     * @param  mixed $texto
     * @return void
     */
    public static function textTranslator($texto)
    {
        // Inicia una nueva sesión y obtiene el manipulador cURL
        $curl = curl_init();

        // Configura opciones para la sesión cURL
        curl_setopt_array($curl, [

            //URL de la API
            CURLOPT_URL => "https://text-translator2.p.rapidapi.com/translate",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

            //Metodo que se ve a utilizar para realizar la peticion
            CURLOPT_CUSTOMREQUEST => "POST",

            //Mensaje que se va a enviar en la peticion
            CURLOPT_POSTFIELDS => "source_language=es&target_language=en&text={$texto}",

            CURLOPT_HTTPHEADER => [
                //Host de la API
                "X-RapidAPI-Host: text-translator2.p.rapidapi.com",

                //Key de la API
                "X-RapidAPI-Key: 4404276d16mshfb86423f9ab7fffp1ac8e6jsn6e13af741399",

                //Tipo de contenido
                "content-type: application/x-www-form-urlencoded"
            ],
        ]);

        // Captura la URL y la envía al navegador
        $response = curl_exec($curl);

        // Verifica si hay errores en la solicitud cURL
        if (curl_errno($curl)) {
            echo 'Error cURL: ' . curl_error($curl);
            // Puedes manejar el error de otra manera, como lanzar una excepción
        }

        // Cierra la sesión cURL
        curl_close($curl);

        // Decodifica la respuesta JSON
        $data = json_decode($response, true);

        // Verifica si la decodificación fue exitosa y si la clave "data" existe
        if (json_last_error() === JSON_ERROR_NONE && isset($data['data'])) {

            // Accede al valor de translatedText
            $translatedText = $data['data']['translatedText'];

            // Retorna el resultado
            return $translatedText;
        } else {
            // Maneja el caso en que la decodificación falle o la clave "data" no exista
            echo "Error al decodificar la cadena JSON o la clave 'data' no está definida.";
            // Puedes manejar el error de otra manera, como lanzar una excepción
        }
    }
}
