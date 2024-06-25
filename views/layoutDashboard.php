<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>

    <link rel="apple-touch-icon" sizes="180x180" href="../build/img/imgP/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../build/img/imgP/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../build/img/imgP/favicon-16x16.png">
    <link rel="manifest" href="../build/img/imgP/site.webmanifest">
    <link rel="mask-icon" href="../build/img/imgP/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link rel="stylesheet" href="../build/css/app.css">

    <title>InmoBilink</title>
</head>

<body>
    <div class="container">
        <div class="sidebar">
            <div class="menu-btn">
                <i class="ph-bold ph-caret-left"></i>
            </div>
            <div class="head">
                <div class="img_logo">
                    <picture>
                        <source srcset="../build/img/imgP/inmobilink1.avif" type="image/avif">
                        <source srcset="../build/img/imgP/inmobilink1.webp" type="image/webp">
                        <source srcset="../build/img/imgP/inmobilink1.png" type="image/png">
                        <img loading="lazy" src="../build/img/imgP/inmobilink1.png" alt="Logo InmoBilink" width="600" height="400">
                    </picture>
                </div>
            </div>
            <div class="nav">
                <div class="menu">
                    <ul>
                        <?php if ($rol == 1) { ?>
                            <li>
                                <a href="/admin">
                                    <i class="icon ph-bold ph-house-simple"></i>
                                    <span class="text">Dashboard</span>
                                </a>
                            </li>
                        <?php }
                        if ($rol == 2 || $rol == 3) { ?>
                            <li>
                                <a href="/admin-vendedor">
                                    <i class="icon ph-bold ph-house-simple"></i>
                                    <span class="text">Dashboard</span>
                                </a>
                            </li>
                        <?php }
                        if ($rol == 4) { ?>
                            <li>
                                <a href="/admin-inmobiliaria">
                                    <i class="icon ph-bold ph-house-simple"></i>
                                    <span class="text">Dashboard</span>
                                </a>
                            </li>
                        <?php } ?>
                        <li>
                            <a href="#">
                                <i class="icon ph-bold ph-file-text"></i>
                                <span class="text">Análisis</span>
                                <i class="arrow ph-bold ph-caret-down"></i>
                            </a>
                            <ul class="sub-menu">
                                <?php
                                if ($rol == 1) {
                                ?>
                                    <li>
                                        <a href="/propietarios">
                                            <span class="text">Propietarios</span>
                                        </a>
                                    </li>
                                <?php } ?>
                                <li>
                                    <a href="/propiedades">
                                        <span class="text">Mis propiedades</span>
                                    </a>
                                </li>
                                <?php
                                if ($rol == 1) {
                                ?>
                                    <li>
                                        <a href="/bienes-r">
                                            <span class="text">Empresas</span>
                                        </a>
                                    </li>
                                <?php  } ?>

                            </ul>
                        </li>
                        <?php
                        if ($rol == 1) {
                        ?>
                            <li class="active">
                                <a href="/propietarios/crear">
                                    <i class="icon ph-bold ph-user"></i>
                                    <span class="text">Nuevo vendedor</span>
                                </a>
                            </li>
                        <?php  } ?>
                        <li class="">
                            <a href="/propiedad/crear">
                                <i class="icon ph-bold ph-user"></i>
                                <span class="text">Nueva Propiedad</span>
                            </a>
                        </li>
                        <?php
                        if ($rol == 1) {
                        ?>
                            <li class="">
                                <a href="/bienes-r/crear">
                                    <i class="icon ph-bold ph-user"></i>
                                    <span class="text">Nueva Empresa</span>
                                </a>
                            </li>

                            <li>
                                <a href="#">
                                    <i class="icon ph-bold ph-chart-bar"></i>
                                    <span class="text">Tablas de apoyo</span>
                                    <i class="arrow ph-bold ph-caret-down"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="/finalidades">
                                            <span class="text">Finalidades</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/tipoPropiedad">
                                            <span class="text">Tipo de propiedad</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php  } ?>
                    </ul>
                </div>
                <div class="menu">
                    <ul>
                        <li>
                            <a>
                                <i class="icon ph-bold ph-gear"></i>
                                <span class="text">Ajustes</span>
                                <i class="arrow ph-bold ph-caret-down"></i>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="/acerca-de">
                                        <span class="text">Mi información</span>
                                    </a>
                                </li>
                                <?php
                                if ($rol == 4) {
                                ?>
                                    <li>
                                        <a href="/info-de">
                                            <span class="text">Mi inmobiliaria</span>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="menu">
                <p class="title">Account</p>
                <ul>
                    <li>
                        <a href="/logout">
                            <i class="icon ph-bold ph-sign-out"></i>
                            <span class="text">Cerrar sesión</span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon ph-bold ph-info"></i>
                            <span class="text">Help</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="contenido_dashboard">
            <div class="contenedor_sup">
                <div class="barra_superior">
                    <div class="info_dashboard">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="menu">
                        <ul>
                            <li>
                                <a href="#">
                                    <div class="user-img">
                                        <picture>
                                            <source srcset="../build/img/imgP/inmobilink1.avif" type="image/avif">
                                            <source srcset="../build/img/imgP/inmobilink1.webp" type="image/webp">
                                            <source srcset="../build/img/imgP/inmobilink1.png" type="image/png">
                                            <img loading="lazy" src="../build/img/imgP/inmobilink1.png" alt="Logo InmoBilink" width="600" height="400">
                                        </picture>
                                    </div>
                                    <span class="text"><?php echo $nombre; ?></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <?php
            echo $contenido;
            ?>
        </div>

        <script>
            /* Initialization of datatables */
            $(document).ready(function() {
                $('table.display').DataTable();
            });
        </script>
        <!--
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script> -->
        <script src='../build/js/menuSidebar.js'></script>
        <script src='../build/js/navAdmin.js'></script>
        <?php
        echo $graficaL2 ?? null;
        echo $graficaL1 ?? null;
        echo $grafica ?? null;
        ?>
</body>