<?php

include("conexBD.php");
if (isset($_POST['submit'])) {

    $persona_id = $_POST['persona_id'];

    if ($conex) {

        $consulta = "SELECT Persona.ID_Persona, Persona.Nombre, Persona.Apellido, 
                                CuentaBancaria.ID_Cuenta, CuentaBancaria.NumeroCuenta, CuentaBancaria.Saldo, 
                                Transaccion.ID_Transaccion, Transaccion.Tipo, Transaccion.Monto, Transaccion.Fecha 
                        FROM Persona 
                        INNER JOIN CuentaBancaria ON Persona.ID_Persona = CuentaBancaria.ID_Persona
                        INNER JOIN Transaccion ON CuentaBancaria.ID_Cuenta = Transaccion.ID_Cuenta
                        WHERE Persona.ID_Persona = $persona_id";


        $resultado = mysqli_query($conex, $consulta);


        if ($resultado) {

            echo '<div class="text-center mb-4" ><table style="font-size: 18px;" class="table table-striped">';
            echo '<tr >
                        <th>ID Persona</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>ID Cuenta</th>
                        <th>Número de Cuenta</th>
                        <th>Saldo</th>
                        <th>ID Transacción</th>
                        <th>Tipo</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                      </tr>';


            while ($row = $resultado->fetch_array()) {

                echo "<tr>
                            <td>{$row['ID_Persona']}</td>
                            <td>{$row['Nombre']}</td>
                            <td>{$row['Apellido']}</td>
                            <td>{$row['ID_Cuenta']}</td>
                            <td>{$row['NumeroCuenta']}</td>
                            <td>{$row['Saldo']}</td>
                            <td>{$row['ID_Transaccion']}</td>
                            <td>{$row['Tipo']}</td>
                            <td>{$row['Monto']}</td>
                            <td>{$row['Fecha']}</td>
                          </tr>";
            }

            // Cierra la tabla
            echo '</table></div>';
        } else {
            echo "Error en la consulta: " . mysqli_error($conex);
        }
    } else {
        echo "Error en la conexión a la base de datos.";
    }
}
