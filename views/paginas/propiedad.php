<div class="contenedor">
    <section class="contendorImg">
        <picture>
            <!--  <source srcset="../build/img/imgP/inmobilink1.avif" type="image/avif">
                                                <source srcset="../build/img/imgP/inmobilink1.webp" type="image/webp">
                                                <source srcset="../build/img/imgP/inmobilink1.png" type="image/png">
                                                <img loading="lazy" src="../build/img/imgP/inmobilink1.png" alt="Logo InmoBilink" width="600" height="400"> -->
            <img loading="lazy" src="<?php echo '../build/img/imgDb/' . $propiedad->img1; ?>" alt="<?php echo $propiedad->img1; ?>" width="600" height="400">
        </picture>
    </section>
</div>

<div class="contenedorInfoPropiedades">
    <main class="infoPropiedades">
        <div class="contenedor">
            <h2><?php echo $propiedad->tipo_propiedad_nombre . ' en '; ?></h2>
            <h1><?php echo $propiedad->finalidad_nombre; ?></h1>
            <div class="linea"></div>
            <p>Desde</p>
            <h2><?php echo formatearMoneda($propiedad->precio); ?></h2>
            <p>Descripción</p>
            <p><span><?php echo $propiedad->descripcion; ?></span></p>
        </div>
    </main>

    <div class="contenedor">
        <section class="infoCaracteristicas">
            <a href="/empresa?id=<?php echo $empresa->id; ?>">
                <div class="contenedor_empresa">
                    <div class="contenedor_img">
                        <picture>
                            <!--  <source srcset="../build/img/imgP/inmobilink1.avif" type="image/avif">
                                                <source srcset="../build/img/imgP/inmobilink1.webp" type="image/webp">
                                                <source srcset="../build/img/imgP/inmobilink1.png" type="image/png">
                                                <img loading="lazy" src="../build/img/imgP/inmobilink1.png" alt="Logo InmoBilink" width="600" height="400"> -->
                            <img loading="lazy" src="<?php echo '../build/img/imgDb/' . $empresa->img1; ?>" alt="Logo Empresa" width="600" height="400">
                        </picture>
                    </div>
                    <div class="contenedor_info_empresa">
                        <p><span>Conoce mas propiedades de: </span></p>
                        <p> <?php echo $empresa->nombre_empresa; ?></p>
                    </div>
                </div>
            </a>
        </section>
    </div>
</div>
<main class="contenedor">
    <div class="caracteristicas">
        <section class="infoCaracteristicas">
            <h3>Servicios</h3>
            <div class="infoCaracte">
                <?php echo $propiedad->agua ? ' <p><span class="columna"><i class="ph ph-drop"></i>Agua</span></p>' : ''; ?>
                <?php echo $propiedad->electricidad ? ' <p><span class="columna"><i class="ph ph-lightning"></i>Electricidad</span></p>' : ''; ?>
                <?php echo $propiedad->internet ? ' <p><span class="columna"><i class="ph ph-wifi-high"></i>Internet</span></p>' : ''; ?>
                <?php echo $propiedad->telefono ? ' <p><span class="columna"><i class="ph ph-phone"></i>Teléfono</span></p>' : ''; ?>
                <?php echo $propiedad->cable ? ' <p><span class="columna"><i class="ph ph-television-simple"></i> cable</span></p>' : ''; ?>
                <?php echo $propiedad->amueblada ? ' <p><span class="columna"><i class="ph ph-couch"></i> Amueblada</span></p>' : ''; ?>
            </div>
        </section>
        <section class="infoCaracteristicas">
            <h3>Características exteriores</h3>
            <div class="infoCaracte">
                <?php echo $propiedad->terraza ? '<p><span class="columna"> <i class="ph ph-park"></i>Terraza  </span></p>' : null; ?>
                <?php echo $propiedad->alberca ? '<p><span class="columna"><i class="ph ph-person-simple-swim"></i> Alberca</span></p>' : null; ?>
                <?php echo $propiedad->juegos_infantiles ? '<p><span class="columna"><i class="ph ph-lego-smiley"></i> Juegos infantiles</span></p>' : null; ?>
                <?php echo $propiedad->areas_deportivas ? '<p><span class="columna"><i class="ph ph-court-basketball"></i> Areas deportivas</span></p>' : null; ?>
                <?php echo $propiedad->seguridad ? '<p><span class="columna"><i class="ph ph-security-camera"></i> Seguridad</span></p>' : null; ?>
                <?php echo $propiedad->jardin ? '<p><span class="columna"><i class="ph ph-potted-plant"></i> Jardín</span></p>' : null; ?>
                <?php echo $propiedad->elevador ? '<p><span class="columna"><i class="ph ph-elevator"></i> Elevador</span></p>' : null; ?>
            </div>
        </section>
        <section class="infoCaracteristicas">
            <h3>Características interiores</h3>
            <div class="infoCaracte">
                <?php echo $propiedad->habitaciones ? '<p><span class="fila">' . $propiedad->habitaciones . '<i class="bx bx-bed"></i></span> Habitaciones</p>' : null; ?>
                <?php echo $propiedad->wc ? '<p><span class="fila">' . $propiedad->wc . '<i class="ph ph-toilet"></i></span>Baños</p>' : null; ?>
                <?php echo $propiedad->estacionamientos ? '<p><span class="fila">' . $propiedad->estacionamientos . '<i class="bx bxs-car-garage"></i> </span>Garage</p>' : null; ?>
                <?php echo $propiedad->balcon ? '<p><span class="columna"><i class="ph ph-lighthouse"></i> Balcón</span></p>' : null; ?>
                <?php echo $propiedad->cuarto_servicio ? '<p> <span class="columna"><i class="ph ph-washing-machine"></i> Cuarto servicio</span></p>' : null; ?>
                <?php echo $propiedad->metros_cuadrados ? '<p><span class="fila">' . $propiedad->metros_cuadrados . '<i class="ph ph-number-square-two"></i> </span> Metros² </p>' : null; ?>
            </div>
        </section>
    </div>
