<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>CodeIgniter Login</title>
	<link rel="stylesheet" type="text/css">
	<style type="text/css">
		body {
			background-image: url("<?php echo base_url('assets/ba1.jpg'); ?>");
			background-size: cover;
			background-repeat: no-repeat;
		}

		.apa1 {
			font-size: 25px;
			position: relative;
			top: 80px;
			left: 450px;
			padding: 20px 0 0;
			width: 100%;
			max-width: 400px;
			border-color: black;
			border-style: groove;
			background: transparent;
			text-align: center;
			font-weight: bold;
			backdrop-filter: blur(20px);
			border-radius: 20px;
		}

		.form__field {

			font-family: inherit;
			width: 80%;
			border: none;
			border-bottom: 2px solid #0c0264;
			outline: 0;
			font-size: 17px;
			color: #020202;
			padding: 7px 0;
			background: transparent;
			transition: border-color 0.2s;
		}

		.form__field::placeholder {
			color: transparent;
		}

		.form__field:placeholder-shown~.form__label {
			font-size: 20px;
			cursor: text;
			top: 25px;
		}

		.form__label {
			position: absolute;
			top: 0;
			display: block;
			transition: 0.3s;
			font-size: 30px;

			color: #0a0707;
			pointer-events: none;
		}

		.form__field:focus {
			padding-bottom: 6px;
			font-weight: 700;
			border-width: 4px;
			border-image: linear-gradient(to right, #116399, #38caef);
			border-image-slice: 1;
		}

		.form__field:focus~.form__label {
			position: absolute;
			top: 0;
			display: block;
			transition: 0.2s;
			font-size: 20px;
			color: #38caef;
			font-weight: 1000;
		}

		/* reset input */
		.form__field:required,
		.form__field:invalid {
			box-shadow: none;
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
			background-color:  #116399;
			background-image: none;
			color: #fff;
			cursor: pointer;
			font-family: ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont,
				Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif,
				Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
			font-size: 80%;
			font-weight: 900;
			line-height: 1.5;
			margin: 0;
			-webkit-mask-image: -webkit-radial-gradient(#000, #fff);
			padding: 0;
			background: transparent;
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
			color: #123;
		}
	</style>
</head>

<body>
	<div class="container">
	
		<div id="apa1" class="apa1">

			<div class="col-sm-4 col-sm-offset-4">
				<div>
					<div>
						<h3 class="panel-title"><span class="glyphicon glyphicon-lock"></span> Login
						</h3>
					</div>
					<div>
						<form method="POST" action="<?php echo base_url(); ?>index.php/user/login">

							<div>
								<input required="" autocomplete="off" class="form__field" placeholder="Nombre" type="text" name="nombre" required>
								<label class="form_label" for="email">Usuario:</label>

							</div>
							<div>
								<input required="" autocomplete="off" class="form__field" placeholder="Password" type="password" name="id_persona" required>
								<label class="form_label" for="password">Contraseña:</label>
								<h1></h1>
							</div>
							<button class="btn-1" type="submit"><span class="glyphicon glyphicon-log-in"></span> Login</button>

						</form>
					</div>
				</div>
				<?php
				if ($this->session->flashdata('error')) {
				?>
					<div class="alert alert-danger text-center" style="margin-top:20px;">
						<?php echo $this->session->flashdata('error'); ?>
					</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>
</body>

</html>