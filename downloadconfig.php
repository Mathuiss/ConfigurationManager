<?php

require_once("autoloader.php");
require_once("server.php");

$client = new \GuzzleHttp\Client();
$respone = $client->request("GET", "{$RESTSERVER}/config/{$target}");
$jsonPayload = $respone->getBody();

$payload = json_decode($jsonPayload);

if (count($payload) > 0) {
    $file = fopen("root_customer", "w");

    for ($i = 0; $i < count($payload); $i++) {
        fwrite($file, $payload[$i]);
    }

    fclose($file);
}

echo shell_exec("cat root_customer");
