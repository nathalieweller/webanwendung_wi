<?php

namespace Src\TableGateways;

class EmissionGateway implements Gateway
{
    private $db = null;

    // Konstruktor
    public function __construct($db)
    {
        $this->db = $db;
    }

    // Ermittelt alle Emissionsdaten
    public function findAll()
    {
        // Erzeugt ein leeres Array
        $return_array = array();
        // Geht alle Daten in der Datenbank durch und schreibt diese in das Array rein
        // Wird gemacht, damit man alle Daten aufeinmal zurückgeben kann
        foreach ($this->db->emissionData->Emmissionsdaten as $item) {
            array_push($return_array, $item);
        }
        // Gibt das Array mit den enthaltenen Daten zurück
        return $return_array;
    }

    // Ermittelt Emissionsdaten anhand einer ID
    public function find($id)
    {
        // Gehe alle Daten in der Datenbank durch
        foreach ($this->db->emissionData->Emmissionsdaten as $item) {
            // Prüfe jedes Element der Datenbank auf Übereinstimmung mit der ID
            if ($item->TypVarianteVersion == $id) {
                // Wenn die ID mit der TypVarianteVersion übereinstimmt, wird sie für die emissionData zurückgegeben
                return $item;
            }
        }
        // Falls keine emissionData gefunden wird, erscheint eine Fehlermeldung
        return "No data found for item value ".$id;
    }

    // Identifiziere die Emissionsdaten anhand eines Parameters mit einem Wert
    public function identify($param, $value) {
        // Erzeugt ein leeres Array
        $return_array = array();
        // Geht alle Daten in der Datenbank durch und schreibt diese in das Array rein
        // Wird gemacht, damit man alle Daten aufeinmal zurückgeben kann
        foreach ($this->db->missionData->Emmissionsdaten as $item) {
            // Prüft ob z.B. die Marke als Parameter identisch mit der value ist
            if ($item->Zulassungsbescheinigung->$param == $value) {
                // Falls der Parameter und das value übereinstimmten, wird dies in das Array geschrieben
                // Es können auch mehere Übereinstimmungen in das Array geschrieben werden
                array_push($return_array, $item);
            }
        }
        // Gibt alle Werte zurück
        return $return_array;
    }

    // Finde Emissionsdaten nach bestimmten Parametern
    public function findBy($params) {
        // Bereitet die URL bzw. die Parameter auf
        $p = explode("=", $params);

        $param = $p[0];
        $value = $p[1];
        // Erzeugt ein leeres Array
        $return_array = array();
        //  Ruft die Funktion identify auf
        array_push($return_array, $this->identify($param, $value));
        // Gibt das Array zurück
        return $return_array[0];
    }
}