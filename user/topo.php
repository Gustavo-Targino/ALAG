<?php
    include("./inc/config.inc.php");
?>

<!-- <header>
        <nav class="navbar navbar-expand-sm align-items-baseline">
            <a href="?pg=principal" class="navbar-brand">
                <img src="./assets/Logo_User.png" alt="logo_alag" id="logo"> 
                <strong>- ALAG <i class="fa-solid fa-triangle-exclamation"></i></strong> 
            </a>

            <div class="navbar-nav">
                <a href="?pg=principal" class="nav-item nav-link" id="home-menu"><strong>Home</strong></a>
                <a href="?pg=faleconosco" class="nav-item nav-link" id="talk-menu"><strong>Denúncia</strong></a>
                <a href="?pg=faleconosco" class="nav-item nav-link" id="talk-menu"><strong>Previsão</strong></a>
                <a href="?pg=faleconosco" class="nav-item nav-link" id="talk-menu"><strong>Sobre</strong></a>
        </nav>
    </div>
</header> -->

<!-- <nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
    
  </div>
</nav> -->

<nav class="navbar navbar-dark">
  <div class="container-fluid">
  <a class="navbar-brand" href="?pg=home">
          <img src="./assets/Logo_User.png" alt="Logo" id="logo" class="d-inline-block align-text-center">
          <strong>- ALAG <i class="fa-solid fa-triangle-exclamation"></i></strong> 
        </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
    <i class="fa-solid fa-bars"></i>
    </button>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">MENU</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="?pg=home">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="?pg=registrar">Registrar Alagamento</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="#">Previsão do tempo</a>
          </li>
          
      </div>
    </div>
  </div>
</nav>


