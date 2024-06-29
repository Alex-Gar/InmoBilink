<div id="paso-1" class="seccion_tabs">
    <div class="formularioContactanos">
        <div class="contenedor">
            <fieldset>
                <legend>Información de la propiedad</legend>

                <div class="camposFormulario">
                    <div class="campoContactanos">
                        <label for="id_propietario">Selecciona el propietario</label>
                        <?php foreach ($propietarios as $propietario) {
                            if ($empresa->id_propietario === $propietario->id) { ?>
                                <div class="inputFalse">
                                    <?php echo s($propietario->nombre . ' ' . $propietario->p_apellido . ' ' . $propietario->s_apellido); ?>
                                </div>
                            <?php }
                        } ?>
                    </div>
                    <div class="campoContactanos">
                        <label for="nombre_empresa">Nombre de la inmobiliaria</label>
                        <input type="text" name="empresa[nombre_empresa]" id="nombre_empresa"
                            placeholder="Valor de la propiedad" value="<?php echo s($empresa->nombre_empresa); ?>">
                    </div>
                    <div class="campoContactanos">
                        <label for="descripcion">Descripción de la inmobiliaria</label>
                        <textarea name="empresa[descripcion]" id="descripcion" cols="30" rows="10"
                            placeholder="Ingresa una descripción acerca de la propiedad, es importante agregarla para que el publico conozca acerca de ella."><?php echo $empresa->descripcion; ?></textarea>
                    </div>
                    <div class="campoContactanos">
                        <label for="slogan">Slogan</label>
                        <textarea name="empresa[slogan]" id="slogan" cols="30" rows="10"
                            placeholder="Ingresa un slogan que defina su vision como vendedores"><?php echo $empresa->slogan; ?></textarea>
                    </div>
            </fieldset>
        </div>
    </div>
</div>

<div id="paso-2" class="seccion_tabs">
    <div class="formularioContactanos">
        <div class="contenedor">
            <fieldset>
                <legend>Ubicación de la inmobiliaria</legend>
                <div class="camposFormulario">
                    <div class="campoContactanos">
                        <label for="pais">pais</label>
                        <input type="text" name="empresa[pais]" id="pais" placeholder="Ingresa el nombre del pais"
                            value="<?php echo s($empresa->pais); ?>">
                    </div>
                    <div class="campoContactanos">
                        <label for="estado">Estado</label>
                        <input type="text" name="empresa[estado]" id="estado" placeholder="Ingresa el nombre del estado"
                            value="<?php echo s($empresa->estado); ?>">
                    </div>
                    <div class="campoContactanos">
                        <label for="municipio">Municipio</label>
                        <input type="text" name="empresa[municipio]" id="municipio"
                            placeholder="Ingresa el nombre del municipio" value="<?php echo s($empresa->municipio); ?>">
                    </div>
                    <div class="campoContactanos">
                        <label for="localidad">Localidad</label>
                        <input type="text" name="empresa[localidad]" id="localidad"
                            placeholder="Ingresa el nombre de la localidad"
                            value="<?php echo s($empresa->localidad); ?>">
                    </div>
                    <div class="campoContactanos">
                        <label for="colonia">Colonia</label>
                        <input type="text" name="empresa[colonia]" id="colonia"
                            placeholder="Ingresa el nombre de la colonia" value="<?php echo s($empresa->colonia); ?>">
                    </div>
                    <div class="campoContactanos">
                        <label for="calle">Calle</label>
                        <input type="text" name="empresa[calle]" id="calle" placeholder="Ingresa el nombre de la calle"
                            value="<?php echo s($empresa->calle); ?>">
                    </div>
                    <div class="campoContactanos">
                        <label for="no_exterior">N° Exterior</label>
                        <input type="number" name="empresa[no_exterior]" id="no_exterior"
                            placeholder="Ingresa el numero exterior" value="<?php echo s($empresa->no_exterior); ?>">
                    </div>
                    <div class="campoContactanos">
                        <label for="no_interior">N° Interior</label>
                        <input type="number" name="empresa[no_interior]" id="no_interior"
                            placeholder="Ingresa el numero interior" value="<?php echo s($empresa->no_interior); ?>">
                    </div>
                    <div class="campoContactanos">
                        <label for="codigo_postal">Código postal</label>
                        <input type="number" name="empresa[codigo_postal]" id="codigo_postal"
                            placeholder="Ingresa el numero interior" value="<?php echo s($empresa->codigo_postal); ?>">
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>

<div id="paso-3" class="seccion_tabs">
    <div class="formularioContactanos">
        <div class="contenedor">
            <fieldset>
                <legend>Imágenes</legend>

                <div class="camposFormulario">
                    <div class="campoContactanos">
                        <div class="container-input">
                            <?php if ($empresa->img1) { ?>
                                <picture>
                                    <!-- <source srcset="../build/img/imgDb/inmobilink1.avif" type="image/avif">
                                    <source srcset="../build/img/imgDb/inmobilink1.webp" type="image/webp">
                                    <source srcset="../build/img/imgDb/inmobilink1.png" type="image/png">
                                    <img loading="lazy" src="../build/img/imgDb/inmobilink1.png" alt="Logo InmoBilink" width="600" height="400"> -->
                                    <img loading="lazy" src="<?php echo '../build/img/imgDb/' . $empresa->img1; ?>"
                                        alt="<?php echo $empresa->img1; ?>" width="600" height="400">
                                </picture>
                            <?php } ?>
                            <label for=" img1">Imagen N° 1</label>
                            <input type="file" id="imagen" accept="image/jpeg, image/png" name="empresa[img1]">

                            <!--   <input type="file" name="imagenes[img1]" id="file-7" class="inputfile inputfile-7" accept="image/jpeg, image/png" />
                                        <label for="file-7">
                                            <span class="iborrainputfile"></span>
                                            <strong>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17">
                                                    <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                                                </svg>
                                                Seleccionar archivo
                                            </strong>
                                        </label>-->
                        </div>
                    </div>
                    <div class="campoContactanos">
                        <div class="container-input">
                            <?php if ($empresa->img2) { ?>
                                <picture>
                                    <!-- <source srcset="../build/img/imgDb/inmobilink1.avif" type="image/avif">
                                    <source srcset="../build/img/imgDb/inmobilink1.webp" type="image/webp">
                                    <source srcset="../build/img/imgDb/inmobilink1.png" type="image/png">
                                    <img loading="lazy" src="../build/img/imgDb/inmobilink1.png" alt="Logo InmoBilink" width="600" height="400"> -->
                                    <img loading="lazy" src="<?php echo '../build/img/imgDb/' . $empresa->img2; ?>"
                                        alt="<?php echo $empresa->img2; ?>" width="600" height="400">
                                </picture>
                            <?php } ?>
                            <label for="">Imagen N° 2</label>
                            <input type="file" id="imagen" accept="image/jpeg, image/png" name="empresa[img2]">
                            <!--   <input type="file" name="imagenes[img2]" id="file-7" class="inputfile inputfile-7" accept="image/jpeg, image/png" />
                                        <label for="file-7">
                                            <span class="iborrainputfile"></span>
                                            <strong>
                                                <svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17">
                                                    <path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path>
                                                </svg>
                                                Seleccionar archivo
                                            </strong>
                                        </label> -->
                        </div>
                    </div>

                </div>