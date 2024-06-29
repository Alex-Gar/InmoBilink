<div id="paso-1" class="seccion_tabs">
    <div class="formularioContactanos displayBlock">
        <div class="contenedor">
            <fieldset>
                <legend>Información de la propiedad</legend>

                <div class="camposFormulario">
                    <div class="campoContactanos">
                        <label for="id_propietario">Selecciona el propietario</label>
                        <select name="propiedad[id_propietario]" id="id_propietario">
                            <option value="" disabled selected>--Seleccione--</option>
                            <?php foreach ($propietarios as $propietario) { ?>
                                <option <?php echo $propiedad->id_propietario === $propietario->id ? 'selected' : ''; ?>
                                    value="<?php echo s($propietario->id); ?>">
                                    <?php echo s($propietario->nombre . ' ' . $propietario->p_apellido . ' ' . $propietario->s_apellido); ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="campoContactanos">
                        <label for="tipo_propiedad">Tipo propiedad</label>
                        <select name="propiedad[tipo_propiedad]" id="tipo_propiedad">
                            <option value="" disabled selected>--Seleccione--</option>
                            <?php foreach ($tiposPropiedades as $tipoPropiedad) { ?>
                                <option <?php echo $propiedad->tipo_propiedad === $tipoPropiedad->id ? 'selected' : ''; ?>
                                    value="<?php echo s($tipoPropiedad->id); ?>">
                                    <?php echo s($tipoPropiedad->tipo_propiedad); ?> </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="campoContactanos">
                        <label for="precio">Precio</label>
                        <input type="number" name="propiedad[precio]" id="precio" placeholder="Valor de la propiedad"
                            value="<?php echo s($propiedad->precio); ?>">
                    </div>

                    <div class="conjuntoCampos">
                        <div class="campoContactanos">
                            <div class="toggle_label">
                                <div class="info_t">
                                    <label for="">Oferta</label>
                                    <div class="toggle">
                                        <input <?php echo ($propiedad->oferta == 1) ? 'checked' : ''; ?> type="checkbox"
                                            id="oferta" class="toggle_o" name="propiedad[oferta]" value="1">
                                        <label for="oferta">
                                            <span class="thumb"></span>
                                        </label>
                                        <div class="light"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="campoContactanos">
                            <div class="toggle_label">
                                <div class="info_t">
                                    <label for="">Disponible</label>
                                    <div class="toggle">
                                        <input <?php echo ($propiedad->disponible == 1) ? 'checked' : ''; ?>
                                            type="checkbox" id="disponible" class="toggle_o"
                                            name="propiedad[disponible]" value="1">
                                        <label for="disponible">
                                            <span class="thumb"></span>
                                        </label>
                                        <div class="light"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="campoContactanos">
                        <label for="precio_oferta">Precio oferta</label>
                        <input type="number" name="propiedad[precio_oferta]" id="precio_oferta"
                            placeholder="Valor de la propiedad en oferta"
                            value="<?php echo s($propiedad->precio_oferta); ?>">
                    </div>
                    <div class="campoContactanos">
                        <label for="paquete">Finalidad de la propiedad</label>
                        <select name="propiedad[finalidad]" id="paquete">
                            <option value="" disabled selected>--Seleccione--</option>
                            <?php foreach ($finalidades as $finalidad) { ?>
                                <option <?php echo $propiedad->finalidad === $finalidad->id ? 'selected' : ''; ?>
                                    value="<?php echo s($finalidad->id); ?>"> <?php echo s($finalidad->finalidad); ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="campoContactanos">
                    <label for="descripcion">Descripción de la propiedad</label>
                    <textarea name="propiedad[descripcion]" id="descripcion" cols="30" rows="10"
                        placeholder="Ingresa una descripción acerca de la propiedad, es importante agregarla para que el publico conozca acerca de ella."><?php echo $propiedad->descripcion; ?></textarea>
                </div>
            </fieldset>
        </div>
    </div>
</div>

<div id="paso-2" class="seccion_tabs">
    <div class="formularioContactanos displayBlock">
        <div class="contenedor">
            <fieldset>
                <legend>Características exteriores</legend>
                <div class="instruciones">
                    <p>Las características exteriores se refieren a las áreas circundantes a la propiedad que pueden ser
                        de interés para el cliente. Estas son zonas a las que el comprador puede acceder o utilizar, y
                        que añaden valor a la propiedad.</p>
                    <p>Seleccione las opciones que correspondan a la propiedad.</p>
                </div>

                <div class="camposFormulario">
                    <div class="campoContactanos">
                        <label for="metros_cuadrados">Metros cuadrados de la propiedad</label>
                        <input type="text" name="propiedad[metros_cuadrados]" id="metros_cuadrados"
                            placeholder="M² de la propiedad" value="<?php echo s($propiedad->metros_cuadrados); ?>">
                    </div>

                    <div class="campoContactanos">
                        <div class="toggle_label">
                            <div class="info_t">
                                <label for="">Alberca</label>
                                <div class="toggle">
                                    <input <?php echo ($propiedad->alberca) ? 'checked' : ''; ?> type="checkbox"
                                        id="alberca" class="toggle_o" name="propiedad[alberca]" value="1">
                                    <label for="alberca">
                                        <span class="thumb"></span>
                                    </label>
                                    <div class="light"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="conjuntoCampos">
                        <div class="campoContactanos">
                            <div class="toggle_label">
                                <div class="info_t">
                                    <label for="">Juegos infantiles</label>
                                    <div class="toggle">
                                        <input <?php echo ($propiedad->juegos_infantiles) ? 'checked' : ''; ?>
                                            type="checkbox" id="juegos_infantiles" class="toggle_o"
                                            name="propiedad[juegos_infantiles]" value="1">
                                        <label for="juegos_infantiles">
                                            <span class="thumb"></span>
                                        </label>
                                        <div class="light"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="campoContactanos">
                            <div class="toggle_label">
                                <div class="info_t">
                                    <label for="">Areas deportivas</label>
                                    <div class="toggle">
                                        <input <?php echo ($propiedad->areas_deportivas) ? 'checked' : ''; ?>
                                            type="checkbox" id="areas_deportivas" class="toggle_o"
                                            name="propiedad[areas_deportivas]" value="1">
                                        <label for="areas_deportivas">
                                            <span class="thumb"></span>
                                        </label>
                                        <div class="light"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="conjuntoCampos">
                        <div class="campoContactanos">
                            <div class="toggle_label">
                                <div class="info_t">
                                    <label for="">Seguridad</label>
                                    <div class="toggle">
                                        <input <?php echo ($propiedad->seguridad) ? 'checked' : ''; ?> type="checkbox"
                                            id="seguridad" class="toggle_o" name="propiedad[seguridad]" value="1">
                                        <label for="seguridad">
                                            <span class="thumb"></span>
                                        </label>
                                        <div class="light"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="campoContactanos">
                            <div class="toggle_label">
                                <div class="info_t">
                                    <label for="">Elevador</label>
                                    <div class="toggle">
                                        <input <?php echo ($propiedad->elevador) ? 'checked' : ''; ?> type="checkbox"
                                            id="elevador" class="toggle_o" name="propiedad[elevador]" value="1">
                                        <label for="elevador">
                                            <span class="thumb"></span>
                                        </label>
                                        <div class="light"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </fieldset>
        </div>
    </div>
</div>

<div id="paso-3" class="seccion_tabs">
    <div class="formularioContactanos displayBlock">
        <div class="contenedor">
            <fieldset>
                <legend>Características interiores</legend>
                <div class="instruciones">
                    <p>Las características interiores se refieren a los espacios y elementos dentro de la propiedad que
                        pueden ser de interés para el cliente. Estas son áreas que el comprador puede utilizar y
                        disfrutar, y que contribuyen al valor y la funcionalidad de la propiedad.</p>
                    <p>Seleccione las opciones que correspondan a la propiedad.</p>
                </div>
                <div class="camposFormulario">
                    <div class="campoContactanos">
                        <label for="wc">Numero de baños</label>
                        <input type="number" name="propiedad[wc]" id="wc" placeholder="ingresa el numero de baños"
                            value="<?php echo s($propiedad->wc); ?>">
                    </div>
                    <div class="campoContactanos">
                        <label for="habitaciones">Numero de habitaciones</label>
                        <input type="number" name="propiedad[habitaciones]" id="habitaciones"
                            placeholder="Ingresa el numero de habitaciones"
                            value="<?php echo s($propiedad->habitaciones); ?>">
                    </div>
                    <div class="campoContactanos">
                        <label for="estacionamientos">Estacionamiento(s)</label>
                        <input type="number" name="propiedad[estacionamientos]" id="estacionamientos"
                            placeholder="Ingresa el numero de estacionamientos"
                            value="<?php echo s($propiedad->estacionamientos); ?>">
                    </div>
                    <div class="campoContactanos">
                        <div class="toggle_label">
                            <div class="info_t">
                                <label for="">Balcón</label>
                                <div class="toggle">
                                    <input <?php echo ($propiedad->balcon) ? 'checked' : ''; ?> type="checkbox"
                                        id="balcon" class="toggle_o" name="propiedad[balcon]" value="1">
                                    <label for="balcon">
                                        <span class="thumb"></span>
                                    </label>
                                    <div class="light"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="campoContactanos">
                        <div class="toggle_label">
                            <div class="info_t">
                                <label for="">Cuarto de servicio</label>
                                <div class="toggle">
                                    <input <?php echo ($propiedad->cuarto_servicio) ? 'checked' : ''; ?> type="checkbox"
                                        id="cuarto_servicio" class="toggle_o" name="propiedad[cuarto_servicio]"
                                        value="1">
                                    <label for="cuarto_servicio">
                                        <span class="thumb"></span>
                                    </label>
                                    <div class="light"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="campoContactanos">
                        <div class="toggle_label">
                            <div class="info_t">
                                <label for="">Terraza</label>
                                <div class="toggle">
                                    <input <?php echo ($propiedad->terraza) ? 'checked' : ''; ?> type="checkbox"
                                        id="terraza" class="toggle_o" name="propiedad[terraza]" value="1">
                                    <label for="terraza">
                                        <span class="thumb"></span>
                                    </label>
                                    <div class="light"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>

<div id="paso-4" class="seccion_tabs">
    <div class="formularioContactanos displayBlock">
        <div class="contenedor">
            <fieldset>
                <legend>Servicios incluidos</legend>

                <div class="camposFormulario">
                    <div class="conjuntoCampos">
                        <div class="campoContactanos">
                            <div class="toggle_label">
                                <div class="info_t">
                                    <label for="">Agua</label>
                                    <div class="toggle">
                                        <input <?php echo ($propiedad->agua) ? 'checked' : ''; ?> type="checkbox"
                                            id="agua" class="toggle_o" name="propiedad[agua]" value="1">
                                        <label for="agua">
                                            <span class="thumb"></span>
                                        </label>
                                        <div class="light"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="campoContactanos">
                            <div class="toggle_label">
                                <div class="info_t">
                                    <label for="">Electricidad</label>
                                    <div class="toggle">
                                        <input <?php echo ($propiedad->electricidad) ? 'checked' : ''; ?>
                                            type="checkbox" id="electricidad" class="toggle_o"
                                            name="propiedad[electricidad]" value="1">
                                        <label for="electricidad">
                                            <span class="thumb"></span>
                                        </label>
                                        <div class="light"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="conjuntoCampos">
                        <div class="campoContactanos">
                            <div class="toggle_label">
                                <div class="info_t">
                                    <label for="">Internet</label>
                                    <div class="toggle">
                                        <input <?php echo ($propiedad->internet) ? 'checked' : ''; ?> type="checkbox"
                                            id="internet" class="toggle_o" name="propiedad[internet]" value="1">
                                        <label for="internet">
                                            <span class="thumb"></span>
                                        </label>
                                        <div class="light"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="campoContactanos">
                            <div class="toggle_label">
                                <div class="info_t">
                                    <label for="">Teléfono</label>
                                    <div class="toggle">
                                        <input <?php echo ($propiedad->telefono) ? 'checked' : ''; ?> type="checkbox"
                                            id="telefono" class="toggle_o" name="propiedad[telefono]" value="1">
                                        <label for="telefono">
                                            <span class="thumb"></span>
                                        </label>
                                        <div class="light"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="conjuntoCampos">
                        <div class="campoContactanos">
                            <div class="toggle_label">
                                <div class="info_t">
                                    <label for="">Cable</label>
                                    <div class="toggle">
                                        <input <?php echo ($propiedad->cable) ? 'checked' : ''; ?> type="checkbox"
                                            id="cable" class="toggle_o" name="propiedad[cable]" value="1">
                                        <label for="cable">
                                            <span class="thumb"></span>
                                        </label>
                                        <div class="light"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="campoContactanos">
                            <div class="toggle_label">
                                <div class="info_t">
                                    <label for="">Amueblada</label>
                                    <div class="toggle">
                                        <input <?php echo ($propiedad->amueblada) ? 'checked' : ''; ?> type="checkbox"
                                            id="amueblada" class="toggle_o" name="propiedad[amueblada]" value="1">
                                        <label for="amueblada">
                                            <span class="thumb"></span>
                                        </label>
                                        <div class="light"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </fieldset>
        </div>
    </div>
</div>

<div id="paso-5" class="seccion_tabs">
    <div class="formularioContactanos displayBlock">
        <div class="contenedor">
            <fieldset>
                <legend>Ubicación</legend>
                <div class="camposFormulario">
                    <div class="campoContactanos">
                        <label for="estado">Estado</label>
                        <input type="text" name="ubicacion[estado]" id="estado"
                            placeholder="Ingresa el nombre del estado" value="<?php echo s($ubicacion->estado); ?>">
                    </div>
                    <div class="campoContactanos">
                        <label for="municipio">Municipio</label>
                        <input type="text" name="ubicacion[municipio]" id="municipio"
                            placeholder="Ingresa el nombre del municipio"
                            value="<?php echo s($ubicacion->municipio); ?>">
                    </div>
                    <div class="campoContactanos">
                        <label for="localidad">Localidad</label>
                        <input type="text" name="ubicacion[localidad]" id="localidad"
                            placeholder="Ingresa el nombre de la localidad"
                            value="<?php echo s($ubicacion->localidad); ?>">
                    </div>
                    <div class="campoContactanos">
                        <label for="colonia">Colonia</label>
                        <input type="text" name="ubicacion[colonia]" id="colonia"
                            placeholder="Ingresa el nombre de la colonia" value="<?php echo s($ubicacion->colonia); ?>">
                    </div>
                    <div class="campoContactanos">
                        <label for="calle">Calle</label>
                        <input type="text" name="ubicacion[calle]" id="calle"
                            placeholder="Ingresa el nombre de la calle" value="<?php echo s($ubicacion->calle); ?>">
                    </div>
                    <div class="campoContactanos">
                        <label for="no_exterior">N° Exterior</label>
                        <input type="number" name="ubicacion[no_exterior]" id="no_exterior"
                            placeholder="Ingresa el numero exterior" value="<?php echo s($ubicacion->no_exterior); ?>">
                    </div>
                    <div class="campoContactanos">
                        <label for="no_interior">N° Interior</label>
                        <input type="number" name="ubicacion[no_interior]" id="no_interior"
                            placeholder="Ingresa el numero interior" value="<?php echo s($ubicacion->no_interior); ?>">
                    </div>
                </div>
            </fieldset>
        </div>
    </div>
</div>

<div id="paso-6" class="seccion_tabs">
    <div class="formularioContactanos displayBlock">
        <div class="contenedor">
            <fieldset>
                <legend>Imágenes</legend>

                <div class="camposFormulario">
                    <div class="campoContactanos imgCenter">
                        <div class="container-input">
                            <?php if ($imagenes->img1) { ?>
                                <picture>
                                    <!--  <source srcset="../build/img/imgP/codexiusSinFondo.avif" type="image/avif">
                                                <source srcset="../build/img/imgP/codexiusSinFondo.webp" type="image/webp">
                                                <source srcset="../build/img/imgP/codexiusSinFondo.jpeg" type="image/jpeg">-->
                                    <img loading="lazy" class="img_tb"
                                        src="<?php echo '../build/img/imgDb/' . $imagenes->img1; ?>"
                                        alt="<?php echo $imagenes->img1; ?>" width="600" height="400">
                                </picture>
                            <?php } ?>
                            <label for="img1">Imagen N° 1</label>
                            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagenes[img1]">

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
                    <div class="campoContactanos imgCenter">
                        <div class="container-input">
                            <?php if ($imagenes->img2) { ?>
                                <picture>
                                    <!--  <source srcset="../build/img/imgP/codexiusSinFondo.avif" type="image/avif">
                                                <source srcset="../build/img/imgP/codexiusSinFondo.webp" type="image/webp">
                                                <source srcset="../build/img/imgP/codexiusSinFondo.jpeg" type="image/jpeg">-->
                                    <img loading="lazy" class="img_tb"
                                        src="<?php echo '../build/img/imgDb/' . $imagenes->img2; ?>"
                                        alt="<?php echo $imagenes->img2; ?>" width="600" height="400">
                                </picture>
                            <?php } ?>
                            <label for="">Imagen N° 2</label>
                            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagenes[img2]">
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
                    <div class="campoContactanos imgCenter">
                        <div class="container-input">
                            <?php if ($imagenes->img3) { ?>
                                <picture>
                                    <!--  <source srcset="../build/img/imgP/codexiusSinFondo.avif" type="image/avif">
                                                <source srcset="../build/img/imgP/codexiusSinFondo.webp" type="image/webp">
                                                <source srcset="../build/img/imgP/codexiusSinFondo.jpeg" type="image/jpeg">-->
                                    <img loading="lazy" class="img_tb"
                                        src="<?php echo '../build/img/imgDb/' . $imagenes->img3; ?>"
                                        alt="<?php echo $imagenes->img3; ?>" width="600" height="400">
                                </picture>
                            <?php } ?>
                            <label for="">Imagen N° 3</label>
                            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagenes[img3]">
                            <!--   <input type="file" name="imagenes[img3]" id="file-7" class="inputfile inputfile-7" accept="image/jpeg, image/png" />
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
                    <div class="campoContactanos imgCenter">
                        <div class="container-input">
                            <?php if ($imagenes->img4) { ?>
                                <picture>
                                    <!--  <source srcset="../build/img/imgP/codexiusSinFondo.avif" type="image/avif">
                                                <source srcset="../build/img/imgP/codexiusSinFondo.webp" type="image/webp">
                                                <source srcset="../build/img/imgP/codexiusSinFondo.jpeg" type="image/jpeg">-->
                                    <img loading="lazy" class="img_tb"
                                        src="<?php echo '../build/img/imgDb/' . $imagenes->img4; ?>"
                                        alt="<?php echo $imagenes->img4; ?>" width="600" height="400">
                                </picture>
                            <?php } ?>
                            <label for="">Imagen N° 4</label>
                            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagenes[img4]">
                            <!--   <input type="file" name="imagenes[img4]" id="file-7" class="inputfile inputfile-7" accept="image/jpeg, image/png" />
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
                    <div class="campoContactanos imgCenter">
                        <div class="container-input">
                            <?php if ($imagenes->img5) { ?>
                                <picture>
                                    <!--  <source srcset="../build/img/imgP/codexiusSinFondo.avif" type="image/avif">
                                                <source srcset="../build/img/imgP/codexiusSinFondo.webp" type="image/webp">
                                                <source srcset="../build/img/imgP/codexiusSinFondo.jpeg" type="image/jpeg">-->
                                    <img loading="lazy" class="img_tb"
                                        src="<?php echo '../build/img/imgDb/' . $imagenes->img5; ?>"
                                        alt="<?php echo $imagenes->img5; ?>" width="600" height="400">
                                </picture>
                            <?php } ?>
                            <label for="">Imagen N° 5</label>
                            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagenes[img5]">
                            <!-- <input type="file" name="imagenes[img5]" id="file-7" class="inputfile inputfile-7" accept="image/jpeg, image/png" />
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