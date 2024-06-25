<main class="welcome">
    <div class="slider">
        <ul id="slider_img">
        </ul>
    </div>
    <div class="conten_info">
        <ul id="slider_txt">
        </ul>
    </div>
</main>

<section class="contenedor">
    <div class="filtro">
        <h1>Encuentra tu nuevo hogar</h1>

        <form class="opciones_filtro" action="/avanzado" method="POST">
            <div class="selectes">
                <div class="opcion_filtro elemento">
                    <label for="finalidad">Finalidad</label>
                    <select name="finalidad" id="finalidad">
                        <option value="" selected disabled>--Seleccione--</option>
                        <?php foreach ($listadoFinalidad as $finalidad) { ?>
                            <option value="<?php echo $finalidad->id; ?>"><?php echo $finalidad->finalidad; ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="opcion_filtro elemento">
                    <label for="tipoPropiedad">Tipo de propiedad</label>
                    <select name="tipoPropiedad" id="bienes">
                        <option value="" selected disabled>--Seleccione--</option>
                        <?php
                        foreach ($listadoTiposPropiedades as $tipoPropiedad) { ?>
                            <option value="<?php echo $tipoPropiedad->id; ?>"> <?php echo $tipoPropiedad->tipo_propiedad; ?> </option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="opciones_av">
                <div class="opcion_filtro crecer">
                    <input type="text" id="ciudad" name="ciudad" size="30" maxlength="30" placeholder="Ingresa la Ubicación">
                </div>
                <div class="opcion_filtro ">
                    <button type="submit"><i class='bx bx-search-alt-2'></i></button>
                </div>
                <div class="opcion_filtro ">
                    <a href="/avanzado">Avanzado</a>
                </div>
            </div>
        </form>
    </div>
</section>

<div class="contenedor">
    <section class="tarjetasPropiedades">
        <h2>Inmuebles con ofertas</h2>
        <div class="verMas">
            <a href="/avanzado">Ver mas <i class='bx bxs-right-arrow'></i></a>
            <hr class="lienaPequena">
        </div>
        <hr>
        <div class="propiedades" id="card_propiedad_oferta"></div>
    </section>
</div>

<div class="contenedor">
    <section class="tarjetasPropiedades">
        <h2>Inmuebles Destacados</h2>
        <div class="verMas">
            <a href="/avanzado">Ver mas <i class='bx bxs-right-arrow'></i></a>
            <hr class="lienaPequena">
        </div>
        <hr>
        <div class="propiedades" id="card_propiedad_dest"></div>
    </section>
</div>
<?php
$appPaginas = "<script src='../build/js/appPaginas.js'></script>";
$apisPagPrin = "<script src='../build/js/apisPagPrin.js'></script>";
$slider = "<script src='../build/js/slider.js'></script>";
?>