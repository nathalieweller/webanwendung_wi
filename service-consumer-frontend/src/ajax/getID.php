<?php 

/* PHP Datei um das Problem der Kommunikation zwischen 
JS und PHP zu lösen. JS kann nicht direkt die ID aus
dem Speicher des Servers laden, daher frägt JS mit
Hilfe von Ajax die ID am Server an. */

// Session wird gestartet
session_start();
// Rückgabe der ID
echo $_SESSION["id"];