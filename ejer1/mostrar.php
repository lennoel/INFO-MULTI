<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Información de Persona</title>
</head>
<body>
    <h1>Mostrar Información de Persona</h1>
    <form method="post">
        <label for="persona_id">Ingrese el ID de la persona:</label>
        <input type="text" id="persona_id" name="persona_id" required>
        <button type="submit" name="submit">Mostrar Información</button>
    </form>

    <?php
    // Incluir el archivo de conexión a la base de datos
    include("conexBD.php");

    // Verificar si se ha enviado el formulario
    if (isset($_POST['submit'])) {
        // Obtener el ID de la persona ingresado por el usuario
        $persona_id = $_POST['persona_id'];

        if ($conex) {
            // Consulta SQL para obtener la información de la persona con el ID especificado
            $consulta = "SELECT Persona.ID_Persona, Persona.Nombre, Persona.Apellido, 
                                CuentaBancaria.ID_Cuenta, CuentaBancaria.NumeroCuenta, CuentaBancaria.Saldo, 
                                Transaccion.ID_Transaccion, Transaccion.Tipo, Transaccion.Monto, Transaccion.Fecha 
                        FROM Persona 
                        INNER JOIN CuentaBancaria ON Persona.ID_Persona = CuentaBancaria.ID_Persona
                        INNER JOIN Transaccion ON CuentaBancaria.ID_Cuenta = Transaccion.ID_Cuenta
                        WHERE Persona.ID_Persona = $persona_id";

            // Ejecutar la consulta
            $resultado = mysqli_query($conex, $consulta);

            // Verificar si la consulta se ejecutó correctamente
            if ($resultado) {
                // Abre la tabla
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

                // Recorrer los resultados
                while ($row = $resultado->fetch_array()) {
                    // Muestra cada fila de la tabla
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
    ?>
</body>
</html>
