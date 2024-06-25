<header class="header_empresa">
    <div class="fondo">
        <picture>
            <!--  <source srcset="../build/img/imgP/inmobilink1.avif" type="image/avif">
                                                <source srcset="../build/img/imgP/inmobilink1.webp" type="image/webp">
                                                <source srcset="../build/img/imgP/inmobilink1.png" type="image/png">
                                                <img loading="lazy" src="../build/img/imgP/inmobilink1.png" alt="Logo InmoBilink" width="600" height="400"> -->
            <img loading="lazy" src="<?php echo '../build/img/imgDb/' . $empresa->img2; ?>" alt="<?php echo $empresa->img2; ?>" width="600" height="400">
        </picture>
        <div class="fondo_oscuro"></div>
        <div class="fondo_info">
            <div class="txt_empresa">
                <h1 class="slide-top"> <?php echo $empresa->nombre_empresa; ?></h1>
                <h2 class="slide-top"> <?php echo $empresa->slogan; ?></h2>
                <p class="slide-top"> <?php echo $empresa->descripcion; ?></p>

                <div class="botones_empresa">
                    <a class="btn slide-top" href="#propiedades">Propiedades</a>
                    <a class="btn_negro slide-top" href="#contacto">Contáctenos</a>
                </div>
            </div>
            <div class="logo_empresa">
                <picture>
                    <!--  <source srcset="../build/img/imgP/inmobilink1.avif" type="image/avif">
                                                <source srcset="../build/img/imgP/inmobilink1.webp" type="image/webp">
                                                <source srcset="../build/img/imgP/inmobilink1.png" type="image/png">
                                                <img loading="lazy" src="../build/img/imgP/inmobilink1.png" alt="Logo InmoBilink" width="600" height="400"> -->
                    <img loading="lazy" src="<?php echo '../build/img/imgDb/' . $empresa->img1; ?>" alt="<?php echo $empresa->img1; ?>" width="600" height="400">
                </picture>
                <div class="no_propiedades heartbeat">
                    <?php foreach ($propiedades as $propiedad) {
                        $contador++;
                    } ?>
                    <p><span><?php echo $contador . '+'; ?></span></p>
                    <p> propiedades</p>
                </div>
            </div>
        </div>
    </div>
</header>
<section class="contenedor tarjetasPropiedades"  id="propiedades">
    <h2>Inmuebles disponibles de <?php echo $empresa->nombre_empresa ?></h2>
    <div class="verMas">
        <a href="/avanzado">Ver otras propiedades <i class='bx bxs-right-arrow'></i></a>
        <hr class="lienaPequena">
    </div>
    <hr>
    <div class="propiedades">
        <?php
        foreach ($propiedades as $propiedad) {
            @include 'listadoPropiedades.php';
        }
        ?>
    </div>
</section>
<div class="contenedor" id="contacto">
    <section class="contactos">
        <h2>¿Te gusto la propiedad? <br> pide informes para adquirirla</h2>

        <div class="contactanosFormas">
            <div class="telefono">
                <i class='bx bxl-whatsapp'></i>
                <p>WhatsApp</p>
                <a class="btn_whatsapp" target="_blank" href="https://wa.me/52<?php echo $propietario->telefono; ?>?text=Hola me puede brindar información acerca de esta propiedad http://localhost:3000/propiedad?id=<?php echo $propietario->id ?>">Por whatsApp</a>
            </div>
            <div class="separador"></div>
            <div class="ubicacion">
                <i class='bx bx-map'></i>
                <p>Ubicación</p>
                <?php
                $exteri = $empresa->no_exterior ? ', No. ' . $empresa->no_exterior : null;
                $inter = $empresa->no_interior ? ', Int. ' . $empresa->no_interior : null;
                ?>
                <p><span><?php echo $empresa->estado . ', ' . $empresa->municipio . ', ' . $empresa->localidad; ?></span></p>
                <p><span><?php echo $empresa->colonia . ', ' . $empresa->calle . ' ' . $exteri . ' ' . $inter; ?></span></p>
            </div>
            <div class="separador"> </div>
            <div class="ubicacion">
                <i class='bx bx-envelope'></i>
                <p>E-mail</p>
                <button class="btn_correo" id="mostrarFormularioBtn">Por correo</button>
            </div>
        </div>
    </section>

    <div class="formularioContactanos" id="formularioContactanosOcultar">
        <div class="contenedor">
            <form action="">
                <legend>Envíale un correo al propietario</legend>

                <div class="camposFormulario">
                    <div class="campoContactanos">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre" placeholder="Coloca tu nombre">
                    </div>
                    <div class="campoContactanos">
                        <label for="pApellido">Primer Apellido:</label>
                        <input type="text" name="pApellido" id="pApellido" placeholder="Coloca tu primer apellido ">
                    </div>
                    <div class="campoContactanos">
                        <label for="sApellido">Segundo Apellido:</label>
                        <input type="text" name="sApellido" id="sApellido" placeholder="Coloca tu segundo apellido ">
                    </div>
                    <div class="campoContactanos">
                        <label for="celular">Celular:</label>
                        <input type="number" name="celular" id="celular" placeholder="Coloca tu numero celular">
                    </div>
                    <div class="campoContactanos">
                        <label for="email">Correo electrónico:</label>
                        <input type="text" name="email" id="email" placeholder="Coloca tu correo">
                    </div>
                    <div class="campoContactanos">
                        <label for="mensaje">Envía un mensaje:</label>
                        <textarea name="mensaje" id="mensaje"></textarea>
                    </div>
                </div>

                <div class="btn_right">
                    <button class="btn">Enviar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
$carrucel = '<script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>';
$appPaginas = "<script src='../build/js/appPaginas.js'></script>";
?>