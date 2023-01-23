<?php



// session_start();
// ob_start();
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


// $link = mysqli_connect("azzyremysql.mysql.database.azure.com", "azzuremysql", "ll010203;", "encryptim");
// if ($link === false) {
// die("ERROR: Could not connect. " . mysqli_connect_error());
// }
$link = mysqli_connect("localhost", "root", "", "encryptim");
if ($link === false) {
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
