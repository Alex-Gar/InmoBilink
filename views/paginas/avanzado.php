<main class="avanzado_header">
    <div class="etiquetaAv">
        <h1>El hogar de tus sueños está a solo un clic de distancia</h1>
    </div>
</main>

<div class="divicionElementos">
    <section class="opcionesAvanzadas">
        <div class="contenedor">
            <div class="pestana_encuentra">
                <h4>Busca tu proximo hogar</h4>
                <div class="btn_codigo">
                    <p>Código del inmueble</p>
                </div>
            </div>
        </div>
        <div class="pestana_codigo">
            <div class="contenedor">
                <form method="GET">
                    <div class="opciones_codigo">
                        <input type="id" id="id" name="id" placeholder="Ejemplo: ALP5">
                        <button><i class='bx bx-search-alt-2'></i></button>
                    </div>
                </form>
                <div class="btn_busca">
                    <p>Más filtros</p>
                </div>
            </div>
        </div>
        <div class="pestana_buscaR">
            <div class="contenedor">
                <div class="form_buscaR">
                    <form action="/avanzado" method="POST">
                        <div class="opcion_filtro">
                            <input type="text" id="ciudad" name="ciudad" size="30" maxlength="30" placeholder="Ingresa la ubicación">
                        </div>
                        <div class="selectes">
                            <label for="finalidad">
                                <p> Finalidad </p>
                            </label>
                            <select name="finalidad" id="finalidad">
                                <option value="" selected disabled>--Seleccione--</option>
                                <?php foreach ($listadoFinalidades as $finalidad) { ?>
                                    <option value="<?php echo $finalidad->id; ?>"><?php echo $finalidad->finalidad; ?></option>
                                <?php } ?>
                            </select>
                            <label for="finalidad">
                                <p> Tipo de propiedad </p>
                            </label>
                            <select name="tipoPropiedad" id="bienes">
                                <option value="" selected disabled>--Seleccione--</option>
                                <?php
                                foreach ($tipoPropiedades as $tipoPropiedad) { ?>
                                    <option value="<?php echo $tipoPropiedad->id; ?>"> <?php echo $tipoPropiedad->tipo_propiedad; ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="btn_filtro ">
                            <button class="btn" type="submit">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="opcionesCards">
        <div class="contenedor">
            <?php
            if ($resultadosFiltro) { ?>
                <section class="tarjetasPropiedades">
                    <h2>Resultados de tu búsqueda</h2>
                    <div class="verMas">
                        <hr class="lienaPequena">
                    </div>
                    <hr>
                    <div class="propiedades">
                        <?php @include 'listadoPropiedades.php'; ?>
                    </div>
                </section>
            <?php } else
            if ($propiedad) { ?>
                <section class="tarjetasPropiedades">
                    <h2>Resultados de tu búsqueda</h2>
                    <div class="verMas">
                        <hr class="lienaPequena">
                    </div>
                    <hr>
                    <div class="propiedades">
                        <?php @include 'listadoPropiedades.php'; ?>
                    </div>
                </section>
            <?php } else { ?>
                <section class="tarjetasPropiedades">
                    <h2>Inmuebles Destacados</h2>
                    <div class="verMas">
                        <hr class="lienaPequena">
                    </div>
                    <hr>
                    <div class="propiedades" id="card_propiedad"></div>
                </section>
            <?php } ?>
        </div>
    </section>
</div>
<?php
$apisAvanzado = "<script src='../build/js/apisAvanzado.js'></script>";
?>