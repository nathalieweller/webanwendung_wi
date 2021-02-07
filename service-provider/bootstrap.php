<?php
require 'vendor/autoload.php';
use Dotenv\Dotenv;
use Src\System\DatabaseConnector;

// Erzeuge DB Connection
$dbConnection = (DatabaseConnector::getConnection());