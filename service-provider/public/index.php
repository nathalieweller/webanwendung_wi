<?php

// service-provider-2 % php -S 127.0.0.1:8000 -t public 

// Der CarController wird geladen
use Src\Controller\CarController;

// Für Setups
require "../bootstrap.php";
// Verschiedene header werden gesetzt
// Festlegung, dass von überall aus Anfragen angenommen werden dürfen und nicht nur von einem speziellen Server
header("Access-Control-Allow-Origin: *");
// Festlegung das JSON übermittelt werden
header("Content-Type: application/json; charset=UTF-8");
// Festlegung welche Methoden verwendet werden dürfen
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
// Festlegung wie lange die Anfrage dauern darf
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, *");

// Gibt die verschiedenen Komponenten der URI zurück
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
// Aufruf explode. Sprengt die URL ihre Einzelteile auf
$uri = explode( '/', $uri );
// Prüfung ob in der URL an Stelle eins der Wert rest drin steht
if ($uri[1] !== 'rest') {
    // Wenn rest nicht an erster Stelle steht, wird eine Fehlermeldung ausgegeben
    header("HTTP/1.1 404 Not Found");
    // Anfrage wird abgebrochen
    exit();
}
// Wenn rest an erster Stelle steht geht es hier weiter:
// Variable id wird erstellt und wird mit null belegt
$id = null;
// Prüfung ob an Stelle drei was steht
if (isset($uri[3])) {
    // Wenn eine id an dritter Stelle steht wird sie hier reingefüllt
    $id = $uri[3];
}
// requestMethod sagt mit welchem Aufruf die Methode ausgeführt wurde
$requestMethod = $_SERVER["REQUEST_METHOD"];
/* Wenn die Methode post war, dann wird alles ausgelesen was übergeben wurde und 
decodiert es fals es eine JSON war und setzt alles in POST rein */
$post = json_decode(file_get_contents('php://input'));
// Prüfung ob eine dbConnection vorhanden ist (wird in bootstrap.php erzeugt)
if (!empty($dbConnection)) {
    // Ermittlung einer controllerClass: String wird in controllerClass geschrieben
    $controllerClass = '\\Src\\Controller\\'.ucfirst($uri[2]).'Controller';
    // Controller wird erzeugt und erzeugt das Objekt mit dem Inhalt der controllerClass 
    $controller = new $controllerClass($dbConnection, $requestMethod, $id, $uri[2]);
    // Auf die zuvor erzeugte Klasse wird die Funktion processRequest ausgeführt
    $controller->processRequest($post);
} else {
    echo "DB Connection missing";
}
