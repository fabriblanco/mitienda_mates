<section class=" tipoletra my-3">
    <h1 class="text-center fw-bold text-uppercase my-4" style="color:#008080;"> nuestros productos </h1>
    
    <p><?= $ventas['persona_nombre']; ?></p>
    <p><?= $ventas['venta_monto']; ?></p>

<table class="table table-hover mb-0 my-3">
        <thead>
            <tr class="table-primary">

                <th scope="col">#ID</th>
                <th scope="col">ID venta</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Subtotal</th>
           

            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($detalles as $row) { ?>
            
                
                    <tr class="table-info">
                        <th scope="row"><?= $row['id_producto']; ?></th>
                        <th scope="row"><?= $row['id_venta']; ?></th>
                        
                        <td><?= $row['producto_nombre']; ?></td>
                        <td>$ <?= $row ['producto_precio'];?></td>
                        <td>$ <?= $row ['detalle_cantidad'];?></td>
                        <td>$ <?= $row ['detalle_precio'];?></td>



                    </tr>
                <?php } ?>
        </tbody>
</table>
</section>
