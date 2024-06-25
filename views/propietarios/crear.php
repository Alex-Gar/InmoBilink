<div class="contenedor">
    <div class="formularioContactanos">
        <div class="contenedor">
            
            <?php foreach ($errores as $error) : ?>
                <div class="alerta error">
                    <?php echo $error; ?>
                </div>
            <?php endforeach; ?>

            <form method="POST" enctype="multipart/form-data">
                <?php include __DIR__ . '/formulario.php'; ?>

                <div class="btn_izq">
                    <input class="boton_primario" type="submit" value="Guardar">
                </div>
                </fieldset>
            </form>
        </div>
    </div>
</div>