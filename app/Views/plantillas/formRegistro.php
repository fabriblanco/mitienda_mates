

<div class="tipoletra">
<h1 class="text-center">Registrarse</h1>
<div class="row">
     <div class="col-6 mx-auto">
     <?php $validation = \Config\Services::validation(); ?>
          <form class="" action="<?php echo base_url ('persona') ?>" method="POST">
              <div class="mb-3">
              <label for="nombre" class="form-label">Nombre(*): </label>
              <input type="text" name="nombre" class="form-control" placeholder="ingrese Nombre" id="nombre" >
              <?php if($validation->getError('nombre')) { ?>
              <div class="alert alert-danger mt-2">
                <?= $error = $validation->getError ('nombre'); ?>
              </div>
              <?php } ?>
              </div>
              <div class="mb-3">
              <label for="apellido" class="form-label">Apellido(*): </label>
              <input type="text" name="apellido" class="form-control" placeholder="ingrese apellido" id="apellido" >
              <?php if($validation->getError('apellido')) { ?>
              <div class="alert alert-danger mt-2">
                <?= $error = $validation->getError ('apellido'); ?>
              </div>
              <?php } ?>
              </div>
              <div class="mb-3">
                <label for="mail" class="form-label">Email(*): </label>
               <input type="email" name="mail" class="form-control" placeholder="ingrese email" id="mail" >
               <?php if($validation->getError('mail')) { ?>
              <div class="alert alert-danger mt-2">
                <?= $error = $validation->getError ('mail'); ?>
              </div>
              <?php } ?>
                </div>
              <div class="mb-3">
              <label for="password" class="form-label">Contraseña(*): </label>
              <input type="password" name="password" class="form-control" placeholder="ingrese contraseña" >
              <?php if($validation->getError('password')) { ?>
              <div class="alert alert-danger mt-2">
                <?= $error = $validation->getError ('password'); ?>
              </div>
              <?php } ?>
              </div>
              
             <div class="col-auto mb-2">
             <button type="submit" class="btn btn-primary" mb-3> Registrarse </button>
             </div>
              
            
             </form>
            </div>
</div>            