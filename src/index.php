<?php

session_start();

include_once 'helpers.php';
include_once 'functions.php';

$idInstance = "";
$apiToken = "";
$response = "";
$action = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (isset($_POST['idInstance'])) {
        $idInstance = htmlspecialchars($_POST['idInstance']);
        $_SESSION['idInstance'] = $idInstance;
    }

    if (isset($_POST['apiToken'])) {
        $apiToken = htmlspecialchars($_POST['apiToken']);
        $_SESSION['apiToken'] = $apiToken;
    }
    
    if (isset($_POST['action'])) {
        $action = htmlspecialchars($_POST['action']);
    }
    
    if (isset($action)) {

        switch ($action) {

            case 'getSettings': 
                $response = getFunction( $idInstance, $apiToken, 'getSettings');
                break;

            case 'getStateInstance':
                $response = getFunction( $idInstance, $apiToken, 'getStateInstance');
                break;

            case 'sendMessage':
                if (isset($_POST['phoneMessage']))  {
                    $phoneMessage = htmlspecialchars($_POST['phoneMessage']);
                }
                if (isset($_POST['message'])) {
                    $message = htmlspecialchars($_POST['message']);
                }
                $response = sendMessage($idInstance, $apiToken, $phoneMessage, $message);
                break;

            case 'sendFileByUrl':
                if (isset($_POST['phoneURL']))  {
                    $phoneURL = htmlspecialchars($_POST['phoneURL']);
                }
                if (isset($_POST['url'])) {
                    $url = htmlspecialchars($_POST['url']);
                }
                $response = sendFileByUrl( $idInstance, $apiToken, $phoneURL, $url);
                print_r($response);
                break;
        }
    }
}

$options = include_template('options.php',
    [  
        'idInstance' => $idInstance,
        'apiToken' => $apiToken,
    ]
);

$content = include_template('main.php',
    [
        'options' => $options,
    ]
);

$layoutContent = include_template('layout.php',
    [
        'content' => $content,
        'response' => $response,
    ]
);

print_r($layoutContent);

