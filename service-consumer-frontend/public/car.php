<?php
// PHP Session starten 
  session_start();
// Frage den Parameter id aus der URL ab und setze ihn in die Session
  $_SESSION["id"] = $_GET["id"];
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Autowebsite - Detailansicht Auto</title>
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
                <a class="nav-link" href="emission.php">Emissionsdaten</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <br>
    <!-- Bootstrap Zeile -->
    <div class="row">
    <!-- 3 Spalten um richtiges Layout zu gewährleisten -->
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <!-- Textfelder um Website dynamisch zu befüllen -->
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="tvv" value="" name="TypVarianteVersion">
          <label for="tvv">TypVarianteVersion</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="erstzulassung" value="" name="DatumDerErstzulassung">
          <label for="erstzulassung">Erstzulassung</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="hschluessel" value="" name="Herstellerschluesselnummer">
          <label for="hschluessel">Herstellerschlüsselnummer</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="typschluessel" value="" name="Typschluesselnummer">
          <label for="typschluessel">Typschlüsselnummer</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="fahrzeugklasse" value="" name="Fahrzeugklasse">
          <label for="fahrzeugklasse">Fahrzeugklasse</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="aufbau" value="" name="ArtdesAufbaus">
          <label for="aufbau">ArtdesAufbaus</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="marke" value="" name="Marke">
          <label for="marke">Marke</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="hersteller" value="" name="HerstellerKurzbezeichnung">
          <label for="hersteller">Hersteller-Kurzbezeichnung</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="bezeichnung" value="" name="BezeichnungFahrzuegklasseAufbau">
          <label for="hersteller">Bezeichnung-Fahrzuegklasse-Aufbau</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="schadstoffklasse" value="" name="Schadstoffklasse">
          <label for="schadstoffklasse">Schadstoffklasse</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="emissionsklasse" value="" name="Emissionsklasse">
          <label for="emissionsklasse">Emissionsklasse</label>
        </div>
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="kraftstoffart" value="" name="KraftstoffartEnergiequelle">
          <label for="kraftstoffart">Kraftstoffart-Energiequelle</label>
        </div>
      </div>
        <div class="col-md-3"></div>
    </div>
</body>
<!-- js Funktion am Ende nachdem ganzes HTML geladen wurde -->
<script>loadCar();</script>
</html>