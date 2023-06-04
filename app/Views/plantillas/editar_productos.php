<div class="container p-3 tipoletra">
    <h2 class="text-center my-3">Editar Productos   </h2>

    <?php $validation = \Config\Services::validation(); ?>
    <?php echo form_open_multipart('/productos_controller/actualizar_Producto') ?> 
    <div class="row gy-4">
        <div class="col-md-6">
            <label for="nombreProducto" class="form-label">Nombre: </label>
            <input type="text" name="nombreProducto" placeholder="Nombre del producto" value="<?= $producto['producto_nombre']; ?>" class="form-control" id="inputText4">
            <?php if ($validation->getError('nombreProducto')) { ?>
                    <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('nombreProducto'); ?>
                    </div>
            <?php } ?>
        </div>
        <div class="col-md-6">
            <label for="categoriaProducto" class="mb-2">Seleccione la Categoria: </label>
            <?php 
                $lista['0'] = 'Seleccione una categoria';
                foreach($categorias as $row) {
                    $lista[$row['id_categoria']] = $row['categoria_descripcion'];
                }
                $sel = $producto['producto_categoria'];
                echo form_dropdown('categoriaProducto', $lista, $sel, 'class="form-control"');
            ?>
        </div>
        <div class="col-12">
            <label for="exampleFormControlTextarea1" for="descripcionProducto" class="form-label">Descripcion del producto</label>
            <textarea class="form-control border border-dark" value="" name="descripcionProducto" id="exampleFormControlTextarea1" rows="3" maxlength="50" placeholder="Descripción del producto"><?= $producto['producto_descripcion']; ?></textarea>
            <?php if ($validation->getError('descripcionProducto')) { ?>
                    <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('descripcionProducto'); ?>
                    </div>
            <?php } ?>
        </div>
        <div class="col-md-4 input-group">
            <label for="precioProducto" class="input-group form-label">Precio del producto</label>
            <span class="input-group-text">$</span>
            <input type="text" name="precioProducto" id="precioProducto" placeholder="Precio del producto" value="<?= number_format($producto['producto_precio'], 0, ',', '.');  ?>" class="form-control" id="inputText4">
            <?php if ($validation->getError('precioProducto')) { ?>
                    <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('precioProducto'); ?>
                    </div>
            <?php } ?>
        </div>
        <div class="col-md-4">
            <label for="stockProducto" class="form-label">Stock</label>
            <input type="number" name="stockProducto" placeholder="Stock" value="<?= $producto['producto_stock']; ?>" class="form-control" id="inputText4">
            <?php if ($validation->getError('stockProducto')) { ?>
                    <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('stockProducto'); ?>
                    </div>
            <?php } ?>
        </div>
        <div class="col-md-6">
            <label for="imagenProducto" class="form-label d-block">Imagen</label>
            <input class="form-control" name="imagenProducto"  type="file" id="formFile">
            <img class="m-5" src="<?php echo base_url('/public/img/ejemplos/'. $producto['producto_imagen']); ?>" width="100" height="100" alt="">
            <?php if ($validation->getError('imagenProducto')) { ?>
                    <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('imagenProducto'); ?>
                    </div>
            <?php } ?>
        </div>
        <?php echo form_hidden('id_producto', $producto['id_producto']);?>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
        </div>








    <?php form_close(); ?>
</div>