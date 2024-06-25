<div class="contenedor">
    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

    <h1>Recuperar password</h1>

    <?php  if (!$error) { ?>
        <div class="formularioContactanos displayBlock">
            <div class="contenedor">
                <h3>Coloca tu nueva contraseña a continuación</h3>
                <form method="post" class="nuevoPassword">
                    <div class="campoContactanos">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" placeholder="Ingresa una contraseña">
                    </div>
                    <div class="btn_izq">
                        <input class="btn" type="submit" value="Guardar">
                    </div>
                </form>
                <div class="acciones">
                    <a href="/login">¿Ya tienes cuenta? Iniciar Sesión</a>
                </div>
            </div>
        </div>
    <?php  } ?>

</div>