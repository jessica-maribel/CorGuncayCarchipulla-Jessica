<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Libros</title>
    <link href="CSS/listar.css" type="text/css"  rel="stylesheet" />
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
    $sql = "SELECT * FROM ticket";
    $result = $conn->query($sql);
   
    if ($result->num_rows > 0) {
       while($row = $result->fetch_assoc()) {
           echo "<section>";
           echo "<h2>Listado de Tickets <h2>";
           echo "<p>".$row["tik_fec_hor_ing"]."<p>";
           echo "<p>".$row["tik_fec_hor_sal"]."<p>";
           $veh_cod=array_values(mysqli_fetch_array( $conn->query($sql)))[0];
            $sqlV = "SELECT * FROM vehiculo WHERE veh_cod='$veh_cod'";
            $resultC = $conn->query($sqlV);
            if ($resultC->num_rows > 0) {
                echo "<table>";
                echo "<tr>
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                </tr>";
                while($rowC = $resultC->fetch_assoc()) {
                    $sqlC = "SELECT cli_cod FROM cliente WHERE veh_cli_cod='$veh_cod'";
                    $resultA = $conn->query($sqlc);
                    $rowA = $resultA->fetch_assoc();
                    echo "<tr>";
                    echo " <td>" . $rowC['cedula'] . "</td>";
                    echo "</tr>";
                }
                echo "</table>";
            }


           echo "</section>";
          }
       }
    $conn->close(); 
     ?>
</body>
</html>