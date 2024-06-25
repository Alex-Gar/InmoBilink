<section class="tabla_visual contenedor">
    <div class="contenedor">
        <h2>Información propietarios</h2>

        <table id="table_id" class="display tabla">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>E-mail</th>
                    <th>Rol</th>
                    <th>Teléfono</th>
                    <th>Registro</th>
                    <th>Fecha cierre</th>
                    <th>Paquete</th>
                    <th>Status</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="contenido_tabla">
                <?php
                foreach ($propietarios as $propietario) { ?>
                    <tr>
                        <td><?php echo $propietario->id; ?></td>
                        <td><?php echo $propietario->nombre . ' ' . $propietario->p_apellido . ' ' .  $propietario->s_apellido; ?></td>
                        <td><?php echo $propietario->email; ?></td>
                        <td><?php echo $propietario->rol_user; ?></td>
                        <td><?php echo $propietario->telefono; ?></td>
                        <td><?php echo $propietario->fecha_registro; ?></td>
                        <td><?php echo $propietario->fecha_cierre; ?></td>
                        <td><?php echo $propietario->paquete; ?></td>
                        <td><?php echo $propietario->status_pago; ?></td>
                        <td class="acciones">
                            <div class="">
                                <a href="/propietarios/editar?id=<?php echo $propietario->id; ?>"><i class='icon bx bx-edit-alt'></i></a>
                            </div>
                            <div class="">
                                <form method="POST" class="w-100" action="/propietarios/eliminar">
                                    <input type="hidden" name="id" value="<?php echo $propietario->id; ?>">
                                    <input type="hidden" name="tipo" value="propietarios">
                                    <button type="submit"><i class='icon bx bx-trash'></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php  } ?>
            </tbody>
        </table>
    </div>
</section>