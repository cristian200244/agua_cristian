<?php

require_once("conexion.php");

$id = $_GET['id'];

$query  = "DELETE FROM muestras WHERE id = $id";
$result = mysqli_query($con, $query);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Calidad de Agua</title>
</head>

<body>
    <div class="eliminar">

        <?php if ($result) { ?>
            <p> Registro Eliminado </p>
        <?php } else { ?>
            <p>Registro no Eliminado </p>
        <?php } ?>

        <a href="./">Regresar</a>
    </div>
</body>

</html>