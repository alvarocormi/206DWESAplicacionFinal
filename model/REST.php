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
 * Clase REST
 */
class REST
{

    const apikeyNASA = 'rAIYGgvhzNQg1Lxtpe90waf8orEmQPTrZrfdra14';

    /**
     * @author CristinaMLSauces , mejorado por Alvaro Cordero.
     * @version 1.0
     * @since 21/01/2024
     */
    public static function pedirFotoNasa($fecha)
    {
        try {
            // obtenemos el resultado del servidor del api rest
            $resultado = file_get_contents("https://api.nasa.gov/planetary/apod?api_key=" . self::apikeyNASA . "&date=$fecha");

            // Devolvemos el array devuelto por json_decode
            return json_decode($resultado, true);
        } catch (Exception $excepcion) {
            // devolvemos el mensaje de error
            return $excepcion->getMessage();
        }
    }


    public static function textTranslator($texto)
    {
        // Inicia una nueva sesión y obtiene el manipulador cURL

        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://text-translator2.p.rapidapi.com/translate",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "source_language=es&target_language=en&text={$texto}",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: text-translator2.p.rapidapi.com",
                "X-RapidAPI-Key: 4404276d16mshfb86423f9ab7fffp1ac8e6jsn6e13af741399",
                "content-type: application/x-www-form-urlencoded"
            ],
        ]);

        $response = curl_exec($curl);

        curl_close($curl);

        $data = json_decode($response, true);

        // Verifica si la decodificación JSON fue exitosa
        if ($data === null || !isset($data['data'])) {
            return null;
        }

        // Accede al valor de translatedText
        $translatedText = $data['data']['translatedText'];

        // Verifica si la clave 'translatedText' está presente
        if (isset($data['data']['translatedText'])) {
            // Retorna el resultado
            return $translatedText;
        }
    }
}
