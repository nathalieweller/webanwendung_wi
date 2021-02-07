<?php

namespace Src\System;

class DatabaseConnector
{

    public $cars;
    public $emissionData;

    // Konstruktor
    public function __construct()
    {
        // Prüfe ob Datei vorhanden
        if (file_exists('../src/Database/car.xml')) {
            // Erstelle cars Variable aus XML Datei
            $this->cars = simplexml_load_file('../src/Database/car.xml');
        } else {
            exit("Could not load cars.xml");
        }
        // Prüfe ob Datei vorhanden
        if (file_exists('../src/Database/emission-data.xml')) {
            // Erstelle emissionData Variable aus XML Datei
            $this->emissionData = simplexml_load_file('../src/Database/emission-data.xml');
        } else {
            exit("Could not load emission-data.xml");
        }
    }

    // Statische Funktion um DB Verbindung herzustellen
    public static function getConnection()
    {
        return new DatabaseConnector();
    }
}