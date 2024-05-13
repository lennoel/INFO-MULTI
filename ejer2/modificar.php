<?php
include("conexBD.php");


if (isset($_POST['submit_modificar_persona'])) {

    $id_persona_modificar = $_POST['id_persona_modificar'];

    $nombre_modificar = $_POST['nombre_modificar'];

    $apellido_modificar = $_POST['apellido_modificar'];


    $sql_modificar_persona = "UPDATE Persona SET Nombre = '$nombre_modificar', Apellido = '$apellido_modificar' WHERE ID_Persona = '$id_persona_modificar'";


    if (mysqli_query($conex, $sql_modificar_persona)) {
        echo "Persona modificada correctamente.";
    } else {
        echo "Error al modificar persona: " . mysqli_error($conex);
    }
}
if (isset($_POST['submit_modificar_cuenta'])) {
   
    $id_cuenta_modificar = $_POST['id_cuenta_modificar'];
    
    $numero_cuenta_modificar = $_POST['numero_cuenta_modificar'];
   
    $saldo_modificar = $_POST['saldo_modificar'];

    $sql_modificar_cuenta = "UPDATE CuentaBancaria SET NumeroCuenta = '$numero_cuenta_modificar', Saldo = '$saldo_modificar' WHERE ID_Cuenta = '$id_cuenta_modificar'";

  
    if (mysqli_query($conex, $sql_modificar_cuenta)) {
        echo "Cuenta bancaria modificada correctamente.";
    } else {
        echo "Error al modificar cuenta bancaria: " . mysqli_error($conex);
    }

    
}
if (isset($_POST['submit_modificar_transaccion'])) {
    
    $id_transaccion_modificar = $_POST['id_transaccion_modificar'];
    
    $tipo_modificar = $_POST['tipo_modificar'];
   
    $monto_modificar = $_POST['monto_modificar'];
   
    $fecha_modificar = $_POST['fecha_modificar'];

    $sql_modificar_transaccion = "UPDATE Transaccion SET Tipo = '$tipo_modificar', Monto = '$monto_modificar', Fecha = '$fecha_modificar' WHERE ID_Transaccion = '$id_transaccion_modificar'";

   
    if (mysqli_query($conex, $sql_modificar_transaccion)) {
        echo "Transacción modificada correctamente.";
    } else {
        echo "Error al modificar transacción: " . mysqli_error($conex);
    }
}
