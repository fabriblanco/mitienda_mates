
<section class=" tipoletra my-3">
    <h1 class="text-center fw-bold text-uppercase my-4" style="color:#008080;"> nuestros productos </h1>
    

<table class="table table-hover mb-0 my-3">
        <thead>
            <tr class="table-primary">
                <th scope="col">#ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Descripcion</th>
                <th scope="col">Precio</th>
                <th scope="col">Stock</th>
                <th scope="col">Categoria</th>
                <th scope="col">Imagen</th>
                <th scope="col">Operaciones</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <?php foreach ($producto as $row) { ?>
            
                
                    <tr class="table-info">
                        <th scope="row"><?= $row['id_producto']; ?></th>
                        <td><?= $row['producto_nombre']; ?></td>
                        <td><?= $row['producto_descripcion']; ?></td>
                        <td>$ <?= $row ['producto_precio'];?></td>
                        <td><?= $row['producto_stock']; ?></td>
                        <td><?= $row['categoria_descripcion']; ?></td>
                        <td><img src="<?php echo base_url('public/img/'.$row['producto_imagen']); ?>" width="100px" height="100px" alt=""></td>
                        
                        <td>
                        <?php if ($row['estado_producto'] == 1) { ?>

                        <a href="<?php echo base_url('productoController/eliminar_Producto/'.$row['id_producto']);?>" class="btn btn-dark">Eliminar</a>

                        <?php } else { ?>
                            <a href="<?php echo base_url('productoController/activar_Producto/'.$row['id_producto']);?>" class="btn btn-primary">Activar</a>
                            <?php  } ?>
                        <a href="<?php echo base_url('productoController/editar_Producto/'.$row['id_producto']);?>" class="btn btn-danger">Editar</a>
                        </td>
                    </tr>
                <?php } ?>
        </tbody>
</table>
</section>
