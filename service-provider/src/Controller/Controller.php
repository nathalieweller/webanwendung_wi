<?php


namespace src\Controller;

abstract class Controller
{   
    protected $db;
    protected $requestMethod;
    protected $id;

    protected $gateway;
    // Konstruktor
    public function __construct($db, $requestMethod, $id, $gatewayClass)
    {
        $this->db = $db;
        $this->requestMethod = $requestMethod;
        $this->id = $id;
        // Für Aufrufe auf der Datenbank
        $gatewayClass = '\\Src\\TableGateways\\'.ucfirst($gatewayClass).'Gateway';

        if (class_exists($gatewayClass)) {
            $this->gateway = new $gatewayClass($db);
        } else {
            exit($gatewayClass.' doesnt exist');
        }
    }

    public function processRequest($params = null)
    {
        // Switch Case
        switch ($this->requestMethod) {
            case 'GET':
                // Prüfung ob eine id gesetzt ist
                if ($this->id) {
                    //Wenn eine einige id gesetzt wird, soll nur ein Auto gesucht werden. 
                    $response = $this->get($this->id);
                // Wenn keine Id gesetzt wird, sollen alle Autos gesucht werden.
                } else {
                    $response = $this->getAll();
                };
                break;
            // Mehere Autos anhand von Parametern finden.
            case 'POST':
                $response = $this->getBy($params);
                break;
            case 'PUT':
                break;
            case 'DELETE':
                break;
            // Default wenn keine Request Method zutrifft
            default:
                $response = $this->notFoundResponse();
                break;
        }
        // Nur notwenig für Debugging
        // file_put_contents('debug.log', print_r($response, TRUE) . "\n", FILE_APPEND);
        
        // Gib Daten zurück
        header($response['status_code_header']);
        if ($response['body']) {
            echo $response['body'];
        }

    }

    protected function getAll()
    {
        // Rufe Funktion findAll auf dem Gateway auf und setze Ergebnis in $result
        $result = $this->gateway->findAll();
        // Setze Rückgabedaten
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        // Wandle das Ergebnis in eine JSON um
        $response['body'] = json_encode($result);
        return $response;
    }

    protected function getBy($params) 
    {
        // Rufe Funktion findBy auf dem Gateway auf und setze Ergebnis in $result
        $result = $this->gateway->findBy($params);
        // Setze Rückgabedaten
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        // Wandle das Ergebnis in eine JSON um
        $response['body'] = json_encode($result);
        return $response;
    }

    protected function get($id)
    {
        // Rufe Funktion find auf dem Gateway auf und setze Ergebnis in $result
        $result = $this->gateway->find($id);
        // Wenn result leer, wird eine Fehlermeldung ausgegeben
        if (! $result) {
            return $this->notFoundResponse();
        }
        // Setze Rückgabedaten
        $response['status_code_header'] = 'HTTP/1.1 200 OK';
        // Wandle das Ergebnis in eine JSON um
        $response['body'] = json_encode($result);
        return $response;
    }

    protected function unprocessableEntityResponse()
    {
        // Setze Rückgabedaten
        $response['status_code_header'] = 'HTTP/1.1 422 Unprocessable Entity';
        // Wandle das Ergebnis in eine JSON um
        $response['body'] = json_encode([
            'error' => 'Invalid input'
        ]);
        return $response;
    }

    protected function notFoundResponse()
    {
        // Setze Rückgabedaten
        $response['status_code_header'] = 'HTTP/1.1 404 Not Found';
        $response['body'] = null;
        return $response;
    }
}