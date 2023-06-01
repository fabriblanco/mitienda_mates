
    <header>
    <?php $session=session(); ?>
      <nav class="menuedit navbar navbar-expand-lg navbar-dark bg-dark text-center" >
  <div class="container-fluid">
      <a href="#">
      <img src="public/img/descargaaa.png" alt="ddd" height="70" width="150">
      </a>
    <button class="bg-secondary navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mx-5 mb-2 mb-lg-0 fw-bold ">
        <li class="nav-item"> 
        <a class="per nav-link active" aria-current="page" href="<?php echo base_url (' ');  ?>"> Inicio </a> </li>

        <li class="nav-item dropdown ">
          <a class="per nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Productos
          </a>
          <ul class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
            <li><a class="per dropdown-item" href="<?php echo base_url (' productos ');  ?>">General</a></li>
            <li><a class="per dropdown-item" href="#">Termos</a></li>
            <li><a class="per dropdown-item" href="#">Mates</a></li>
            <li><a class="per dropdown-item" href="#">Bombillas</a></li>
            <li><a class="per dropdown-item" href="#">Accesorios</a></li>
          </ul>
        </li>

        <li class="nav-item p-0">
          <a class="per nav-link" href="<?php echo base_url ('quienesSomos');  ?>"> Quienes somos</a>
        </li>
          <li class="nav-item">
            <a class="per nav-link"  href="<?php echo base_url ('comercializacion');  ?>" > Comercializacion</a>
          </li>

          <li class="nav-item">
            <a class=" per nav-link"  href="<?php echo base_url (' contacto ');  ?>">  Contacto </a>
          </li>

          <li class="nav-item">
            <a class="per nav-link"  href="<?php echo base_url (' terminosYcondiciones ');  ?>">
             Terminos y condiciones </a>
          </li>

        </ul>
      

      <?php if (session('login')) { ?>

        
              
      

              <li class="nav-item mb-4 tipoletra">
              
              <a class="per nav-link tipoletra"  href="#"> 
              <i class="fa-solid fa-user tipoletra"> <br>
              <?= $session->get('nombre'); ?>  
              </i> </a>
              </li>

              <li class="nav-item">
              <a class="per mx-2 mb-4 nav-link"  href="#"> 
              <i class="fa-sharp fa-solid fa-cart-shopping"> <br>  Ver </i>   </a>
              </li>
              
              <a  href="<?php echo base_url (' cerrarSesion ');  ?>">
              <button class="tipoletra per btn  btn-secondary btn-secondary-outline" type="button">Salir</button>
              </a>
        


            <?php } else { ?>
              
              

              <li class="nav-item ">
              <a class="per mx-2 mb-4 nav-link"  href="<?php echo base_url (' formRegistro ');  ?>"> 
              <i class="fa-sharp fa-solid fa-cart-shopping">  </i>  </a>
              </li>

              <li class="nav-item mx-2 mb-4">
              <a class="per nav-link"  href="<?php echo base_url (' formRegistro ');  ?>" > <i class="fa-solid fa-user"> Reg</i> </a>
              </li>

              <a  href="<?php echo base_url (' formIniciarSesion ');  ?>">
              <button class="tipoletra per btn  btn-secondary btn-secondary-outline" type="button">Iniciar Sesion</button>
              </a>
              
            <?php } ?>
      
        
    </div>
  </div>
</nav>
</header>
