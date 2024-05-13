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
            background-color: #1ABC9C;
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
            -webkit-mask-image: -webkit-radial-gradient(#943126, #17202A);
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
            color: #145A32;
        }

        .ass {
            top: 20px;
            position: relative;
            padding: 15px;
            width: 25%;
        }

        .apa2 {
            backdrop-filter: blur(20px);
            background: transparent;
        }
    </style>
</head>

<body>
    <div>
        <h1 class="col-md-4 col-md-offset-">Administrador.jpg</h1>

    </div>
    <div>
        <div>
            <div class="form__field">
                <?php
                $user = $this->session->userdata('user');
                extract($user);
                ?>
                <h4>Informacion de ADMINISTRADOR:</h4>
                <p>Nombre: <?php echo $Nombre; ?></p>
                <p>Apellido: <?php echo $Apellido; ?></p>
            </div>


        </div>

    </div>
    <div class="apa2">
        <table>
            <thead>
                <tr>
                    <th>ID Persona</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Rol</th>
                    <th>ID Cuenta</th>
                    <th>Número de Cuenta</th>
                    <th>Departamento</th>
                    <th>Tipo Cuenta</th>
                    <th>Saldo</th>
                    <th>ID Transacción</th>
                    <th>Tipo</th>
                    <th>Monto</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($personas as $persona) : ?>
                    <?php foreach ($cuentas as $cuenta) : ?>
                        <?php if ($cuenta->ID_Persona == $persona->ID_Persona) : ?>
                            <?php foreach ($transacciones as $transaccion) : ?>
                                <?php if ($transaccion->ID_Cuenta == $cuenta->ID_Cuenta) : ?>
                                    <tr>
                                        <td><?php echo $persona->ID_Persona; ?></td>
                                        <td><?php echo $persona->Nombre; ?></td>
                                        <td><?php echo $persona->Apellido; ?></td>
                                        <td><?php echo $persona->roll; ?></td>
                                        <td><?php echo $cuenta->ID_Cuenta; ?></td>
                                        <td><?php echo $cuenta->NumeroCuenta; ?></td>
                                        <td><?php echo $cuenta->Departamento; ?></td>
                                        <td><?php echo $cuenta->tipo_cuenta; ?></td>
                                        <td><?php echo $cuenta->Saldo; ?></td>
                                        <td><?php echo $transaccion->ID_Transaccion; ?></td>
                                        <td><?php echo $transaccion->Tipo; ?></td>
                                        <td><?php echo $transaccion->Monto; ?></td>
                                        <td><?php echo $transaccion->Fecha; ?></td>
                                        <td>
                                            <form action="<?php echo base_url(); ?>index.php/user/eliminarCuenta/<?php echo $cuenta->ID_Cuenta; ?>" method="post">
                                                <button type="submit" class="btn btn-danger">Eliminar cuenta</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
    <div>
    <h1>Montos por Departamento</h1>
<table>
    <tr>
        <th>Departamento</th>
        <th>Total Corriente</th>
        <th>Total Ahorros</th>
        <th>Total Mixta</th>
    </tr>
    <?php foreach ($montos as $monto): ?>
        <tr>
            <td><?php echo $monto->Departamento; ?></td>
            <td><?php echo $monto->total_corriente; ?></td>
            <td><?php echo $monto->total_ahorros; ?></td>
            <td><?php echo $monto->total_mixta; ?></td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td>Total General</td>
        <td><?php echo $total_general->total_general_corriente; ?></td>
        <td><?php echo $total_general->total_general_ahorros; ?></td>
        <td><?php echo $total_general->total_general_mixta; ?></td>
    </tr>
</table>
    </div>
    <div class="ass">
        <form class="ass" action="<?php echo base_url(); ?>index.php/user/logout" method="post">
            <button type="submit" class="btn-1">Logout</button>
        </form>
    </div>

</body>

</html>