<div class="container-fluid tipoletra p-0">
  
    <h1 class="text-center py-4 fw-bold text-uppercase" style="color:#008080;">Detalles de Todas tus Compras</h1>
    <table class="table table-hover  table-bordered  mb-0">
        <thead>
            <tr class="table-dark">
                <th scope="col">Producto</th>
                <th scope="col">Fecha de la compra</th>
                <th scope="col">Cantidad</th>
                
                <th scope="col">Precio</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody class=" table-group-divider  ">
            <?php $totalCompras = 0?>
            <?php foreach ($ventas as $row) { ?>
                <tr class=" table-primary">
                    <td><?= $row['producto_nombre']; ?></td>
                    
                    <td><?= $row['venta_fecha']; ?></td>
                    <td><?= $row['detalle_cantidad']; ?></td>
                    <td>$ <?= number_format($row['producto_precio'], 0, ',', '.'); ?></td>
                    <td> $ <?= number_format($row['detalle_cantidad'] * $row['detalle_precio'], 0, ',', '.'); ?></td>
                    <?php $totalCompras +=   $row['detalle_cantidad'] * $row['detalle_precio'] ?>
                </tr>
            <?php } ?>
            
        </tbody>
      
    </table>
    <p class="fw-bold bg-black text-white text-center p-3">
                    Gasto total: $ <?= number_format($totalCompras, 0, ',', '.'); ?>
                    </p>
</div>