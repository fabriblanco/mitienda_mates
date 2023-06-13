<section class="container-fluid tipoletra my-3">
    <h1 class="text-center fw-bold text-uppercase my-4" style="color:#008080;"> detalles de la venta </h1>

    <table class=" table table-hover  table-bordered">
        <thead>
            <tr class="table-dark">

                <th scope="col">#ID Producto</th>
                <th scope="col">ID venta</th>
                <th scope="col">Fecha</th>
                <th scope="col">Nombre Producto</th>
                <th scope="col">Nombre Cliente</th>
                <th scope="col">Correo Cliente</th>

                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Subtotal</th>


            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($detalles as $row) { ?>


                <tr class="table-primary">
                    <th scope="row"><?= $row['id_producto']; ?></th>
                    <th scope="row"><?= $row['id_venta']; ?></th>
                    <td><?= $row['venta_fecha'] ?></td>
                    <td><?= $row['producto_nombre']; ?></td>
                    <td><?= $ventas['persona_nombre']; ?></td>
                    <td><?= $ventas['persona_email']; ?></td>
                    <td>$ <?= $row['producto_precio']; ?></td>
                    <td> <?= $row['detalle_cantidad']; ?></td>
                    <td>$ <?= $row['detalle_precio']; ?></td>





                </tr>
            <?php } ?>


        </tbody>
    </table>
    <p class="fw-bold bg-black text-white text-center p-3"> Monto total: $ <?= number_format($ventas['venta_monto'], 0, ',', '.'); ?>
        </p>
</section>
