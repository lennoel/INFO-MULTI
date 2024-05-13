<?php

include("conexBD.php");


function validarDatos($dato)
{
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}


if (isset($_POST['submit_persona'])) {

    $id_persona = validarDatos($_POST['id_persona']);
    $nombre = validarDatos($_POST['nombre']);
    $apellido = validarDatos($_POST['apellido']);


    $sql = "INSERT INTO Persona (ID_Persona, Nombre, Apellido) VALUES ('$id_persona', '$nombre', '$apellido')";
    if (mysqli_query($conex, $sql)) {
        echo "Persona agregada correctamente.";
    } else {
        echo "Error al agregar persona: " . mysqli_error($conex);
    }
}


if (isset($_POST['submit_cuenta'])) {

    $id_cuenta = validarDatos($_POST['id_cuenta']);
    $id_persona = validarDatos($_POST['id_persona']);
    $numero_cuenta = validarDatos($_POST['numero_cuenta']);
    $saldo = validarDatos($_POST['saldo']);


    $sql = "INSERT INTO CuentaBancaria (ID_Cuenta,ID_Persona, NumeroCuenta, Saldo) VALUES ('$id_cuenta','$id_persona', '$numero_cuenta', '$saldo')";
    if (mysqli_query($conex, $sql)) {
        echo "Persona agregada correctamente.";
    } else {
        echo "Error al agregar persona: " . mysqli_error($conex);
    }
}


if (isset($_POST['submit_transaccion'])) {

    $id_transaccion = validarDatos($_POST['id_transaccion']);
    $id_cuenta = validarDatos($_POST['id_cuenta']);
    $tipo = validarDatos($_POST['tipo']);
    $monto = validarDatos($_POST['monto']);
    if (isset($_POST['fecha'])) {
        $fecha = validarDatos($_POST['fecha']);
    } else {

        $fecha = "Valor predeterminado";
    }


    $sql = "INSERT INTO Transaccion (ID_Transaccion,ID_Cuenta, Tipo, Monto,Fecha) VALUES ('$id_transaccion','$id_cuenta', '$tipo', '$monto','$fecha')";
    if (mysqli_query($conex, $sql)) {
        echo "Transacción agregada correctamente.";
    } else {
        echo "Error al agregar transacción: " . mysqli_error($conex);
    }
}


mysqli_close($conex);
