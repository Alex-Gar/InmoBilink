<body>
    <section class="login">
        <div class="lDerecho">
            <div class="contenedorFormulario">
                <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
                <div class="logo">
                    <picture>
                        <source srcset="../build/img/imgP/inmobilink1.avif" type="image/avif">
                        <source srcset="../build/img/imgP/inmobilink1.webp" type="image/webp">
                        <source srcset="../build/img/imgP/inmobilink1.png" type="image/png">
                        <img loading="lazy" src="../build/img/imgP/inmobilink1.png" alt="Logo InmoBilink" width="600" height="400">
                    </picture>
                </div>

                <form action="/olvide" method="POST">
                    <div class="inputs">
                        <label for="email">Restablece tu contraseña colocando tu correo electrónico</label>
                        <div class="input input-icon">
                            <i class='bx bxs-user'></i>
                            <input type="text" id="email" name="email" placeholder="Ingresa tu correo">
                        </div>
                        <div class="input">
                            <input class="btn" type="submit" value="Enviar instrucciones">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="ladoIzquierdo">
            <div class="contenedor_principal">
                <div class="img_overlay">
                    <div class="contenedorWelcome">
                        <h2 class="titulo_2">Olvido su contraseña</h2>
                        <h1 class="titulo_1">InmoBilink</h1>
                        <h3>Síguenos en:</h3>

                        <div class="contenedorRedesS">
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
                                    <p>WhatsApp</p>
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
                    <picture>
                        <source srcset="../build/img/imgP/img-fondo-loggin.avif" type="image/avif">
                        <source srcset="../build/img/imgP/img-fondo-loggin.webp" type="image/webp">
                        <source srcset="../build/img/imgP/img-fondo-loggin.png" type="image/png">
                        <img loading="lazy" src="../build/img/imgP/img-fondo-loggin.png" alt="Imagen login" width="600" height="400">
                    </picture>
                </div>
            </div>
        </div>
    </section>
</body><?php
$appPaginas = "<script src='../build/js/appPaginas.js'></script>";
?>