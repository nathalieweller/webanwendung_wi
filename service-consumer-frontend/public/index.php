<?php
// service-consumer-frontend % php -S 127.0.0.1:8080
// PHP Session starten 
session_start();
// PHP-Array zur Iteration mit allen verfügbaren Marken erstellen
$brands = array(
  "RENAULT",
  "VW",
  "Opel",
  "Skoda",
  "Seat",
  "Audi",
  "LAMBO",
  "Porsche"
)
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <title>Autowebsite</title>
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
    <!-- Zeilenumbruch -->
    <br>
    <!-- Container um Seiteninhalt darzustellen -->
    <div class="container">
    <!-- Bootstrap "Zeile" -->
      <div class="row">
      <!-- Bootstrap "Spalte" -->
        <div class="col-sm-3 mt-n1">
        <!-- Formular für parametrisierte Suche -->
          <form id="par">
            <div class="form-group">
            <!-- Label für Input-Dropdown -->
              <label for="Marke">Automarke</label>
              <!-- Dropdown -->
              <select class="form-control" id="Marke" name="Marke">
              <!-- Iterative Erstellung von Automarken im Dropdown -->
              <?php foreach($brands as $key=>$brand): ?>
                <option><?= $brand?></option>
              <?php endforeach; ?>
              </select>
            </div>
            <br>
            <!-- Formular Ende -->
          </form>
            <!-- Button außerhalb vom Formular, da Seiteninhalt nicht extra neu geladen werden soll 
            -> dynamische Gestaltung der Website -->
            <button type="submit" class="btn btn-primary" onclick="getBy()">Suchen</button>
            <br/>
        </div>
        <!-- Spalte um Auto's darzustellen -->
        <div class="col-sm-9">
        <!-- Zeile mit id um aus JS darauf zuzugreifen -->
          <div class="row" id="car-container"></div>
        </div>
      </div>
    </div>
</body>
<!-- Funktion getAllCars() am Ende aufrufen, nachdem die Seite komplett geladen wurde -->
<script>getAllCars();</script>
</html>