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
        //Abrimos un bloque try catch para el control de errores
        try {

            // Configuramos el contexto para manejar errores HTTP
            $context = stream_context_create(['http' => ['ignore_errors' => true]]);

            //Obtenemos la url de la API
            $url = "https://api.nasa.gov/planetary/apod?api_key=rAIYGgvhzNQg1Lxtpe90waf8orEmQPTrZrfdra14&date=$fecha";

            // Realiza la solicitud y obtiene los encabezados de respuesta
            $response_headers = get_headers($url);

            // Verifica si la respuesta contiene un código de estado 404
            if (strpos($response_headers[0], '404') !== false) {
                // Maneja el caso de error 404
                return 'Recurso no encontrado';
                         
                //Si ha encontrado el recurso  
            } else {

                // obtenemos el resultado del servidor del api rest
                $resultado = file_get_contents($url, false, $context);

                // Verificamos si hay errores HTTP
                if ($resultado === false) {

                    //Si hay un error devolvemos un mensaje
                    return 'Error en la conexión con el servidor, vuelva a intentarlo más tarde';
                    
                }

                // Almacenamos el array devuelto por json_decode
                $aNasa = json_decode($resultado, true);

                // Verificamos errores en json_decode
                if (json_last_error() !== JSON_ERROR_NONE) {

                    //Mandamos un mensaje de error
                    return 'Error al decodificar el archivo JSON';
                }

                // Verificamos si la API devuelve un error
                if (isset($aNasa['error'])) {

                    //Si devuleve un error
                    if (isset($aNasa['error']['msg'])) {

                        //Devolvemos un mensaje
                        return 'Error en la conexión con la API';
                    } else {
                        return 'Error en la conexión con la API';
                    }
                }

                // Devolvemos un array con los datos que queremos devolver
                return $aNasa;
            }
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
     */ public static function gitHub()
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

        // Establece un manejador de errores personalizado para capturar la advertencia
        set_error_handler(function ($errno, $errstr, $errfile, $errline) {
            if (strpos($errstr, 'file_get_contents(https://api.github.com/users/alvarocormi)') !== false) {
                return 'Ha habido un error al procesar la solicitud';
            }
            return false;
        });

        try {
            // Realiza la solicitud a la API de GitHub
            $response = file_get_contents('https://api.github.com/users/alvarocormi', false, $context);

            // Verifica si la solicitud fue exitosa
            if ($response === FALSE) {
                return 'Error al realizar la solicitud a la API de GitHub';
            }

            // Decodifica la respuesta JSON
            $aRepos = json_decode($response, true);

            return $aRepos;
        } catch (Exception $e) {
            return 'Error: ' . $e->getMessage();
        } finally {

            // Restaura el manejador de errores predeterminado
            restore_error_handler();
        }
    }


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

            //Metodo que se va a utilizar para realizar la peticion
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
            return 'Error cURL: ' . curl_error($curl);
        }

        // Cierra la sesión cURL
        curl_close($curl);

        // Decodifica la respuesta JSON
        $data = json_decode($response, true);

        // Verifica si la decodificación fue exitosa y si la clave "data" existe
        if (json_last_error() === JSON_ERROR_NONE && isset($data['data'])) {

            // Accede al valor de translatedText
            $translatedText = $data['data']['translatedText'];

            // Verifica si la clave 'translatedText' está presente
            if (isset($data['data']['translatedText'])) {
                // Retorna el resultado
                return $translatedText;
            } else {
                // Maneja el caso en el que la traducción no sea posible
                return "No se pudo traducir la palabra: $texto";
            }
            
        } else {
            // Maneja el caso en que la decodificación falle o la clave "data" no exista
            return 'No has introducido ningun valor';
        }
    }
}
