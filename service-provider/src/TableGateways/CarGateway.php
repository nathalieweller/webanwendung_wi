<?php

namespace Src\TableGateways;

class CarGateway implements Gateway
{
    private $db = null;

    // Konstruktor
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Ermittelt alle Autos
    public function findAll()
    {
        // Erzeugt ein leeres Array
        $return_array = array();
        // Geht alle Daten in der Datenbank durch und schreibt diese in das Array rein
        // Wird gemacht, damit man alle Daten aufeinmal zurückgeben kann
        foreach ($this->db->cars->Auto as $item) {
            array_push($return_array, $item);
        }
        // Gibt das Array mit den enthaltenen Daten zurück
        return $return_array;
    }

    // Ermittelt ein Auto anhand einer ID
    public function find($id)
    {
        // Gehe alle Daten in der Datenbank durch
        foreach ($this->db->cars->Auto as $item) {
            // Prüfe jedes Element der Datenbank auf Übereinstimmung mit der ID
            if ($item->Zulassungsbescheinigung->TypVarianteVersion == $id) {
                // Wenn die ID mit der TypVarianteVersion übereinstimmt, wird sie für das Auto zurückgegeben
                return $item;
            }
        }
        // Falls kein Auto gefunden wird, erscheint eine Fehlermeldung
        return "No data found for item value ".$id;
    }

    // Identifiziere ein Auto anhand eines Parameters mit einem Wert
    public function identify($param, $value) {
        // Erzeugt ein leeres Array
        $return_array = array();
        // Geht alle Daten in der Datenbank durch und schreibt diese in das Array rein
        // Wird gemacht, damit man alle Daten aufeinmal zurückgeben kann
        foreach ($this->db->cars->Auto as $item) {
            // Prüft ob z.B. die Marke als Parameter identisch mit der value ist
            if ($item->Zulassungsbescheinigung->$param == $value) {
                // Falls der Parameter und das value übereinstimmten, wird dies in das Array geschrieben
                // Es können auch mehrere Übereinstimmungen in das Array geschrieben werden
                array_push($return_array, $item);
            }
        }
        // Wenn zu einem Suchwert kein passendes Auto gefunden wird, sollen alle Autos ausgegeben werden.
        if (empty($return_array))
        {
            return $this->findAll();
        }
        // Gibt alle Werte zurück
        return $return_array;
    }

    // Finde Autos nach bestimmten Parametern
    public function findBy($params) {
        // Bereitet die URL bzw. die Parameter auf
        $p = explode("=", $params);

        $param = $p[0];
        $value = $p[1];
        // Erzeugt ein leeres Array
        $return_array = array();
        // Ruft die Funktion identify auf
        array_push($return_array, $this->identify($param, $value));
        // Gibt das Array zurück
        return $return_array[0];
    }
}