<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Nuevo Ticket</title>
</head>
<body>
    <section>

    <?php
    //echo "<p>Hola mundo !!!</p>"; 
    include '../../config/conexionBD.php';
    $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
    $placa = isset($_POST["placa"]) ? mb_strtoupper(trim($_POST["placa"]), 'UTF-8') : null;  
    $marca = isset($_POST["marca"]) ? mb_strtoupper(trim($_POST["marca"]), 'UTF-8') : null;  
    $modelo = isset($_POST["modelo"]) ? mb_strtoupper(trim($_POST["modelo"]), 'UTF-8') : null;  
    
    $fecha_ing = isset($_POST["fec_ing"]) ? trim($_POST["fec_ing"]): null;
    $hora_ing = isset($_POST["hor_ing"]) ? trim($_POST["hor_ing"]): null;
    $fecha_sal = isset($_POST["fec_sal"]) ? trim($_POST["fec_sal"]): null;
    $hora_sal = isset($_POST["hor_sal"]) ? trim($_POST["hor_sal"]): null;
    $sqlC = "SELECT cli_cod FROM cliente WHERE cli_cedula LIKE '$cedula';";

    $resC = $conn->query($sqlC);

    $conn->autocommit(FALSE);

    if ($resC) {
        
        if ($resC->num_rows > 0) {
            $rowCl = $resC->fetch_assoc();

            $sqlVeh = "INSERT INTO vehiculo VALUES (0, '$placa', '$marca', '$modelo', '". $rowCl['cli_cod'] ."');";

            if ($conn->query($sqlVeh) === TRUE) {

                $sqlV = "SELECT veh_cod FROM vehiculo WHERE veh_placa LIKE '$placa';";
                $resV= $conn->query($sqlV);
                
                if ($resV) {
                    
                    if ($resV->num_rows > 0) {
                        $rowVeh = $resV->fetch_assoc();

                        $sqlTic= "INSERT INTO ticket VALUES (0, '$fecha_ing', '$hora_ing', '$fecha_sal', '$hora_sal', '". $rowVeh['veh_cod'] ."');";

                        if ($conn->query($sqlTic) === TRUE) {
                            echo "<p class='e_notice e_notice_sucess'>Se ha creado el ticket correctamente.</p>";
                            $conn->commit();
                        } else {
                            echo "<p class='e_notice e_notice_error'>Error: ". mysqli_error($conn) ."</p>";
                            $conn->rollback();
                        }
                        
                    } else {
                        echo "<p class='e_notice e_notice_error'>Error: ". mysqli_error($conn) ."</p>";
                        $conn->rollback();
                    }

                } else {
                    echo "<p class='e_notice e_notice_error'>Error: ". mysqli_error($conn) ."</p>";
                    $conn->rollback();
                }
                
            } else {
                echo "<p class='e_notice e_notice_error'>Error: ". mysqli_error($conn) ."</p>";
                $conn->rollback();
            }
            
        } else {
            echo "<p class='e_notice e_notice_error'>Error: ". mysqli_error($conn) ."</p>";
            $conn->rollback();
        }
        
    } else {
        echo "<p class='e_notice e_notice_error'>Error: ". mysqli_error($conn) ."</p>";
        $conn->rollback();
    }
    $conn->close();
    //echo "<a href='../vista/addAutor.html'>Regresar</a>";
    header("Location: ../vista/addTicket.html");

?>