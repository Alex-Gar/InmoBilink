    <section class="tabla_visual contenedor">
        <h2>Información propiedades</h2>
        <div class="contenedor">

            <?php
            if ($rol === '2' || $rol === '3' || $rol === '4') { ?>
                    <table id="table_id" class="display tabla">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tipo propiedad</th>
                                <th>Imagen</th>
                                <th>Precio</th>
                                <th>Oferta</th>
                                <th>Disponible</th>
                                <th>Fecha registro</th>
                                <th>Finalidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="contenido_tabla">
                            <?php foreach ($pPropietarios as $pPropietario) { ?>
                                <tr>
                                    <td><?php echo 'ALP' . $pPropietario->propiedad_id; ?></td>
                                    <td><?php echo $pPropietario->tipo_propiedad_nombre; ?></td>
                                    <td>
                                        <picture>
                                            <!-- <source srcset="../build/img/imgP/codexiusSinFondo.avif" type="image/avif">
                                        <source srcset="../build/img/imgP/codexiusSinFondo.webp" type="image/webp">
                                        <source srcset="../build/img/imgP/codexiusSinFondo.jpeg" type="image/jpeg"> -->
                                            <img loading="lazy" class="img_tb" src="<?php echo '../build/img/imgDb/' . $pPropietario->img1; ?>" alt="<?php echo $pPropietario->img1; ?>" width="600" height="400">
                                        </picture>
                                    </td>
                                    <td><?php echo formatearMoneda($pPropietario->precio); ?></td>
                                    <td><?php echo $pPropietario->oferta; ?></td>
                                    <td><?php echo $pPropietario->disponible; ?></td>
                                    <td><?php echo $pPropietario->fecha_registro; ?></td>
                                    <td><?php echo $pPropietario->finalidad_nombre; ?></td>
                                    <td class="acciones">
                                        <div class="">
                                            <a href="/propiedad/editar?id=<?php echo $pPropietario->propiedad_id; ?>"><i class='icon bx bx-edit-alt'></i></a>
                                        </div>
                                        <div class="">
                                            <form method="POST" class="w-100" action="/propiedad/eliminar">
                                                <input type="hidden" name="id" value="<?php echo $pPropietario->propiedad_id; ?>">
                                                <input type="hidden" name="tipo" value="propiedad">
                                                <button type="submit"><i class='icon bx bx-trash'></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
            <?php } else { ?>
                <table id="table_id" class=" tabla">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre vendedor</th>
                            <th>E-mail</th>
                            <th>Teléfono</th>
                            <th>Tipo propiedad</th>
                            <th>Status</th>
                            <th>Fecha registro</th>
                            <th>Finalidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="contenido_tabla">

                        <?php foreach ($array_objetos as $value) : ?>
                            <?php
                            // Buscar el tipo de propiedad
                            $tipoPropi = '';
                            foreach ($tiposPropiedades as $tipoPropiedad) {
                                if ($value->tipo_propiedad == $tipoPropiedad->id) {
                                    $tipoPropi = $tipoPropiedad->tipo_propiedad;
                                    break;
                                }
                            }

                            // Buscar la finalidad
                            $finali = '';
                            foreach ($finalidades as $finalidad) {
                                if ($value->finalidad == $finalidad->id) {
                                    $finali = $finalidad->finalidad;
                                    break;
                                }
                            }
                            ?>
                            <tr>
                                <td><?php echo 'ALP' . $value->id; ?></td>
                                <td><?php echo $value->nombre_propietario; ?></td>
                                <td><?php echo $value->email; ?></td>
                                <td><?php echo $value->tel; ?></td>
                                <td><?php echo $tipoPropi; ?></td>
                                <td><?php echo $value->disponible == 1 ? 'Disponible' : 'Vendido'; ?></td>
                                <td><?php echo $value->fecha_registro; ?></td>
                                <td><?php echo $finali; ?></td>
                                <td class="acciones">
                                    <div class="">
                                        <a href="/propiedad/editar?id=<?php echo $value->id; ?>"><i class='icon bx bx-edit-alt'></i></a>
                                    </div>
                                    <div class="">
                                        <form method="POST" class="w-100" action="/propiedad/eliminar">
                                            <input type="hidden" name="id" value="<?php echo $value->id; ?>">
                                            <input type="hidden" name="tipo" value="propiedad">
                                            <button type="submit"><i class='icon bx bx-trash'></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </section>