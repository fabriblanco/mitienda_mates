
<h3 class="tipoletra text-uppercase fw-bold mb-4 text-center mt-3" style="color:#0D6EFD;">
 Contacto</h3>

<div class="tipoletra container">
<div class="row">
     <div class="col-6 mx-auto">
     <h5 class="text-uppercase fw-bold "> formulario probbb utlii </h5>
        <?php $validation = \Config\Services::validation(); ?>
          <form class="" action="<?php echo base_url ('consulta') ?>" method="POST">
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
              <label for="apellido" class="form-label">Apellido: </label>
              <input type="text" name="apellido" class="form-control" placeholder="ingrese apellido" id="apellido" >
              <?php if($validation->getError('apellido')) { ?>
              <div class="alert alert-danger mt-2">
                <?= $error = $validation->getError('apellido'); ?>
              </div>
              <?php } ?>
              </div>
              <div class="mb-3">
                <label for="mail" class="form-label">Email: </label>
               <input type="email" name="mail" class="form-control" placeholder="ingrese email" id="mail" >
               <?php if($validation->getError('mail')) { ?>
              <div class="alert alert-danger mt-2">
                <?= $error = $validation->getError('mail'); ?>
              </div>
              <?php } ?>
                </div>
              <div class="mb-3">
              <label for="motivo" class="form-label">Motivo: </label>
              <input type="text" name="motivo" class="form-control" placeholder="ingrese motivo" id="motivo" >
              </div>
              
              <div class="mb-3 mt-3">
                <label for="comenn" class="form-label">Consulta: </label>
                <textarea name="mensaje" class="form-control" rows="3" placeholder="Comentarios" id="comenn"> </textarea>
                </div>
              
             <div class="col-auto">
             <button type="submit" class="btn btn-primary" mb-3> Enviar</button>
             </div>
              
            
             </form>
            </div>
         
          

    
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 mx-auto mb-md-0 mb-4 text-center">
                    <!-- Links -->
                    <h5 class="text-uppercase fw-bold mb-4 " >
                        Acercate
                    </h5>
                    <p><i class="fas fa-home me-3"></i> Hipolito Yrigoyen 1287</p>

                    <h5 class="text-uppercase fw-bold mb-4 " >
                        Escribinos
                    </h5>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        mate_mos_ho@gmail.com
                    </p>
                    <h5 class="text-uppercase fw-bold mb-4 " >
                        llamanos
                    </h5>
                    <p> <i class="fas fa-phone me-3"></i> + 3782 - 453000</p>
                    
        </div>

    
</div>
<hr>
</div>


        <div class= " tipoletra text-center container-fluid my-4">
        
        <h4 class="text-uppercase fw-bold mb-4 mt-2"> Encontranos </h4>     

         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.0166978463303!2d-58.83729892537984!3d-27.468739516663728!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94456d0e94c72371%3A0x5e61f6bbfde8307a!2sFreddo%20Corrientes!5e0!3m2!1ses!2sar!4v1682468312468!5m2!1ses!2sar"
          width="100%"
         height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
         </iframe>    

        </div>