</main>

<section>
    <h2 class="section-heading">Conoce esta propiedad</h2>

    <div class="swiper tranding-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide tranding-slide">
                <div class="tranding-slide-img">
                    <picture>
                        <img loading="lazy" src="<?php echo '../build/img/imgDb/' . $propiedad->img1; ?>" alt="<?php echo $propiedad->img1; ?>" width="600" height="400">
                    </picture>
                </div>
            </div>
            <?php if ($propiedad->img2) { ?>
                <div class="swiper-slide tranding-slide">
                    <div class="tranding-slide-img">
                        <picture>
                            <img loading="lazy" src="<?php echo '../build/img/imgDb/' . $propiedad->img2; ?>" alt="<?php echo $propiedad->img2; ?>" width="600" height="400">
                        </picture>
                    </div>
                </div>
            <?php }
            if ($propiedad->img3) { ?>
                <div class="swiper-slide tranding-slide">
                    <div class="tranding-slide-img">
                        <picture>
                            <img loading="lazy" src="<?php echo '../build/img/imgDb/' . $propiedad->img3; ?>" alt="<?php echo $propiedad->img3; ?>" width="600" height="400">
                        </picture>
                    </div>
                </div>
            <?php }
            if ($propiedad->img4) { ?>
                <div class="swiper-slide tranding-slide">
                    <div class="tranding-slide-img">
                        <picture>
                            <img loading="lazy" src="<?php echo '../build/img/imgDb/' . $propiedad->img4; ?>" alt="<?php echo $propiedad->img4; ?>" width="600" height="400">
                        </picture>
                    </div>
                </div>
            <?php }
            if ($propiedad->img5) { ?>
                <div class="swiper-slide tranding-slide">
                    <div class="tranding-slide-img">
                        <picture>
                            <img loading="lazy" src="<?php echo '../build/img/imgDb/' . $propiedad->img5; ?>" alt="<?php echo $propiedad->img5; ?>" width="600" height="400">
                        </picture>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="tranding-slider-control">
            <div class="swiper-button-prev slider-arrow">
                <ion-icon name="arrow-back-outline"></ion-icon>
            </div>
            <div class="swiper-button-next slider-arrow">
                <ion-icon name="arrow-forward-outline"></ion-icon>
            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section>

<div class="contenedor">
    <section class="contactos">
        <h2>¿Te gusto la propiedad? <br> pide informes para adquirirla</h2>

        <div class="contactanosFormas">

            <div class="telefono">
                <i class='bx bxl-whatsapp'></i>
                <p>WhatsApp</p>
                <p><span><?php echo $propietario->telefono; ?></span></p>
                <a class="btn_whatsapp" target="_blank" href="https://wa.me/52<?php echo $propietario->telefono; ?>?text=Hola me puede brindar información acerca de esta propiedad http://localhost:3000/propiedad?id=<?php echo $propietario->id ?>">Por whatsApp</a>
            </div>
            <div class="separador"></div>
            <div class="ubicacion">
                <i class='bx bx-map'></i>
                <p>Ubicación</p>
                <?php if (!empty($propiedad->no_exterior)) {
                    $no_exterior = ', No. ' . $propiedad->no_exterior;
                } else {
                    $no_exterior = $no_exterior ?? null;
                }
                if (!empty($propiedad->no_interior)) {
                    $no_interior = ', Int. ' . $propiedad->no_interior;
                } else {
                    $no_interior = $no_interior ?? null;
                } ?>
                <p><span><?php echo $propiedad->estado . ', ' . $propiedad->municipio . ', ' . $propiedad->localidad; ?></span></p>
                <p><span><?php echo $propiedad->colonia . ', ' . $propiedad->calle . $no_exterior . $no_interior; ?></span></p>
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
$slider = "<script src='../build/js/slider.js'></script>";
$desplegarForm = "<script src='../build/js/desplegarForm.js'></script>";
?>