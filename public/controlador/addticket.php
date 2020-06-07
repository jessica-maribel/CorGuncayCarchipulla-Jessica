<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Agregar Nuevo Ticket</title>
</head>
<body>
    <section>

    <?php
    //echo "<p>Hola mundo !!!</p>"; 
    include '../../config/conexionBD.php';
    date_default_timezone_set("America/Guayaquil");
   
    $fec_hor_ing = date('Y-m-d H:i:s', time());
    
    $fec_hor_sal = date('Y-m-d H:i:s', time());
    
    $placa = isset($_POST["placa"]) ? mb_strtoupper(trim($_POST["placa"]), 'UTF-8') : null;  
    $marca = isset($_POST["marca"]) ? mb_strtoupper(trim($_POST["marca"]), 'UTF-8') : null;  
    $modelo = isset($_POST["modelo"]) ? mb_strtoupper(trim($_POST["modelo"]), 'UTF-8') : null;  
    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;

    $sql = "INSERT INTO ticket VALUES (0, '$fec_hor_ing','$fec_hor_sal')";
    
    $res = $conn->query($sql);
    $id_user=mysqli_insert_id($conn);

    //$veh
    if ($res === TRUE) {
        $sqlQ = "INSERT INTO vehiculo VALUES (0, '$placa', '$marca',$modelo)";
        $resS = $conn->query($sqlQ);
        echo "<p>Se agrego  </p>";
   } else {
        if($conn->errno == 1062){
            echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
        }else{
            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
        }
    }

     //cerrar la base de datos
     $conn->close();
     echo "<p>Se agrego  </p>";
     header("Location: ../vista/index.html");
    
    ?>
     </section>
</body>
</html>