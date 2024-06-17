<?php
include "cabeza.inc.php";
?>



    <main class="contenido-principal mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="img/imagen1.jpg" class="img-fluid">
                </div>
                <div class="col-md-6 mt-5 mt-md-0 sobre-festival align-items-center d-flex">
                    <div class="contenido">
                        <h2 class="bg-light text-dark">Nadie compara nuestras ofertas</h2>
                        <p class="text-dark bg-light d-inline-block">Oferta Especial Solo Por Este Mes! del 01 abril al
                            30 abril de 2024 </p>

                        <p>¡Banco Central Grinshow te ofrece una oferta que no podrás rechazar!<br><br>

                            ¿Necesitas dine ro rápido? <br><br>
                            ¡Nosotros te lo prestamos al increíblemente bajo interés del 1000%!<br><br>

                            ¡Sí, has leído bien! Te prestamos dinero al 1000% de interés. <br><br>
                            ¿Por qué conformarte con tasas de interés bajas cuando puedes disfrutar del emocionante y
                            exorbitante 1000%?<br><br>
                            ¡No pierdas esta oportunidad única en la vida! ¡Ven y solicita tu préstamo hoy mismo y
                            empieza a vivir la vida al máximo endeudándote con nosotros!<br>

                        </p>
                    </div>

                </div>
            </div>
        </div>
    </main>

    <div id="APA1" class="APA1 bg-danger my-5 p-5">
        <h1 class="text-center">Banco Central Grinshow<i class="fa-solid fa-cat"></i></h1>
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <ul class="horario list-unstyled mt-4  pt-1">
                        <li class="p-3">
                            <h4 class="text-light mt-4 text-center separador rock"></h4>
                            <p class="font-weight-bold m-0">¡Descubre Quiénes Somos!<br>
                                <span class="font-weight-normal">
                                    En el Banco Central Grinshow, hacemos que el fraude sea divertido. Somos los maestros del engaño, los expertos en sacarte el dinero sin que te des cuenta.<br><br>
                                    ¿Quieres un préstamo? Te lo damos, con tasas de interés tan altas que te dejarán sin aliento<br><br>
                                    ¿Por qué conformarte con un banco aburrido cuando puedes unirte a la diversión del Banco Central Grinshow? ¡Ven y únete a la fiesta del fraude!
                                </span>
                            </p>
                        </li>

                    </ul>


                </div>

                <div class="col-md-6">
                    <ul class="horario1 list-unstyled mt-4  pt-1">
                        <li class="p-3">
                            <p class="font-weight-bold m-0">¡Experimenta Nuestro Servicio de Atención al Cliente!<br>
                                <span class="font-weight-normal">
                                    En el Banco Central Grinshow, llevamos la atención al cliente a otro nivel. Somos expertos en hacerte sentir como en casa mientras te despojamos de tus preocupaciones financieras. ¿Necesitas ayuda? ¡Estamos aquí para confundirte y desviarte!<br><br>
                                    ¿Estás cansado de la atención al cliente aburrida y sin emociones? ¡Ven y únete a nosotros para una experiencia que nunca olvidarás! Nuestros representantes están entrenados para ofrecerte respuestas evasivas y promesas vacías, todo mientras te mantienen atrapado en el ciclo interminable de llamadas en espera y correos electrónicos sin respuesta.
                                </span>
                            </p>
                            <h4 class="text-light mt-4 text-center separador dj"></h4>
                        </li>

                    </ul>


                </div>
            </div>
        </div>
        < </div>


            <div id="APA2" class="container APA2">
                <h1 class="text-center">Cuentas <i class="fa-solid fa-shield-cat"></i></h1>
                <div class="text-center col mb-4 fs-5 ">
                    <h1>Mostrar Información de Persona</h1>
                    <form method="post" action="#APA2">
                        <label for="persona_id">Ingrese el ID de la persona:</label>
                        <input type="text" id="persona_id" name="persona_id" required>
                        <button type="submit" name="submit">Mostrar Cuenta</button>
                    </form>
                    <?php

                    include("cuentaBD.php");
                    ?>
                </div>
            </div>



            <div id="APA3" class="APA3 bg-danger py-5">
                <h2 class="text-center text-dark mb-4">ABC</h2>

                <div class="container">
                    <?php

                    include("agregarBD.php");
                    ?>
                    <div id="contenedor">
                        <div id="agregarPersona" class="form__group field">
                            <h2>Agregar Nueva Persona</h2>
                            <form method="post" action="#APA3">
                                <input required="" type="number" id="id_persona" name="id_persona" autocomplete="off" class="form__field" placeholder="Name">
                                <label class="form_label" for="id_persona">ID_Persona:</label>


                                <input required="" type="text" id="nombre" name="nombre" autocomplete="off" class="form__field" placeholder="Name">
                                <label class="form_label" for="nombre">Nombre:</label>


                                <input type="text" id="apellido" name="apellido" autocomplete="off" class="form__field" placeholder="Name">
                                <label class="form_label" for="apellido">Apellido:<br></label><br>
                                <button type="submit" name="submit_persona" class="btn-1">Agregar Persona</button>
                            </form>
                        </div>

                        <div id="agregarCuenta" class="form__group field">
                            <h2>Agregar Nueva Cuenta Bancaria</h2>
                            <form method="post" action="#APA3">
                                <input required="" autocomplete="off" class="form__field" placeholder="Name" type="number" id="id_cuenta" name="id_cuenta" required>
                                <label class="form_label" for="id_cuenta">ID de Cuenta:</label>

                                <input required="" autocomplete="off" class="form__field" placeholder="Name" type="number" id="id_persona" name="id_persona" required>
                                <label class="form_label" for="id_persona">ID de Persona:</label>

                                <input required="" autocomplete="off" class="form__field" placeholder="Name" type="text" id="numero_cuenta" name="numero_cuenta" required>
                                <label class="form_label" for="numero_cuenta">Número de Cuenta:</label>
                                <input required="" autocomplete="off" class="form__field" placeholder="Name" type="number" id="saldo" name="saldo" required><br>
                                <label class="form_label" for="saldo">Saldo:</label>

                                <button type="submit" name="submit_cuenta" class="btn-1">Agregar Cuenta Bancaria</button>
                            </form>
                        </div>
                        <div id="agregarTransaccion" class="form__group field">
                            <h2>Agregar Nueva Transacción</h2>
                            <form method="post" action="#APA3">
                                <input required="" autocomplete="off" class="form__field" placeholder="Name" type="number" id="id_transaccion" name="id_transaccion" required>
                                <label class="form_label" for="id_transaccion">ID de Transacion:</label>

                                <input required="" autocomplete="off" class="form__field" placeholder="Name" type="number" id="id_cuenta" name="id_cuenta" required>
                                <label class="form_label" for="id_cuenta">ID de Cuenta:</label>

                                <input required="" autocomplete="off" class="form__field" placeholder="Name" type="text" id="tipo" name="tipo" required>
                                <label class="form_label" for="tipo">Tipo de Transacción:</label>

                                <input required="" autocomplete="off" class="form__field" placeholder="Name" type="number" id="monto" name="monto" required>
                                <label class="form_label" for="monto">Monto:</label>

                                <input required="" autocomplete="off" class="form__field" placeholder="Name" type="text" id="fecha" name="fecha" required>
                                <label class="form_label" for="fecha">Fecha:</label>

                                <button type="submit" name="submit_transaccion" class="btn-1">Agregar Transacción</button>
                            </form>
                        </div>
                    </div>



                </div>


            </div>

            <div id="APA4" class="APA4  py-5">
                <div>
                    <?php

                    include("eliminarBD.php");
                    ?>
                    <div id="eliminarPersona" class="form__group field">
                        <h2>Eliminar Persona y Sus Datos Asociados</h2>
                        <form method="post" action="#APA4">

                            <input required="" autocomplete="off" class="form__field" type="number" id="id_persona_eliminar" name="id_persona_eliminar" placeholder="ID de Persona a Eliminar">
                            <label class="form_label">Eliminar Persona</label>
                            <button type="submit" name="submit_eliminar_persona" class="btn-1">Eliminar Persona</button>
                        </form>
                    </div>

                </div>
            </div>
<?php
include "cabeza.inc.php";
?>