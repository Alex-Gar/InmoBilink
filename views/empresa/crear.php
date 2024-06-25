<div class="contenedor">
    <?php foreach ($errores as $error) : ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>

    <div id="app">
        <nav class="tabs">
            <button class="actual" type="button" data-paso="1">Información de la inmobiliaria</button>
            <button type="button" data-paso="2">Ubicación</button>
            <button type="button" data-paso="3">Imágenes</button>
        </nav>

        <form method="POST" enctype="multipart/form-data">
            <?php include __DIR__ . '/formulario.php'; ?>

            <div class="btn_izq">
                <input class="boton_primario" type="submit" value="Guardar">
            </div>
            </fieldset>
    </div>
</div>
</div>
</form>
<div class="paginacion ">
    <button id="anterior" class="boton_primario">&laquo; Anterior</button>
    <button id="siguiente" class="boton_primario">Siguiente&raquo;</button>
</div>
</div>
</div>