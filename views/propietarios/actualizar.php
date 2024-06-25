<div class="contenedor">
    <div class="formularioContactanos">
        <div class="contenedor">

            <?php foreach ($errores as $error) { ?>
                <div class="alerta error">
                    <p><?php echo $error; ?></p>
                </div>
            <?php } ?>

            <form method="POST">
                <?php include __DIR__ . '/formulario.php'; ?>

                <div class="btn_izq">
                    <input class="boton_primario" type="submit" value="Actualizar">
                </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>