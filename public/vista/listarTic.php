<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Libros</title>
    <link href="../vista/CSS/tabla.css" type="text/css"  rel="stylesheet" />
</head>
<body>
<header>
        <div class="principal">
            <a href="index.html"><img id="prin" src="Imagenes/icono.png"/></a>
            <h1>Bienvenido .. !</h1>
        </div>
       
        <div class="opciones">
            <a href="addTicket.html"><img id="men" src="Imagenes/agregar.jpg" alt = ""/></a>
            <a href="listarTic.php"><img id="men2" src="Imagenes/listar.png" /></a>
        </div>
        
    </header>
    
    <?php
    include '../../config/conexionBD.php';
    $sql = $sql = "SELECT c.cli_cedula,c.cli_nombre,c.cli_apellido, c.cli_direccion,c.cli_telefono,
    t.tic_cod, t.tic_fec_ing, t.tic_hor_ing, t.tic_fec_sal,t.tic_hor_sal, v.veh_placa, v.veh_marca, v.veh_modelo 
    FROM cliente c,ticket t, vehiculo v 
    WHERE c.cli_cod = v.veh_cli_cod and v.veh_cli_cod = t.tic_veh_cod ";
    $result = $conn->query($sql);

    if ($result ) {
        if ($result ->num_rows > 0) {
            
            while ($rowUs = $result->fetch_assoc()) {
                
                echo "<table>";
                echo "<tr>";
                echo "<th class='th_v'>Número de Ticket:</th>";
                echo " <td >" . $rowUs["tic_cod"] . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th class='th_v'>Fecha/Hora de Ingreso:</th>";
                echo " <td >". $rowUs["tic_fec_ing"] ." ". $rowUs["tic_hor_ing"] ."</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th class='th_v'>Fecha/Hora de Salida:</th>";
                echo " <td >". $rowUs["tic_fec_sal"] ." ". $rowUs["tic_hor_sal"] ."</td>";
                echo "</tr>";


                echo "<tr>
                        <th colspan='2'>Información acerca del Vehículo.</th>
                    </tr>";

                echo "<tr>";
                echo "<th class='th_v'>Placa:</th>";
                echo " <td >" . $rowUs["veh_placa"] . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th class='th_v'>Marca:</th>";
                echo " <td >" . $rowUs['veh_marca'] ."</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th class='th_v'>Modelo:</th>";
                echo " <td >" . $rowUs['veh_modelo'] . "</td>";
                echo "</tr>";
                

                echo "<tr>
                        <th colspan='2'>Información acerca del Cliente.</th>
                    </tr>";

                echo "<tr>";
                echo "<th class='th_v'>Cédula:</th>";
                echo " <td >" . $rowUs["cli_cedula"] . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th class='th_v'>Nombres:</th>";
                echo " <td >" . $rowUs['cli_nombre'] ."</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<th class='th_v'>Nombres:</th>";
                echo " <td >" . $rowUs['cli_apellido'] ."</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th class='th_v'>Dirección:</th>";
                echo " <td >" . $rowUs['cli_direccion'] . "</td>";
                echo "</tr>";

                echo "<tr>";
                echo "<th class='th_v'>Teléfono:</th>";
                echo " <td >" . $rowUs['cli_telefono'] . "</td>";
                echo "</tr>";
                echo "<tr>";

                echo "<hr>";
                echo "<h2>Informacion Ticket</h2>";
                echo "<hr>";
            }
        
        } else {
            echo "<tr>";
            echo "<td colspan='1'> No existen tickets con ese cliente y vehiculo.</td>";
        }

    } else {
        echo " <tr><td colspan='1'>Error: " . mysqli_error($conn) . "</td></tr>";
        echo "</tr>";
    }
    $conn->close(); 
     ?>
</body>
</html>