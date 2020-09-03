<?php
//Settings script for config client

$RESTSERVER = "http://imisqa.com:5050";

$payload = array();
$target;

$file = fopen("root_customer", "r");

while (!feof($file)) {
    $line = trim(fgets($file));

    if ($line != "") {
        $split = explode("=", $line);

        if ($split[0] == "customer") {
            $target = $split[1];
        }

        array_push($payload, $line);
    }
}

fclose($file);
