<?php
include_once('conexion.php');
include_once('funciones.php');

$muestra1 = $_POST['muestra1'];
$muestra2 = $_POST['muestra2'];
$muestra3 = $_POST['muestra3'];
$muestra4 = $_POST['muestra4'];
    
//isset comprueba si la  varibale esta definida
if (!isset($_POST['id'])) {
    $query = "INSERT INTO muestras(muestra1, muestra2, muestra3, muestra4) VALUES($muestra1, $muestra2, $muestra3, $muestra4)";
} else {
    $query = "UPDATE muestras SET muestra1 = {$muestra1}, muestra2 = {$muestra2}, muestra3 = {$muestra3}, muestra4 = {$muestra4} WHERE id = {$_POST['id']}";
}

$result = mysqli_query($con, $query) or die(mysqli_error($con));

$serie = array($muestra1, $muestra2, $muestra3, $muestra4);

$promedio = array_sum($serie) / count($serie);
$maximo = max($serie);
$minimo = min($serie);

$nivelPromedio = nivel($promedio);
$nivelMaximo = nivel($maximo);
$nivelMinimo = nivel($minimo);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    echo  "el promedio del nivel de la calidad del agua es: " . $promedio . " con clasificacion de: " . $nivelPromedio . "<br>";
    echo  "el promedio del nivel de riesgo de calidad mas alta: " . $maximo . " con clasificacion de: " . $nivelMaximo . "<br>";
    echo  "el promedio del nivel de riesgo de calidad mas baja: " . $minimo . " con clasificacion de; " . $nivelMinimo . "<br>";
    ?>
    <br>
    <input type="button" value="regresar" onclick="location.href='index.php'">
</body>

</html>