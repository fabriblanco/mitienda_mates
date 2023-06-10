
<div class="tipoletra text-center">
<?php $cart = \Config\Services::cart(); ?>
<h1 class="text-center mt-3 fw-bold text-uppercase" style="color:#008080;"> Carrito de Compras </h1>
<h3 > <a href="productos" class=" btn btn-outline-danger text-center mt-3 fw-bold text-uppercase text-decoration-none" style="color:#008080;" role="button"> Continuar comprando </a> </h3>
<?php if (session()->getFlashdata('MensajeDeCompra')) { ?>
                <div class='alert alert-danger alert-dismissible fade show text-center py-3 my-3' role='alert' id='mensaje'>
                    <?= session()->getFlashdata('MensajeDeCompra'); ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
<table class="table table-hover mb-0">
        <?php if ($cart->contents() == NULL) { ?>
            <div class="text-center mb-5">

                <h4 class="alert alert-danger" style="color:#008080;">El carrito esta vacio</h4>
                
                <a href="<?php echo base_url('productos'); ?>" class="btn btn-primary"> Ver Productos Disponibles </a>

                <?php }?>
            </div>
        <table id="mytable" class="table table-bordered table-striped fw-bold">
        <?php if ($cart1 = $cart->contents()):  ?>
        <thead>
            <tr class="table-dark">
                <th scope="col">N° Item</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Subtotal</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>

        <tbody>
        <?php
        $total=0;
        $i =1;
        foreach($cart1 as $item):?>
        <tr>
        <td> <?php echo $i++;?> </td>
        <td> <?php echo $item['name'];?> </td>
        <td> <?php echo $item['price'];?> </td>
        <td> <?php echo $item['qty'];?>  </td>
        <td><?php echo $item['subtotal']; $total = $total + $item['subtotal'] ?> </td>

        <td> <?php echo anchor('eliminar_item/'.$item['rowid'],'ELIMINAR');?>  </td> 
        </tr>
        
        <?php endforeach; ?>
        <tr>
            <td>Total Compra:$ <?php echo $total; ?> </td>
            <td><a href="<?php echo base_url('vaciar_carrito/all'); ?>"> <button type="submit" class="btn btn-primary" mb-3> VACIAR CARRITO </button> </a></td>
        </tr>

        <a href="<?php echo base_url('comprar/'.$total); ?>" class="btn btn-outline-danger text-center my-3 fw-bold ms-5" style="color:#008080;">Comprar</a>
        <?php endif; ?>
        </tbody>
        </tbody>
</table>