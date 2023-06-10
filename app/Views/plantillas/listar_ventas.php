<section class=" tipoletra my-3">
    <h1 class="text-center fw-bold text-uppercase my-4" style="color:#008080;"> ventas </h1>
    

<table class="table table-hover mb-0 my-3">
        <thead>
            <tr class="table-primary">
                <th scope="col">#ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo</th>
                <th scope="col">Fecha</th>
                <th scope="col">Monto</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($ventas as $row) { ?>
            
                
                    <tr class="table-info">
                        <th scope="row"><?= $row['id_venta']; ?></th>
                        <td><?= $row['persona_nombre']; ?></td>
                        <td><?= $row['persona_email']; ?></td>
                        <td><?= $row['venta_fecha'] ?></td>

                        <td> $ <?= number_format($row['venta_monto'], 0, ',', '.'); ?></td>
                        <td>
                        <a href="<?php echo base_url('detalles/' . $row['id_venta']); ?>" class="btn btn-danger">Ver detalle</a>
                        </td>
                    </tr>
                <?php } ?>
        </tbody>
</table>
</section>
