<fieldset>
    <legend>Información del nuevo Propietario.</legend>

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
            <label for="telefono">Teléfono</label>
            <input type="number" name="propietario[telefono]" id="telefono" placeholder="Ingresa tu número" value="<?php echo s($propietario->telefono); ?>">
        </div>
        <div class="campoContactanos">
            <label for="email">E-mail</label>
            <input type="email" name="propietario[email]" id="email" placeholder="Ingresa tu correo" value="<?php echo s($propietario->email); ?>">
        </div>
        <div class="campoContactanos">
            <label for="password">Contraseña</label>
            <input type="password" name="propietario[password]" id="password" placeholder="Ingresa una contraseña" value="<?php echo s($propietario->password); ?>">
        </div>

        <div class="conjuntoCampos">
            <div class="campoContactanos">
                <div class="toggle_label">
                    <div class="info_t">
                        <label for="">Pago</label>
                        <div class="toggle">
                                <input <?php echo ($propietario->status_pago) ? 'checked' : '';?>  type="checkbox" id="status_pago" class="toggle_o" name="propietario[status_pago]" value="1">
                            <label for="status_pago">
                                <span class="thumb"></span>
                            </label>
                            <div class="light"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="campoContactanos">
                <label for="paquete">Selecciona el paquete</label>
                <select name="propietario[paquete]" id="paquete">
                    <option value="" selected disabled>--Seleccione--</option>
                    <?php foreach ($paquetes as $paquete) { ?>
                        <option <?php echo $propietario->paquete === $paquete->id ? 'selected' : ''; ?> value="<?php echo s($paquete->id); ?>"> <?php echo s($paquete->nombre); ?> </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="campoContactanos">
            <label for="rol_user">Selecciona el rol</label>
            <select name="propietario[rol_user]" id="rol_user">
                <option value="" selected disabled>--Seleccione--</option>
                <?php foreach ($roles as $rol) { ?>
                    <option <?php echo $propietario->rol_user === $rol->id ? 'selected' : ''; ?> value="<?php echo s($rol->id); ?>"> <?php echo s($rol->rol); ?> </option>
                <?php } ?>
            </select>
        </div>
    </div>