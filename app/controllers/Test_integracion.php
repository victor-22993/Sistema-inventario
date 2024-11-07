<?php

// loginIntegrationTest.php
// Prueba de integración manual para el loginController.php

// Simula los datos de un formulario de login
$testCredentials = [
    'username' => 'Administrador',
    'password' => 'Administrador'
];

// Función para simular una solicitud POST al controlador
function sendPostRequest($url, $postData) {
    $ch = curl_init();
    
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    curl_close($ch);
    
    return [
        'response' => $response,
        'http_code' => $httpCode
    ];
}

// Simular la URL del controlador (esto depende de tu entorno)
$controllerUrl = 'http://localhost/Sistema_inventarios/';

// Enviar la solicitud al controlador
$result = sendPostRequest($controllerUrl, $testCredentials);

// Verificar el resultado
if ($result['http_code'] == 200) {
    echo "Respuesta del controlador: Prueba de integración exitosa.  " . $result['response'];
} else {
    echo "Error en la prueba de integración. Código de estado HTTP: " . $result['http_code'];
}

?>
