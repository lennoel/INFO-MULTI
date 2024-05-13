<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>CodeIgniter Login</title>
	<style type="text/css">
		body {
			background-image: url("<?php echo base_url('assets/ba4.jpg'); ?>");
			background-size: cover;
			background-repeat: no-repeat;
		}

		.form__field {
			font-size: 15px;
			position: relative;
			top: 80px;
			padding: 15px;
			width: 25%;
			border: 2px solid black;
			background: transparent;
			text-align: center;
			font-weight: bold;
			backdrop-filter: blur(20px);
			border-radius: 20px;
			display: inline-block;
			margin: 20px;
			
			vertical-align: top;
			
		}

		table {
			width: 100%;
			border-collapse: collapse;
		}

		th,
		td {
			border: 1px solid black;
			padding: 8px;
			text-align: left;
		}

		th {
			background-color: #2ECC71;
		}

		.btn-1,
		.btn-1 *,
		.btn-1 :after,
		.btn-1 :before,
		.btn-1:after,
		.btn-1:before {
			border: 0 solid;
			box-sizing: border-box;
		}

		.btn-1 {
			-webkit-tap-highlight-color: transparent;
			-webkit-appearance: button;
			background-color: #1ABC9C ;
			background-image: none;
			color: #154360;
			cursor: pointer;
			font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
				Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif,
				Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
			font-size: 80%;
			font-weight: 900;
			line-height: 1.5;
			margin: 0;
			-webkit-mask-image: -webkit-radial-gradient(#943126, #17202A );
			padding: 0;
			text-transform: uppercase;
		}

		.btn-1:disabled {
			cursor: default;
		}

		.btn-1:-moz-focusring {
			outline: auto;
		}

		.btn-1 svg {
			display: block;
			vertical-align: middle;
		}

		.btn-1 [hidden] {
			display: none;
		}

		.btn-1 {
			border-radius: 99rem;
			border-width: 2px;
			padding: 0.8rem 3rem;
		}

		.btn-1:hover {
			color:#145A32	 ;
		}
		.ass{
			position: relative;
			top: 80px;
			padding: 15px;
			width: 25%;
		}
	</style>
</head>

<body>
	<div>
		<h1 class="col-md-4 col-md-offset-">Bienvenidos .jpg</h1>
	</div>
	<div>
		<div>
			<div class="form__field">
				<?php
				$user = $this->session->userdata('user');
				extract($user);
				?>
				<h4>Informacion de usuario:</h4>
				<p>Nombre: <?php echo $Nombre; ?></p>
				<p>Apellido: <?php echo $Apellido; ?></p>
			</div>
			<div class="form__field">
				<h4>Cuentas</h4>
				<table>
					<thead>
						<tr>
							<th>ID Cuenta</th>
							<th>Número de Cuenta</th>
							<th>Saldo</th>
							<th>Tipo</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($cuentas as $cuenta) : ?>
							<tr>
								<td><?php echo $cuenta->ID_Cuenta; ?></td>
								<td><?php echo $cuenta->NumeroCuenta; ?></td>
								<td><?php echo $cuenta->Saldo; ?></td>
								<td><?php echo $cuenta->tipo_cuenta; ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
			<div class="form__field">
				<h4>Transacciones:</h4>
				<table>
					<thead>
						<tr>
							<th>ID Transacción</th>
							<th>Tipo</th>
							<th>Monto</th>
							<th>Fecha</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($transacciones as $transaccion) : ?>
							<tr>
								<td><?php echo $transaccion->ID_Transaccion; ?></td>
								<td><?php echo $transaccion->Tipo; ?></td>
								<td><?php echo $transaccion->Monto; ?></td>
								<td><?php echo $transaccion->Fecha; ?></td>
							</tr>
						<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>

	</div>
	<div class="ass">
		<form action="<?php echo base_url(); ?>index.php/user/logout" method="post">
			<button type="submit" class="btn-1">Logout</button>
		</form>

	</div>
</body>

</html>