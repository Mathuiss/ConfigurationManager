<?php
//Settings script for config client

$RESTSERVER = "http://imisqa.com:5050";

$payload = array();

$file = fopen("root_customer", "r");

while (!feof($file)) {
    $line = fgets($file);
    if ($line != "") {
        $splitResult = explode("=", str_replace("\n", "", $line));
    }

    $payload[$splitResult[0]] = $splitResult[1];
}

fclose($file);

$target = $payload["customer"];
