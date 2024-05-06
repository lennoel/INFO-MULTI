<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,700,900" rel="stylesheet">
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #86f0a4;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: #35a564;
		font-weight: normal;
		text-decoration: none;
	}

	a:hover {
		color: #97310e;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-weight: normal;
		margin: 0 0 30px 0;
		padding: 20px 20px 20px 20px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
		min-height: 96px;
		
	}

	p {
		margin: 0 0 10px;
		padding:0;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
    background-color: #35a564;
    margin: 10px;
    border: 1px solid #444;
    box-shadow: 0 0 8px #444;
}

#container2 {
    background-color: #35a564;
    border: 1px solid #444;
    box-shadow: 0 0 8px #444;
    width: 14%; /* Utiliza el 20% del ancho de la ventana del navegador */
    height: 400px;
    float: left;
}

#container3 {
    margin-left: 10px;
    background-color: #35a564;
    border: 1px solid #444;
    box-shadow: 0 0 8px #444;
    width: 84%; /* Utiliza el 80% del ancho de la ventana del navegador */
    height: 400px;
    float: left;
}
table {
  border-collapse: collapse;
  border: 2px solid #444;
  font-family: sans-serif;
  font-size: 0.8rem;
  letter-spacing: 1px;
}

thead,
tfoot {
  background-color: rgb(1 1 245);
}
th{
	border: 1px solid #444;
  padding: 8px 10px;

}
td {
	
	border: 1px solid #444;
  padding: 8px 10px;
}

td:last-of-type {
  text-align: center;
}

tbody > tr:nth-of-type(even) {
  background-color: rgb(237 238 242);
}
tbody > tr:nth-of-type(odd) {
	background-color: #86c0a4;
}


tfoot td {
  font-weight: bold;
}

	</style>
</head>
<body>

<div id="container">
	
	<div id="body">
	<a class="navbar-brand p-4 text-light" style="font-size: 25px;">Banco Grinshow 2024 <i class="fa-solid fa-cat"></i></a>
	
	</div>

	
</div>
<div id="container2">
	<h1 class="navbar-brand p-4 text-light" style="font-size: 25px;">Roles</h1>
</div>
<div id="container3">
	<table style="font-size: 11px;">
		<tr>
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
        </tr>
	
		<?php
if (!empty($filas) && is_array($filas)) {
    foreach ($filas as $persona) {
        echo "<tr>";
        echo "<td>$persona->ID_Persona</td>";
        echo "<td>$persona->Nombre</td>";
        echo "<td>$persona->Apellido</td>";
        foreach ($cuentas as $cuenta) {
            if ($cuenta->ID_Persona == $persona->ID_Persona) {
                echo "<td> $cuenta->ID_Cuenta </td>";
                echo "<td> $cuenta->NumeroCuenta</td>";
                echo "<td> $cuenta->Saldo</td>";
                foreach ($transacciones as $transaccion) {
                    if ($transaccion->ID_Cuenta == $cuenta->ID_Cuenta) {
                        echo "<td>  $transaccion->ID_Transaccion </td>";
                        echo "<td>  $transaccion->Tipo</td>";
                        echo "<td>  $transaccion->Monto </td>";
                        echo "<td>  $transaccion->Fecha </td>";
                    }
                }
            }
        }
    }
} else {
    echo "<tr><td colspan='10'>No hay datos disponibles</td></tr>";
}
?>
	
</div>

</body>
</html>
