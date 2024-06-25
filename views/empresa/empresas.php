<section class="tabla_visual contenedor">

    <div class="contenedor">
        <h2>Información de las empresas</h2>
        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

        <table id="table_id" class="display tabla">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre empresa</th>
                    <th>Nombre</th>
                    <th>E-mail</th>
                    <th>Teléfono</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="contenido_tabla">
                <?php foreach ($array_objetos as $empresa) { ?>
                    <tr>
                        <td><?php echo $empresa->id; ?></td>
                        <td><?php echo $empresa->nombre_empresa; ?></td>
                        <td><?php echo $empresa->nombre_propietario; ?></td>
                        <td><?php echo $empresa->email; ?></td>
                        <td><?php echo $empresa->tel; ?></td>
                        <td class="acciones">
                            <div class="">
                                <a href="/bienes-r/editar?id=<?php echo $empresa->id; ?>"><i class='icon bx bx-edit-alt'></i></a>
                            </div>
                            <div class="">
                                <form method="POST" class="w-100" action="/bienes-r/eliminar">
                                    <input type="hidden" name="id" value="<?php echo $empresa->id; ?>">
                                    <input type="hidden" name="tipo" value="empresa">
                                    <button type="submit"><i class='icon bx bx-trash'></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>