<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Cliente</title>
    <link href="../vista/CSS/tabla.css" type="text/css"  rel="stylesheet"/>
</head>
<body>


<?php
 //incluir conexión a la base de datos
 include '../../config/conexionBD.php';
 $cedula = $_GET['cedula'];
 //echo "Hola " . $cedula;

 $sql = "SELECT * FROM cliente WHERE  cli_cedula='$cedula'";
//cambiar la consulta para puede buscar por ocurrencias de letras
 $result = $conn->query($sql);
 echo " <table style='width:60%'>
 <tr>
 <th>Cedula </th>
 <th>Nombres  </th>
 <th>Apellidos </th>
 <th>Direccion </th>
 <th>Telefono </th>
 </tr>";
 if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

    echo "<tr>";
    echo " <td>" . $row['cli_cedula'] . "</td>";
    echo " <td>" . $row['cli_nombre'] ."</td>";
    echo " <td>" . $row['cli_apellido'] . "</td>";
    echo " <td>" . $row['cli_direccion'] ."</td>";
    echo " <td>" . $row['cli_telefono'] . "</td>";
    echo "</tr>";
    }
 } else {
    echo "<tr>";
    echo " <td colspan='7'> No existe el Autor</td>";
    echo "</tr>";
 }
 echo "</table>";
 $conn->close();

?>

</body>
</html>