<?php

require_once("autoloader.php");
require_once("server.php");


$payload = array();

$file = fopen("customer.sh", "r");

while (!feof($file)) {
    $line = fgets($file);
    if ($line != "") {
        $splitResult = explode("=", str_replace("\n", "", $line));
    }

    $payload[$splitResult[0]] = $splitResult[1];
}

fclose($file);

$target = $payload["customer"];

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
