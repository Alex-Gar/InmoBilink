<div class="contenedor">
    <div class="formularioContactanos displayBlock">
        <div class="contenedor">

            <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

            <form method="POST">
                <fieldset>
                    <legend>Información del propietario.</legend>

                    <div class="camposFormulario">
                        <div class="campoContactanos">
                            <label for="nombre">Nombre(s)</label>
                            <input type="text" name="propietario[nombre]" id="nombre" placeholder="Ingresa tu nombre" value="<?php echo s($propietario->nombre); ?>">
                        </div>
                        <div class="campoContactanos">
                            <label for="p_apellido">Primer apellido</label>
                            <input type="text" name="propietario[p_apellido]" id="p_apellido" placeholder="Ingresa tu apellido" value="<?php echo s($propietario->p_apellido); ?>">
                        </div>
                        <div class="campoContactanos">
                            <label for="s_apellido">Segundo apellido</label>
                            <input type="text" name="propietario[s_apellido]" id="s_apellido" placeholder="Ingresa tu apellido" value="<?php echo s($propietario->s_apellido); ?>">
                        </div>
                        <div class="campoContactanos">
                            <label for="telefono1">Teléfono</label>
                            <input type="number" name="propietario[telefono]" id="telefono1" placeholder="Ingresa tu número" value="<?php echo s($propietario->telefono); ?>">
                        </div>
                        <div class="campoContactanos">
                            <label for="email">E-mail</label>
                            <div class="inputFalse"><?php echo s($propietario->email); ?></div>
                        </div>
                        <div class="campoContactanos">
                            <label for="password">Contraseña</label>
                            <input type="password" name="propietario[password]" id="password" placeholder="Ingresa una contraseña" value="<?php echo s($propietario->password); ?>">
                        </div>

                        <div class="campoContactanos">
                            <label for="paquete">Su paquete es: </label>
                            <?php
                            $nombrePaquete = 'Paquete no encontrado.';
                            foreach ($paquetes as $paquete) {
                                if ($propietario->paquete === $paquete->id) {
                                    $nombrePaquete = $paquete->nombre;
                                    break;
                                }
                            } ?>
                            <div class="inputFalse"> <?php echo $nombrePaquete; ?></div>
                        </div>

                        <div class="campoContactanos">
                            <label for="fecha_cierre">y expira el:</label>
                            <div class="inputFalse"><?php echo s($propietario->fecha_cierre); ?></div>
                        </div>
                    </div>
                    <div class="btn_form">
                        <input class="btn" type="submit" value="Actualizar">
                    </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>