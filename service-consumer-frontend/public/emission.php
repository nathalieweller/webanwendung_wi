<?php
// service-consumer-frontend % php -S 127.0.0.1:8080
// PHP Session starten 
session_start();
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Autowebsite - Emmissionen</title>
    <!-- jQuery Bibliothek einbinden -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Eigene JS Datei einlesen -->
    <script src="../src/script/script.js"></script>
    <!-- Bootstrap CSS File einbinden -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- Bootstrap JS File einbinden -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Bootstrap Navigationsleiste -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.php">Autowebsite</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Emmissionsdaten</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <br>
    <!-- Container um Seiteninhalt darzustellen -->
    <div class="container">
        <div class="row">
        <!-- Tablle in Bootstrap Layout -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Typ-Variante-Version</th>
                        <th scope="col">Hersteller Kurzbezeichnung</th>
                        <th scope="col">Verbrauch Innerorts</th>
                        <th scope="col">Verbrauch Außerorts</th>
                        <th scope="col">Verbrauch Kombiniert</th>
                        <th scope="col">NEFZ CO2 Emmissionen Kombiniert</th>
                        <th scope="col">Sehr Schnell</th>
                        <th scope="col">Schnell</th>
                        <th scope="col">Langsam</th>
                        <th scope="col">WLTP CO2 Emmissionen Kombiniert/th>
                    </tr>
                </thead>
                <!-- Tabellenbody mit ID um aus JS darauf zugreifen zu können -->
                <tbody id="emission">
                    <!-- Dynamisch -->
                </tbody>
            </table>
      </div>
    </div>
</body>
<!-- js Funktion am Ende, nachdem ganzes HTML geladen wurde -->
<script>getAllEmissions();</script>
</html>
