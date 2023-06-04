
<header>
    <?php $session=session(); ?>
      <nav class="menuedit navbar navbar-expand-lg navbar-dark bg-dark text-center justify-content-around" >
  <div class="container-fluid">
      <a href="#">
      <img src="public/img/descargaaa.png" alt="ddd" height="70" width="150">
      </a>
    <button class="bg-secondary navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <ul class="navbar-nav me-auto mx-5 mb-2 mb-lg-0 fw-bold ">

        <li class="nav-item p-0">
          <a class="per nav-link" href="#"> Ver Consultas </a>
        </li>
          <li class="nav-item">
            <a class="per nav-link"  href="<?php echo base_url (' productosAdmin ');  ?>" >Ver Productos</a>
          </li>
          <li class="nav-item">
            <a class="per nav-link"  href="#" > Listar Ventas </a>
          </li>

          <li class="nav-item">
            <a class=" per nav-link"  href="<?php echo base_url ('carga_productos');  ?>"> Registrar Producto </a>
          </li>

          <li class="nav-item">
            <a class="per nav-link"  href="#"> Gestionar Productos </a>
          </li>
          <li class="nav-item mb-4 tipoletra">
              
              <a class="per nav-link tipoletra"  href="#"> 
              <i class="fa-solid fa-user tipoletra"> <br>
              <?= $session->get('nombre'); ?>  
              </i> </a>
              </li>
              <li class="nav-item ">
              <a  href="<?php echo base_url (' cerrarSesion ');  ?>">
              <button class="tipoletra per btn  btn-secondary btn-secondary-outline" type="button">Salir</button>
              </a>
              </li>

        </ul>
    </div>
</header>
