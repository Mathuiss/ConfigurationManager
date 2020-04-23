<?php

require_once("autoloader.php");
require_once("server.php");

$jsonPayload = json_encode($payload);
echo $jsonPayload;


$client = new \GuzzleHttp\Client([
    "headers" => [
        "Content-Type" => "application/json"
    ]
]);

$response = $client->request(
    "POST",
    "{$RESTSERVER}/config/{$target}",
    [
        "body" => $jsonPayload
    ]
);

echo $response->getReasonPhrase();
