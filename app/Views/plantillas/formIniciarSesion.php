<div class="tipoletra">
<h1 class="text-center">Iniciar Sesion</h1>
<div class="row">
     <div class="col-6 mx-auto">
     <?php $validation = \Config\Services::validation(); ?>
          <form class="" action="<?php echo base_url ('login') ?>" method="POST">  
          <?php if (session()->getFlashdata('mensaje')) { ?>
                <div class='alert alert-danger alert-dismissible fade show text-center py-3 my-3' role='alert' id='mensaje'>
                    <?= session()->getFlashdata('mensaje'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>

              <div class="mb-3">
                <label for="correo" class="form-label">Email: </label>
               <input type="email" name="correo" class="form-control" placeholder="ingrese email" id="mail" >
               <?php if($validation->getError('correo')) { ?>
              <div class="alert alert-danger mt-2">
                <?= $error = $validation->getError ('correo'); ?>
              </div>
              <?php } ?>
                </div>
              <div class="mb-3">
              <label for="pass" class="form-label">Contraseña: </label>
              <input type="password" name="pass"class="form-control" placeholder="ingrese contraseña" >
              <?php if($validation->getError('pass')) { ?>
              <div class="alert alert-danger mt-2">
                <?= $error = $validation->getError ('pass'); ?>
              </div>
              <?php } ?>
              </div>
           
              
             <div class="col-auto mb-2">
             <button type="submit" class="btn btn-primary" mb-3> Iniciar Sesion </button>
             </div>
              
            
             </form>
            </div>
</div>            