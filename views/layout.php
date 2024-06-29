<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="InmoBilink - Especialistas en la promoción y publicación de propiedades. Descubre las mejores opciones de inmuebles en venta y alquiler. Encuentra tu hogar ideal con nosotros.">
    <meta name="keywords"
        content="inmuebles, propiedades, venta de casas, alquiler de apartamentos, promoción inmobiliaria, publicación de propiedades, InmoBilink">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="InmoBilink">
    <meta property="og:description"
        content="Especialistas en la promoción y publicación de propiedades. Descubre las mejores opciones de inmuebles en venta y alquiler. Encuentra tu hogar ideal con nosotros.">
    <link rel="apple-touch-icon" sizes="180x180" href="../build/img/imgP/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../build/img/imgP/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../build/img/imgP/favicon-16x16.png">
    <link rel="manifest" href="../build/img/imgP/site.webmanifest">
    <link rel="mask-icon" href="../build/img/imgP/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <!--<meta property="og:image" content="https://www.ejemplo.com/imagen.jpg">
    <meta property="og:url" content="https://www.ejemplo.com/pagina">
    <meta property="og:type" content="website">
    <meta name="language" content="es">
    <link rel="canonical" href="https://www.ejemplo.com/pagina-preferida"> />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css"> -->
    <!-- Enlazar CSS Floating WhatsApp -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link rel="stylesheet"
        href="https://rawcdn.githack.com/jerfeson/floating-whatsapp/0310b4cd88e9e55dc637d1466670da26b645ae49/floating-wpp.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="../build/css/app.css">
    <title>InmoBilink</title>
</head>

<body>
    <div class="contenedor">
        <header class="barra_nav">
            <div class="logo_nav">
                <a href="/">
                    <picture>
                        <source srcset="../build/img/imgP/inmobilink1.avif" type="image/avif">
                        <source srcset="../build/img/imgP/inmobilink1.webp" type="image/webp">
                        <source srcset="../build/img/imgP/inmobilink1.png" type="image/png">
                        <img loading="lazy" src="../build/img/imgP/inmobilink1.png" alt="Logo InmoBilink" width="600"
                            height="400">
                    </picture>
                </a>
            </div>

            <div class="contenedor_nav">
                <div class="icono_menu">
                    <i class="ph ph-list" id="btn_menu"></i>
                </div>
                <div id="back_menu"></div>
                <nav class="nav_opciones" id="nav">

                    <ul id="nav-list">
                        <li><a href="/" id="home">Inicio</a></li>
                        <li><a href="/sobre_nosotros" id="about">Sobre nosotros</a></li>
                        <li><a href="/contactanos" id="contact">Contáctenos</a></li>
                        <li><a href="/login" id="login">Iniciar sesión</a></li>
                    </ul>
                </nav>
            </div>
        </header>
    </div>

    <div id="WABoton"></div>
    <?php
    echo $contenido;
    if (!$ocultarFooter) {
        ?>
        <div class="fondo_footer">
            <footer class="contenedor">
                <div class="footer">
                    <div class="acercaDe_footer">
                        <a href="/sobre_nosotros">Sobre nosotros</a>
                        <a href="/contactanos">Contáctenos</a>
                        <p>2821296424</p>
                        <p>correo@gmail.com</p>
                    </div>
                    <div class="logo_footer">
                        <a href="/">
                            <picture>
                                <source srcset="../build/img/imgP/inmobilink1.avif" type="image/avif">
                                <source srcset="../build/img/imgP/inmobilink1.webp" type="image/webp">
                                <source srcset="../build/img/imgP/inmobilink1.png" type="image/png">
                                <img loading="lazy" src="../build/img/imgP/inmobilink1.png" alt="Logo InmoBilink"
                                    width="600" height="400">
                            </picture>
                        </a>
                    </div>
                    <div class="redes_footer">
                        <div class="contenedorRedes">
                            <div class="redSocial">
                                <a href="#">
                                    <div class="circulo_R">
                                        <i class='bx bxl-facebook' style='color:#ffffff'></i>
                                    </div>
                                    <p>Facebook</p>
                                </a>
                            </div>
                            <div class="redSocial">
                                <a href="#">
                                    <div class="circulo_R">
                                        <i class='bx bxl-instagram-alt' style='color:#ffffff'></i>
                                    </div>
                                    <p>Instagram</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="linea_footer">
                    <hr>
                </div>

                <div class="contenedor_creador">
                    <div class="whatsapp">
                        <i class='bx bxl-whatsapp'></i>
                        <p>2821371363</p>
                    </div>
                    <div class="contenedor_principal">
                        <h3>Creado por InmoBilink</h3>
                        <p>Copyright 20024 &copy;</p>
                    </div>
                    <div class="contenedor_correo">
                        <i class='bx bx-envelope'></i>
                        <p>ale.ag538@gmail.com</p>
                    </div>
                </div>
            </footer>
        </div>
    <?php } ?>
    <!-- Enlazar JS Floating WhatsApp -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript"
        src="https://rawcdn.githack.com/jerfeson/floating-whatsapp/0310b4cd88e9e55dc637d1466670da26b645ae49/floating-wpp.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <!--  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>-->

    <?php
    echo $carrucel ?? null;
    echo $appPaginas ?? null;
    echo $app ?? null;
    echo $apisPagPrin ?? null;
    echo $desplegarForm ?? null;
    echo $apisAvanzado ?? null;
    echo $slider ?? null;
    ?>
</body>

</html>