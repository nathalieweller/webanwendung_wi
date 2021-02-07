<?php

namespace Src\TableGateways;

// Interfaceklasse Gateway

interface Gateway
{
    // Setzt Funktionen für Unterklassen fest
    public function __construct($db);

    public function findAll();

    public function find($id);

    public function findBy($params);

}