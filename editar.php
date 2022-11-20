<?php 
include_once('conexion.php');
$id = $_GET['id'];

$query  = "SELECT * FROM muestras WHERE id = $id";
$result = mysqli_query($con, $query);
$data   = mysqli_fetch_assoc($result);

//Formatea la fecha cargada desde BD
$fecha_muestra = date_format(date_create($data['fecha_muestra']), 'Y-m-d');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Calidad de agua</title>
</head>
<body>
    <h2 >Calidad Del Agua Del Departamento</h2>
    <h3>Ingrese los datos actualizados de las muestras</h3>
    <form action="guardar.php" method="POST" autocomplete="off">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <fieldset disabled>
                <label for="fecha" class="fecha">Fecha Muestra</label>
                <input type="date" class="form-control" name="fecha" id="fecha" value="<?php echo $fecha_muestra; ?>" required>
        </fieldset>
        
            <label for="muestra1" >Primera Muestra</label>
            <input type="number" class="form-control" name="muestra1" id="muestra1" value="<?php echo $data['muestra1']; ?>" required>
            <br>
            <label for="muestra2" >Segunda Muestra</label>
            <input type="number" class="form-control" name="muestra2" id="muestra2" value="<?php echo $data['muestra2']; ?>" required>
            <br>
            <label for="muestra3" >Tercera Muestra</label>
            <input type="number" class="form-control" name="muestra3" id="muestra3" value="<?php echo $data['muestra3']; ?>" required>
            <br>
            <label for="muestra4" >Cuarta Muestra</label>
            <input type="number" class="form-control" name="muestra4" id="muestra4" value="<?php echo $data['muestra4']; ?>" required>
            <br>
            <button type="submit" class="btn btn-sm btn-outline-warning">Actualizar</button>
            <input type="button" value="regresar" onclick="location.href='index.php'">
           
        </div>
    </form>
</body>
</html>