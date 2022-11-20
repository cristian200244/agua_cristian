<?php
$hostname   = "localhost";
$user       = "root";
$password   = null;
$database   = "calidad_de_agua";

try {
    $con = mysqli_connect($hostname, $user, $password, $database);
} catch (\Throwable $th) {
    print $e->getMessage();
}
