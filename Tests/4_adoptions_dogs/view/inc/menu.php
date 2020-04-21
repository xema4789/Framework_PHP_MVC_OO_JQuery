  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <span class="navbar-brand">Ohana dogs</span>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fa fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item" >
            <a class="nav-link" id="<?php if($_GET['module'] === 'home'){echo 'active_menu_color';}else{echo '';} ?>" href="<?php amigable('?module=home&funciton=list_home'); ?>">Inicio</a>
          </li>
          <li class="nav-item" >
            <a class="nav-link" id="<?php if($_GET['module'] === 'adoptions'){echo 'active_menu_color';}else{echo '';} ?>" href="<?php amigable('?module=adoptions&funciton=list_adoptions'); ?>">Adopciones</a>
          </li>
          <li class="nav-item" >
            <a class="nav-link" id="<?php if($_GET['module'] === 'contact'){echo 'active_menu_color';}else{echo '';} ?>" href="<?php amigable('?module=contact&funciton=list_contact'); ?>">Contact</a>
          </li>
          
          <div id="print_menu"></div>
          
        </ul>
      </div>
    </div>
  </nav>

  
    <!-- Page Header -->
    <header class="masthead" style="background-image: url('<?php echo IMG_PATH ?>header.jpg')">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <div class="page-heading">
              <h1>Ohana dogs</h1>
              <span class="subheading">No compres, adopta.</span>
            </div>
          </div>
        </div>
      </div>
    </header>