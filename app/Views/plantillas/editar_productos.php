<div class="container p-3 tipoletra fw-bold">
    
    <h2 class="text-center mt-3 fw-bold text-uppercase p-3" style="color:#008080;"> editar producto </h2>

    <?php $validation = \Config\Services::validation(); ?>
    <?php echo form_open_multipart('/productoController/actualizar_Producto') ?> 
    <div class="row gy-4">
        <div class="col-md-6">
            <label for="nombre" class="form-label">Nombre: </label>
            <input type="text" name="nombre" placeholder="Nombre del producto" value="<?= $producto['producto_nombre']; ?>" class="form-control" id="inputText4">
            <?php if ($validation->getError('nombre')) { ?>
                    <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('nombre'); ?>
                    </div>
            <?php } ?>
        </div>
        <div class="col-md-6">
            <label for="categoria" class="mb-2">Seleccione la Categoria: </label>
            <?php 
                $lista['0'] = 'Seleccione una categoria';
                foreach($categorias as $row) {
                    $lista[$row['id_categoria']] = $row['categoria_descripcion'];
                }
                $sel = $producto['producto_categoria'];
                echo form_dropdown('categoria', $lista, $sel, 'class="form-control"');
            ?>
        </div>
        <div class="col-12">
            <label for="exampleFormControlTextarea1" for="descripcion" class="form-label">Descripcion del producto</label>
            <textarea class="form-control border border-dark" value="" name="descripcion" id="exampleFormControlTextarea1" rows="3" maxlength="5000" placeholder="Descripción del producto"><?= $producto['producto_descripcion']; ?></textarea>
            <?php if ($validation->getError('descripcion')) { ?>
                    <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('descripcion'); ?>
                    </div>
            <?php } ?>
        </div>
        <div class="col-md-4 input-group">
            <label for="precio" class="input-group form-label">Precio del producto</label>
            <span class="input-group-text">$</span>
            <input type="text" name="precio" id="precioProducto" placeholder="Precio del producto" value=" <?= number_format($producto['producto_precio'], 0, ',', '.');  ?>" class="form-control" id="inputText4">
            <?php if ($validation->getError('precio')) { ?>
                    <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('precio'); ?>
                    </div>
            <?php } ?>
        </div>
        <div class="col-md-4">
            <label for="stock" class="form-label">Stock</label>
            <input type="number" name="stock" placeholder="Stock" value="<?= $producto['producto_stock']; ?>" class="form-control" id="inputText4">
            <?php if ($validation->getError('stock')) { ?>
                    <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('stock'); ?>
                    </div>
            <?php } ?>
        </div>
        <div class="col-md-6">
            <label for="imagen" class="form-label d-block">Imagen</label>
            <input class="form-control" name="imagen"  type="file" id="formFile">
            <img class="m-5" src="<?php echo base_url('/public/img/'. $producto['producto_imagen']); ?>" width="100" height="100" alt="">
            <?php if ($validation->getError('imagen')) { ?>
                    <div class='alert alert-danger mt-2'>
                        <?= $error = $validation->getError('imagen'); ?>
                    </div>
            <?php } ?>
        </div>
        <?php echo form_hidden('id_producto', $producto['id_producto']);?>

        <div class="col-12 text-center">
            <button type="submit" class="btn btn-outline-danger text-center fw-bold text-uppercase text-decoration-none" style="color:#008080;">Confirmar Modificacion</button>
        </div>
        </div>








    <?php form_close(); ?>
</div>