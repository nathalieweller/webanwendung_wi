<?php 
// PHP Session starten 
session_start();
// Frage den Parameter id aus der URL ab und setze ihn in die Session
$_SESSION['id'] = $_GET['id'];
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Autowebsite - Emmissionen - Detailansicht</title>
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
                <a class="nav-link" href="emission.php">Emmissionsdaten</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <br>
    <!-- Bootstrap Container -->
    <div class="container">
    <!-- Bootstrap Zeile -->
    <div class="row">
    <!-- Bootstrap Unterteilung in 3 Spalten -->
      <div class="col-md-3"></div>
      <div class="col-md-6">
          <h1>Emmissionsdaten </h1>
          <!-- Setze Überschrift anhand der ID in $_SESSION -->
          <h1>Typ: <?= $_SESSION['id']; ?></h1>
            <h3>NEFZ</h3>
            <!-- Textfelder um Website dynamisch zu befüllen -->
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="vi" value="" name="vi">
              <label for="id">Verbrauch Innerorts</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="va" value="" name="va">
              <label for="va">Verbrauch Außerorts</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="vk" value="" name="vk">
              <label for="vk">Verbrauch Kombiniert</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="nefz_co" value="" name="nefz_co">
              <label for="nefz_co">CO2 Emmissionen Kombiniert</label>
            </div>
            <h3>WLTP</h3>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="sehrschnell" value="" name="sehrschnell">
              <label for="sehrschnell">Sehr Schnell</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="schnell" value="" name="schnell">
              <label for="schnell">Schnell</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="langsam" value="" name="langsam">
              <label for="langsam">Langsam</label>
            </div>
            <div class="form-floating mb-3">
              <input type="text" class="form-control" id="wltp_co" value="" name="wltp_co">
              <label for="wltp_cp">CO2 Emmissionen Kombiniert</label>
            </div>    
          </div>
          <!-- Nochmal eine Spalte um richtiges Layout zu gewährleisten -->
        <div class="col-md-3"></div>
    </div>
    </div>
</body>
<!-- js Funktion am Ende nachdem ganzes HTML geladen wurde -->
<script>getEmission();</script>
</html>
