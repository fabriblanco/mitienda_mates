<div class="tipoletra">
<h1 class="text-center">Nuevo Producto</h1>
<div class="row">
     <div class="col-6 mx-auto">
     <?php $validation = \Config\Services::validation(); ?>
     <?php echo form_open_multipart('registra_producto') ?>
              <div class="mb-3">
              <label for="nombre" class="form-label">Nombre: </label>
              <input type="text" name="nombre" class="form-control" placeholder="ingrese Nombre" id="nombre" >
              <?php if($validation->getError('nombre')) { ?>
              <div class="alert alert-danger mt-2">
                <?= $error = $validation->getError ('nombre'); ?>
              </div>
              <?php } ?>
              </div>
              <div class="mb-3">
              <label for="descripcion" class="form-label">Descripcion: </label>
              <input type="text" name="descripcion" class="form-control" placeholder="ingrese descripcion">
              <?php if($validation->getError('descripcion')) { ?>
              <div class="alert alert-danger mt-2">
                <?= $error = $validation->getError ('descripcion'); ?>
              </div>
              <?php } ?>
              </div>
              <div class="mb-3">
                <label for="precio" class="form-label">Precio: </label>
               <input type="text" name="precio" class="form-control" placeholder="ingrese precio" >
               <?php if($validation->getError('precio')) { ?>
              <div class="alert alert-danger mt-2">
                <?= $error = $validation->getError ('precio'); ?>
              </div>
              <?php } ?>
                </div>
                <div class="mb-3">
                <label for="stock" class="form-label">stock: </label>
               <input type="text" name="stock" class="form-control" placeholder="ingrese stock" >
               <?php if($validation->getError('stock')) { ?>
              <div class="alert alert-danger mt-2">
                <?= $error = $validation->getError ('stock'); ?>
              </div>
              <?php } ?>
                </div>
             
                <div class="mb-3">
                <label for="imagen" class="form-label">añadir imagen: 
                </label>
                <input class="form-control" type="file" name="imagen" id="formFile">
                <?php if($validation->getError('imagen')) { ?>
              <div class="alert alert-danger mt-2">
                <?= $error = $validation->getError ('imagen'); ?>
              </div>
              <?php } ?>
                </div>

                <div class="form-group">
                <label for="categoria">Categoria </label>
                <?php
                $lista['0']='seleccione Categoria';
                foreach($categorias as $row){
                    $categoria_id = $row['id_categoria'];
                    $categoria_desc = $row['categoria_descripcion'];
                    $lista[$categoria_id] = $categoria_desc;
                }

                echo form_dropdown('categoria',$lista,'0','class="form-control"');
                ?>
              
             <div class="col-auto mb-2">
             <a href="<?php base_url('registra_producto'); ?> "> <button type="submit" class="btn btn-primary" mb-3 >Agregar Producto </button> </a>
             </div>
              
            
             <?php form_close(); ?>
            </div>
</div>            
