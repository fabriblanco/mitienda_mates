



<section class=" tipoletra my-5">
    <h2 class="text-center my-5"> Nuestros Productos </h2>
    <div class="container text-center">
        <div class="row justify-content-around">
            <?php foreach ($productos as $row) { ?>
                <li class="cent col-xl-4 col-lg-4 col-md-12 col-sm-12 p-4">
                    <div class="card text-center p-2 editcard" style="width: 18rem;">
                        <img src="<?php echo base_url('public/img/' . $row['producto_imagen']); ?>"  class="card-img-top card-image" alt="...">
                        <div class="card-body mt-2">
                            <h5 class="card-title fw-bold my-3 "><?= $row['producto_nombre']; ?></h5>
                            <p><?= substr($row['producto_descripcion'], 0, 20) . "..."; ?></p>
                            <span class="d-block card-price fw-bold ">$ <?= number_format($row['producto_precio'], 2, ',', '.'); ?></span>

                            <?php if (session()->login) { ?>
                                <?php if (session()->perfil == 1) { ?>
                                    <a href="#" class="btn btn-primary"> Comprar </a> 
                                <?php } else { ?> 
                                <?php echo form_open('add_cart');
                                echo form_hidden('id', $row['id_producto']);
                                echo form_hidden('nombre', $row['producto_nombre']);
                                echo form_hidden('precio', $row['producto_precio']);
                                ?>

                                <?php echo form_submit('comprar','agregar al carrito',"class = 'btn btn-primary my-4'"); ?>
                                <?php echo form_close(); ?> 

                                <?php } ?>

                                <?php } else { ?>
                                 
                                  <a href="<?php echo base_url('formIniciarSesion'); ?>" class="btn btn-primary"> Comprar </a> 
                                    
                               <?php } ?> 


                           
                        </div>
                    </div>
                </li>
            <?php } ?>


        </div>
    </div>

</section>

