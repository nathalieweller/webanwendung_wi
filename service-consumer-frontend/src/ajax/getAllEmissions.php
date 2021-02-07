<?php

# Aufrufbar via Ajax ....../getAllCars

$prefix = 'http://';
$host = '127.0.0.1';
$port = '8000';
$api = '/rest';

//Zusammenstellung der URI
$URI = $prefix.$host.':'.$port.$api.'/emission';

// cURL Abfrage um alle Emmissionen abzufragen
$ch = curl_init();
// Benötigte cURL Parameter setzen
curl_setopt($ch, CURLOPT_URL, $URI);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/x-www-form-urlencoded'
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// cURL Rückgabe abfangen
$response = curl_exec($ch);

// Erhaltenen Wert zurückgeben
echo $response;