<div id="APA5" class="APA5  py-5">
                <div id="container">
                    <h2 class="text-center mx-auto">Modificar Datos</h2>
                    <?php
                    include("modificar.php");
                    ?>
                    <div id="contenedor">
                        <div id="modificarPersona" class="form__group field">
                            <h2>Modificar Persona y Sus Datos Asociados</h2>
                            <form method="post" action="#APA5">
                                <input required="" autocomplete="off" class="form__field" type="number" id="id_persona_modificar" name="id_persona_modificar" placeholder="ID de Persona a Modificar">
                                <label class="form_label">ID Persona</label>

                                <input required="" autocomplete="off" class="form__field" type="text" id="nombre_modificar" name="nombre_modificar" placeholder="Nuevo Nombre">
                                <label class="form_label">Nombre</label>

                                <input required="" autocomplete="off" class="form__field" type="text" id="apellido_modificar" name="apellido_modificar" placeholder="Nuevo Apellido">
                                <label class="form_label">Apellidos</label>
                                <button type="submit" name="submit_modificar_persona" class="btn-1">Modificar Persona</button>
                            </form>
                        </div>
                        <div id="modificarCuenta" class="form__group field">
                            <h2>Modificar Cuenta Bancaria </h2>
                            <form method="post" action="#APA5">
                                <input required="" autocomplete="off" class="form__field" type="number" id="id_cuenta_modificar" name="id_cuenta_modificar" placeholder="ID de Cuenta a Modificar">
                                <label class="form_label">ID Cuentra</label>
                                <input required="" autocomplete="off" class="form__field" type="text" id="numero_cuenta_modificar" name="numero_cuenta_modificar" placeholder="Nuevo Número de Cuenta">
                                <label class="form_label">Numero Cuenta</label>
                                <input required="" autocomplete="off" class="form__field" type="number" id="saldo_modificar" name="saldo_modificar" placeholder="Nuevo Saldo">
                                <label class="form_label">Saldo</label>
                                <button type="submit" name="submit_modificar_cuenta" class="btn-1">Modificar Cuenta</button>
                            </form>
                        </div>
                        <div id="modificarTransaccion" class="form__group field">
                            <h2>Modificar Transacción</h2>
                            <form method="post" action="#APA5">
                                <input required="" autocomplete="off" class="form__field" type="number" id="id_transaccion_modificar" name="id_transaccion_modificar" placeholder="ID de Transacción a Modificar">
                                <label class="form_label">ID Transaccion</label>
                                <input required="" autocomplete="off" class="form__field" type="text" id="tipo_modificar" name="tipo_modificar" placeholder="Nuevo Tipo de Transacción">
                                <label class="form_label">Tipo Transaccion</label>
                                <input required="" autocomplete="off" class="form__field" type="number" id="monto_modificar" name="monto_modificar" placeholder="Nuevo Monto">
                                <label class="form_label">Monto</label>
                                <input required="" autocomplete="off" class="form__field" type="text" id="fecha_modificar" name="fecha_modificar" placeholder="Nueva Fecha">
                                <label class="form_label">Fecha</label>
                                <button type="submit" name="submit_modificar_transaccion" class="btn-1">Modificar Transacción</button>
                            </form>
                        </div>
                    </div>



                </div>



            </div>

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

            <script src="js/jquery.countdown.min.js"></script>
            <script src="js/app.js"></script>

</body>

</html>