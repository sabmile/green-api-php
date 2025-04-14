<?php

function getFunction(string $idInstance, string $apiToken, string $function):string {

    $apiUrl = "https://7105.api.greenapi.com/waInstance" . $idInstance . DIRECTORY_SEPARATOR  . $function . DIRECTORY_SEPARATOR  . $apiToken;

    $payload = [];
    $headers = [
        'Content-Type: application/json',
    ];

    $options = [
        "http" => [
            "header" => $headers,
            "method" => "GET",
            "content" => http_build_query($payload),
        ],
    ];

    $context = stream_context_create($options);

    return file_get_contents($apiUrl, false, $context);

}

function sendMessage(string $idInstance, string $apiToken, string $phone, string $message) {

    $function = "sendMessage";
    $apiUrl = "https://7105.api.greenapi.com/waInstance" . $idInstance . DIRECTORY_SEPARATOR . $function . DIRECTORY_SEPARATOR . $apiToken;

    $headers = [
        'Content-type: application/x-www-form-urlencoded',
    ];

    $chatId = $phone . '@c.us';
    $data = array(
        'chatId' => $chatId, 
        'message' => $message,
    );

    $options = array(
        'http' => array(
            'header' => $headers,
            'method' => 'POST',
            'content' => json_encode($data)
        )
    );

    $context = stream_context_create($options);

    return file_get_contents($apiUrl, false, $context);

}

function sendFileByUrl(string $idInstance, string $apiToken, string $phone, string $fileUrl) {

    $function = 'sendFileByUrl';
    $apiUrl = "https://7105.api.greenapi.com/waInstance" . $idInstance . DIRECTORY_SEPARATOR  . $function . DIRECTORY_SEPARATOR  . $apiToken;
    
    $chatId = $phone . '@c.us';
    $data = [
        'chatId' => $chatId, 
        "urlFile" => $fileUrl,
        "fileName" => "horse.png",
    ];

    $headers = [
        'Content-Type: application/x-www-form-urlencoded',
    ];

    $options = [
        "http" => [
            "header" => $headers,
            "method" => "POST",
            "content" => json_encode($data),
        ],
    ];

    $context = stream_context_create($options);

    return file_get_contents($apiUrl, false, $context);
   
}