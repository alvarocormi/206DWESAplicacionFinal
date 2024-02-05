<?php

// Función para validar un NIF
function validarNIF($nif)
{
    // Aquí implementa la lógica de validación de NIF según tus requisitos.
    // Puedes encontrar algoritmos de validación específicos para tu país.

    // Ejemplo simple para España (NIF español)
    $regexNIF = '/^[0-9]{8}[TRWAGMYFPDXBNJZSQVHLCKE]$/';
    return preg_match($regexNIF, $nif);
}

// Verifica si la solicitud es OPTIONS (preflight)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Content-Type: application/json");
    http_response_code(200);
    exit;
}


// Verifica si la solicitud es GET
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // Verifica si se proporciona el parámetro 'nif' en la URL
    if (isset($_GET['nif'])) {
        $nif = $_GET['nif'];

        // Realiza la validación del NIF
        if (validarNIF($nif)) {
            echo json_encode(['resultado' => 'NIF valido']);
        } else {
            http_response_code(400);
            echo json_encode(['resultado' => 'NIF invalido']);
        }
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Parámetro "nif" no encontrado en la URL']);
    }
} else {
    http_response_code(405);
    echo json_encode(['error' => 'Método no permitido']);
}
?>
