<?php

function getFunction(string $idInstance, string $apiToken, string $function):string {

    $url = "https://7105.api.greenapi.com/waInstance" . $idInstance . "/" . $function . "/" . $apiToken;

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

    return file_get_contents($url, false, $context);

}

function sendMessage(string $idInstance, string $apiToken, string $phone, string $message) {

    $url = "https://7105.api.greenapi.com/waInstance7105223896/sendMessage/85731e282e2147d29eaf17fb3068107bda9ed097bf774f02b0";
    // $url = "https://7105.api.greenapi.com/waInstance{$idInstance}/sendMessage/{$apiToken}";
    // $url = "https://7105.api.greenapi.com/waInstance" . $idInstance . DIRECTORY_SEPARATOR . "sendMessage" . DIRECTORY_SEPARATOR . $apiToken;

    var_dump($url);

    $chatId = $phone . '@c.us';
    $data = array(
        'chatId' => $chatId, 
        'message' => $message,
    );

    $options = array(
        'http' => array(
            'header' => "Content-Type: application/json",
            'method' => 'POST',
            'content' => json_encode($data)
        )
    );

    $context = stream_context_create($options);

    return file_get_contents($url, false, $context);

}

function sendFileByUrl(string $idInstance, string $apiToken, string $phone, string $url) {

    $url = 'https://7105.api.greenapi.com/waInstance7105223896/sendFileByUrl/85731e282e2147d29eaf17fb3068107bda9ed097bf774f02b0';
    // $url = "https://7105.api.greenapi.com/waInstance" . $idInstance . "/sendMessage/" . $apiToken;

    $chatId = $phone . '@c.us';
    $data = [
        'chatId' => $chatId, 
        "urlFile" => 'https://avatars.mds.yandex.net/get-mpic/4880383/img_id8820779778077523372.jpeg/orig',
        "fileName" => "horse.png",
    ];

    $headers = [
        'Content-Type: application/json',
    ];

    $options = [
        "http" => [
            "header" => $headers,
            "method" => "POST",
            "content" => json_encode($data),
        ],
    ];

    $context = stream_context_create($options);

    return file_get_contents($url, false, $context);
   
}



