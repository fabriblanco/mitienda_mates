<div class="container text-center tipoletra">

<?php $session = session(); ?>
<?php if (session('login')) { ?>
    <div class="container-fluid">
        <h1 class="text-center mt-3 fw-bold" style="color:#008080;">BIENVENIDO
        <h3 class="text-center fw-bold" style="color:#008080;"> <?= $session->get('nombre'); ?>  </h3>
        </h1>
        <ul class="vstack gap-3 p-5">
            <h4 class="letrabebas fw-bold text-primary ">Tus datos personales: </h4>
            <li class="p-2 border border-1 fondo-sombra"><strong> Nombre : </strong> <?= $session->get('nombre'); ?></li>
            <li class="p-2 border border-1 fondo-sombra"><strong> Apellido : </strong><?= $session->get('apellido'); ?></li>
            <li class="p-2 border border-1 fondo-sombra"><strong> Correo : </strong> <?= $session->get('email'); ?></li>
            <li>
            <a href="<?php echo base_url('cerrarSesion'); ?>" class="btn btn-primary my-5"><i class="bi bi-box-arrow-right"></i> Cerrar Sesión</i></a>
            </li>
        </ul>
    </div>
<?php } ?>

</div>
