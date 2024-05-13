<?php

include("conexBD.php");


if (!function_exists('validarDatos')) {
    function validarDatos($dato)
    {
        $dato = trim($dato);
        $dato = stripslashes($dato);
        $dato = htmlspecialchars($dato);
        return $dato;
    }
}


if (isset($_POST['submit_eliminar_persona'])) {

    $id_persona_eliminar = validarDatos($_POST['id_persona_eliminar']);


    $sql_eliminar_transacciones = "DELETE FROM Transaccion 
               WHERE ID_Cuenta IN (SELECT ID_Cuenta FROM CuentaBancaria WHERE ID_Persona = '$id_persona_eliminar')";


    $sql_eliminar_cuentas = "DELETE FROM CuentaBancaria WHERE ID_Persona = '$id_persona_eliminar'";

    $sql_eliminar_persona = "DELETE FROM Persona WHERE ID_Persona = '$id_persona_eliminar'";


    mysqli_begin_transaction($conex);


    if (mysqli_query($conex, $sql_eliminar_transacciones)) {

        if (mysqli_query($conex, $sql_eliminar_cuentas)) {

            if (mysqli_query($conex, $sql_eliminar_persona)) {

                mysqli_commit($conex);
                echo "Persona y sus datos asociados eliminados correctamente.";
            } else {

                mysqli_rollback($conex);
                echo "Error al eliminar persona: " . mysqli_error($conex);
            }
        } else {

            mysqli_rollback($conex);
            echo "Error al eliminar cuentas bancarias: " . mysqli_error($conex);
        }
    } else {

        mysqli_rollback($conex);
        echo "Error al eliminar transacciones: " . mysqli_error($conex);
    }
}


mysqli_close($conex);
?>