
<section class=" tipoletra my-5">
    <h2 class="text-center my-5"> Nuestros Productos </h2>
    

<table class="table table-hover mb-0">
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
 
                
                    <tr class="table-primary ">
                        <th scope="row"><?= $row['id_producto']; ?></th>
                        <td><?= $row['producto_nombre']; ?></td>
                        <td><?= $row['producto_descripcion']; ?></td>
                        <td>$ <?= $row ['producto_precio'];?></td>
                        <td><?= $row['producto_stock']; ?></td>
                        <td><?= $row['producto_categoria']; ?></td>
                        <td><img src="<?php echo base_url('public/img/' . $row['producto_imagen']); ?>" width="100px" height="100px" alt=""></td>
                        <td>
                            <a href="<?php echo base_url('Producto_controller/editarProducto/'.$row['id_producto']);?>" class="btn btn-danger">Editar</a>
                            <a href="<?php echo base_url('Producto_controller/eliminarProducto/'.$row['id_producto']);?>" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                <?php } ?>
        </tbody>
</table>
</section>
