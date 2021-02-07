<?php

# Aufrufbar via Ajax ....../getAllCarsByParams

$prefix = 'http://';
$host = '127.0.0.1';
$port = '8000';
$api = '/rest';

// Parameter aus der POST Variablen abfragen
$data = $_POST['params'];

//Zusammenstellung der URI
$URI = $prefix.$host.':'.$port.$api.'/car';

// cURL Abfrage um alle Autos abzufragen
$ch = curl_init();
// Benötigte cURL Parameter setzen
curl_setopt($ch, CURLOPT_URL, $URI);
// cURL Methode auf POST setzen
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/x-www-form-urlencoded'
]);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// cURL Postfelder setzen
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// cURL Rückgabe abfangen
$response = curl_exec($ch);

// Erhaltenen Wert zurückgeben
echo $response;