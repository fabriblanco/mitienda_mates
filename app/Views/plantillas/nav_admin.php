<header>
  <?php $session = session(); ?>
  <nav class="menuedit navbar navbar-expand-lg navbar-dark bg-dark text-center ">
    <div class="container-fluid">
      <a href="#">
        <img src="<?php echo base_url('public/img/descargaaa.png');  ?>" alt="ddd" height="70" width="150">
      </a>
      <button class="bg-secondary navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class=" mt-2 navbar-nav mx-auto mb-lg-0 fw-bold">

          <li class="nav-item ">
            <a class="per nav-link" href="<?php echo base_url(' consultas_admin ');  ?>"> Ver Consultas </a>
          </li>
          <li class="nav-item">
            <a class="per nav-link" href="<?php echo base_url(' productosAdmin ');  ?>">Ver Productos</a>
          </li>
          <li class="nav-item">
            <a class="per nav-link" href="<?php echo base_url('listar_ventas ');  ?>"> Listar Ventas </a>
          </li>

          <li class="nav-item">
            <a class=" per nav-link" href="<?php echo base_url('carga_productos');  ?>"> Registrar Producto </a>
          </li>

          <li class="nav-item">
            <a class="per nav-link" href="<?php echo base_url(' gestionProd');  ?>"> Gestionar Productos </a>
          </li>


          <?php if (session('login')) { ?>





            <li class="mx-4 mb-4 tipoletra">
            <a class="per nav-link tipoletra" href="<?php echo base_url('datosUser');  ?>">
              <i class="fa-solid fa-user tipoletra"> <br>
                <?= $session->get('nombre'); ?>
              </i> </a>
          </li>


          <li class="nav-item mx-auto ">
            <a href="<?php echo base_url(' cerrarSesion ');  ?>">
              <button type="button" class=" tipoletra text-white btn btn-outline-danger">Cerrar Sesion</button>
            </a>
          </li>

        </ul>


<?php } else { ?>


<a href="<?php echo base_url(' formIniciarSesion ');  ?>">
  <button class="tipoletra per btn  btn-secondary btn-secondary-outline" type="button">Iniciar Sesion</button>
</a>

<?php } ?>


         
      </div>
</header>