<header>
  <?php $cart = \Config\Services::cart(); ?>
  <?php $session = session(); ?>
  <nav class="menuedit navbar navbar-expand-lg navbar-dark bg-dark text-center tipoletra">
    <div class="container-fluid">
      <a href="">
        <img src="<?php echo base_url(' public/img/descargaaa.png');  ?>" alt="ddd" height="70" width="150">
      </a>
      <button class="bg-secondary navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav me-auto mx-3 mb-lg-0 fw-bold tipoletra ">
          <li class="nav-item">
            <a class="per nav-link active" aria-current="page" href="<?php echo base_url(' ');  ?>"> Inicio </a>
          </li>

          <li class="nav-item dropdown ">
            <a class="per nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Productos
            </a>
            <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
              <li><a class="per dropdown-item" href="<?php echo base_url(' productos/0 ');  ?>">General</a></li>
              <li><a class="per dropdown-item" href="<?php echo base_url(' productos/1 ');  ?>">Termos</a></li>
              <li><a class="per dropdown-item" href="<?php echo base_url(' productos/2 ');  ?>">Mates</a></li>
              <li><a class="per dropdown-item" href="<?php echo base_url(' productos/3 ');  ?>">Bombillas</a></li>
            </ul>
          </li>

          <li class="nav-item ">
            <a class="per nav-link" href="<?php echo base_url('quienesSomos');  ?>"> Quienes somos</a>
          </li>
          <li class="nav-item">
            <a class="per nav-link" href="<?php echo base_url('comercializacion');  ?>"> Comercializacion</a>
          </li>

          <li class="nav-item">
            <a class=" per nav-link" href="<?php echo base_url(' contacto ');  ?>"> Contacto </a>
          </li>

          <li class="nav-item">
            <a class="per nav-link" href="<?php echo base_url(' terminosYcondiciones ');  ?>">
              Terminos y condiciones </a>
          </li>

        </ul>


        <?php if (session('login')) { ?>


          <li class="nav-item fw-bold tipoletra mb-3">
            <a class="per nav-link " href="<?php echo base_url('compras/' . session()->id) ?>">
              Mis Compras </a>
          </li>

          <li class="nav-item mb-4 tipoletra p-2">

            <a class="per nav-link tipoletra" href="<?php echo base_url('datosUser');  ?>">
              <i class="fa-solid fa-user tipoletra"> <br>
                <?= $session->get('nombre'); ?>
              </i> </a>
          </li>

          <li class="nav-item">
            <a class="per mx-2 mb-4  nav-link" href="<?php echo base_url(' ver_carrito ');  ?>">
              <i class="bi bi-cart2 position-relative " style="font-size: 25px">
                <span class="position-absolute translate-middle translate-middle badge rounded-pill bg-danger text-white" style="font-size: 0.6em;">
                  <?= $cart->totalitems(); ?>
                </span>
              </i> </a>
          </li>

      
          <li class="nav-item ms-4 mb-3 ">
            <a href="<?php echo base_url(' cerrarSesion ');  ?>">
              <button type="button" class=" tipoletra text-white btn btn-outline-danger">Cerrar Sesion</button>
            </a>
          </li>


        <?php } else { ?>



          <li class="nav-item ">
            <a class="per mx-2 mb-4 nav-link" href="<?php echo base_url(' formRegistro ');  ?>">
              <i class="fa-sharp fa-solid fa-cart-shopping"> </i> </a>
          </li>

          <li class="nav-item mx-2 mb-4">
            <a class="per nav-link" href="<?php echo base_url(' formRegistro ');  ?>"> <i class="fa-solid fa-user"> Reg</i> </a>
          </li>

          <a href="<?php echo base_url(' formIniciarSesion ');  ?>">
            <button class="tipoletra per btn  btn-secondary btn-secondary-outline" type="button">Iniciar Sesion</button>
          </a>

        <?php } ?>


      </div>
    </div>
  </nav>
</header>