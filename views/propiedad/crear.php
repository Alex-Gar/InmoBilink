<div class="contenedor">
<?php include_once __DIR__ . '/../templates/alertas.php'; ?>

    <div id="app">
        <nav class="tabs">
            <button class="actual" type="button" data-paso="1">Información de la propiedad</button>
            <button type="button" data-paso="2">Características exteriores</button>
            <button type="button" data-paso="3">Características interiores</button>
            <button type="button" data-paso="4">Servicios incluidos</button>
            <button type="button" data-paso="5">Ubicación</button>
            <button type="button" data-paso="6">Imágenes</button>
        </nav>
        <form method="POST" enctype="multipart/form-data">
            <?php include __DIR__ . '/formulario.php'; ?>
            <div class="btn_form">
                <input class="btn" type="submit" value="Guardar">
            </div>
            </fieldset>
    </div>
</div>
</div>
</form>
<div class="paginacion ">
    <button id="anterior" class="btn">&laquo; Anterior</button>
    <button id="siguiente" class="btn">Siguiente&raquo;</button>
</div>
</div>
</div>
<?php $navForm = "<script src='../build/js/navAdmin.js'></script> "?>
