<div class="contenedor">
    <h1>Bienvenido <?php echo $nombre; ?> </h1>

    <div class="graficasDash">
        <div class="contenedor">
            <div class="panelInfo">
                <p>Este es su panel de administración, desde este panel podrá crear, actualizar la información de sus propiedades y eliminarlas  asi como su información personal u organización. </p>
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

<?php $graficaL2 = '<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" integrity="sha512-L0Shl7nXXzIlBSUUPpxrokqq4ojqgZFQczTYlGjzONGTDAcLremjwaWv5A+EDLnxhQzY5xUZPWLOLqYRkY0Cbw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>'; ?>
<?php $graficaL1 = '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script> '; ?>
<?php $grafica = "<script src='../build/js/graficas.js'></script>"; ?>