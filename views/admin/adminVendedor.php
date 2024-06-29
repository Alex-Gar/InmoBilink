<div class="contenedor">
    <h1>Bienvenido <?php echo $nombre; ?> </h1>

    <div class="graficasDash">
        <div class="contenedor">
            <div class="panelInfo">
                <p>Este es su panel de administración, desde este panel podrá crear, actualizar la información de sus
                    propiedades y eliminarlas asi como su información personal u organización. </p>
                <div class="btn boton_primario">
                    <a href="/propiedades">Crear una propiedad</a>
                </div>
                <div class="btn boton_primario">
                    <a href="/propiedades">Ver propiedades</a>
                </div>
                <div class="btn boton_primario">
                    <a href="/propiedades">Mi perfil</a>
                </div>
            </div>
        </div>
        <div class="contenedor">
            <div class="graficaNoPropiedades">
                <canvas id="graficaNoPropiedades"></canvas>
            </div>
        </div>
    </div>
</div>

<?php $grafica = '
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../build/js/graficas.js"></script>
'?>