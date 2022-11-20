<?php

require_once("conexion.php");
require_once("funciones.php");

$query  = "SELECT * FROM muestras";
$result = mysqli_query($con, $query);

// var_dump($result);

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <head>
        <h2>Calidad Del Agua Del Departamento</h2>
        <hr>
    </head>
    <section>
        <article>
            <div class="parrafo">
                <p>
                    En el año 2015, los líderes mundiales adoptaron un conjunto de objetivos globales para erradicar la
                    pobreza, proteger el planeta y asegurar la prosperidad para todos como parte de una nueva agenda de
                    desarrollo sostenible. Cada objetivo tiene metas específicas que deben alcanzarse en los próximos 15
                    años.
                <p> El departamento del Guaviare se ha comprometido con esta causa y por ello ha decidido adoptar estos
                    retos, se lista uno de los principales relacionados con el agua potable:
                    De aquí a 2030, se busca lograr el acceso universal y equitativo al agua potable a un precio
                    asequible para todos.
                    Algunas ONG’s se atribuyeron la tarea de poder diseñar un dispositivo para analizar la calidad del
                    agua de poblaciones apartadas. Para comenzar, requieren que el dispositivo cuente con un lector de
                    la calidad del agua. Después de la lectura, el dispositivo nos entrega el índice de riesgo de la
                    calidad del agua, IRCA, y según este resultado debe indicar el nivel de riesgo.</p>
                </p>

            </div>
            <div class="contenedor">
                <h3>Muetras De Agua</h3>
                <form action="guardar.php" method="post">
                    <label for="">Primera Muestra</label><br>
                    <input type="number" name="muestra1" class="box" value=""><br>
                    <label for="">Segunda Muestra</label><br>
                    <input type="number" name="muestra2" class="box" value=""><br>
                    <label for="">Tercera Muestra</label><br>
                    <input type="number" name="muestra3" class="box" value=""><br>
                    <label for="">Cuarta Muestra</label><br>
                    <input type="number" name="muestra4" class="box" value=""><br>
                    <BR></BR>

                    <input type="submit" value="enviar">

                </form>
            </div>
            <div class="riesgo">
                <table>
                    <colgroup>
                        <col style=" background-color:white">
                        <col style=" background-color:silver">

                    </colgroup>
                    <tr>
                        <th>Clasificación IRCA (%)</th>
                        <th>Nivel De Riesgo</th>

                    </tr>
                    <tr>
                        <td>(80 - 100]</td>
                        <td>Inviable Sanitariamente</td>

                    </tr>
                    <tr>
                        <td>(35 - 80]</td>
                        <td>Alto</td>
                    </tr>
                    <tr>
                        <td>(14 - 35]</td>
                        <td>Medio</td>
                    </tr>
                    <tr>
                        <td>(5 - 14]</td>
                        <td>Bajo</td>
                    </tr>
                    <tr>
                        <td>(0 - 5]</td>
                        <td>Sin Riesgo</td>
                    </tr>
                </table>
            </div>
        </article>
    </section>
    <div class="historial">
        <table>
            <tr>
                <th>Toma #</th>
                <th>Fecha</th>
                <th>Muestra 1</th>
                <th>Muestra 2</th>
                <th>Muestra 3</th>
                <th>Muestra 4</th>
                <th>Nivel Promedio</th>
                <th>Riesgo promedio</th>
                <th colspan="2">Opciones</th>


            </tr>
            <?php
            if (mysqli_num_rows($result) > 0) {
                $pos        = 1;
                $promedio   = 0;
                $etiquetas  = [];
                $datos      = [];

                while ($data = mysqli_fetch_assoc($result)) {
                    // var_dump($data);
                    // die();
                    $serie = [$data['muestra1'], $data['muestra2'], $data['muestra3'], $data['muestra4']];
                    $promedio = array_sum($serie) / count($serie);
                    $nivel_promedio  = nivel($promedio);
                    $fecha_muestra = date_format(date_create($data['fecha_muestra']), 'd-m-Y');
            ?>
                    <tr>
                        <td><?php echo $pos;?></td>
                        <td><?php echo $fecha_muestra;?></td>
                        <td><?php echo $data['muestra1'];?></td>
                        <td><?php echo $data['muestra2'];?></td>
                        <td><?php echo $data['muestra3'];?></td>
                        <td><?php echo $data['muestra4'];?></td>
                        <td><?php echo $promedio; ?></td>
                        <td><?php echo $nivel_promedio; ?></td>

                        <td><a href="editar.php?id=<?php echo $data['id']; ?>"  >Editar</a></td>
                        <td><a href="eliminar.php?id=<?php echo $data['id']; ?>" >Eliminar</a></td>
                    </tr>
                <?php $pos++;
                }
            } else { ?>
                <tr>
                    <td colspan="9">No hay datos</td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>

</html>