<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="CSS/ticket.css" type="text/css"  rel="stylesheet" />
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
    <hr>
       <br>
    
       <form id="formulario01" method="POST" action="../controlador/addTicket.php">

<label for="cedula">Bucar Cedula (*)</label>
<br>
<input type="text" id="cedula" name="cedula" value="" onkeyup="return validarCedula(this)"  placeholder="Ingrese el número de cedula ..."/>
<span id="mensajeCedula" class="error"></span>

<br>

<label for="fec_hor_ing">Fecha y hora de ingreso (*)</label>
<br>
<input type="datetime" id="fec_hor_ing" name="fec_hor_ing" value="<?php echo date('Y-m-d\TH-i');?>" />
<span id="" class="error"></span>
<br>



<label for="fec_hor_sal">Fecha y hora de salida (*)</label>
<br>
<input type="datetime" id="fec_hor_sal" name="fec_hor_sal" value="<?php echo date('Y-m-d\TH-i');?>" />
<span id="" class="error"></span>
<br>


<label for="placa">Placa del Vehiculo (*)</label>
<br>
<input type="text" id="placa" name="placa" value="" placeholder="Ingrese la placa del Vehiculo ..." />

<br>

<label for="marca">Marca del Vehiculo (*)</label>
<br>
<input type="text" id="marca" name="marca"  value="" placeholder="Ingrese el marca del Vehiculo..." />

<br> 

<label for="modelo">Modelo del Vehiculo (*)</label>
<br>
<input type="text" id="modelo"  name="modelo" value="" placeholder="Ingrese el modelo del Vehiculo..." />

<br>

<button type="submit" id="crear" name="crear" onclick="botonSubmit()" value="Aceptar">Aceptar </button>
<button type="reset" id="cancelar" name="cancelar" value="Cancelar">Cancelar </button>
<!--<input type="submit" id="crear" name="crear" value="Aceptar" />
<input type="reset" id="cancelar" name="cancelar" value="Cancelar" />-->
</form>
</body>
</html>