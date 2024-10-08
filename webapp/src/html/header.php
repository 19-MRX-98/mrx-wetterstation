
<?php
 $wsname = $ini["wsname"];
?>
<nav class="navbar bg-light ">
    <div class="container-fluid">
      <a class="navbar-brand" href="/"><?php echo $wsname ?></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
        <span class="navbar-toggler-icon">
          <img src ="/src/pictures/icons8/icons8-menü-50.png"style="width:36px;height:36px"></img>
        </span>
      </button>
      <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <span class="badge text-bg-primary">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Wetterstation Menü</h5>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        </span>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/"><span class="badge text-bg-secondary"><img src= "/src/pictures/icons8/icons8-startseite-64.png" style="width:36px;height:36px"></img>Home</a></span>
            </li>     
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <span class="badge text-bg-secondary"><img src= "/src/pictures/icons8/icons8-mehr-50.png"style="width:36px;height:36px"></img>Erweiterte Wetterdaten
                </a></span>
                <ul class="dropdown-menu">
                  <font color ="black">Jahreswerte</font>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="/actual_year">Jahreswerte <?php echo date("Y") ?></a></li>
                  <li><a class="dropdown-item disabled" href="/jahr2024" >Jahreswerte 2024</a></li>
                  <li><a class="dropdown-item" href="/jahr2023">Jahreswerte 2023</a></li>
                  <li><a class="dropdown-item" href="/jahr2022">Jahreswerte 2022</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <font color ="black">Niederschlag</font>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item disabled" href="/rain24">Niederschlag 2024</a></li>
                  <li><a class="dropdown-item" href="/rain">Niederschlag 2024</a></li>
                  <li><a class="dropdown-item" href="/rain23">Niederschlag 2023</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  <font color ="black">Agrarwetter</font>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="/gruenlandtemperatur">Grünlandtemperatursumme</a></li>
                </ul>
              </li>
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/about"><span class="badge text-bg-secondary"><img src= "/src/pictures/icons8/icons8-über-48.png"style="width:36px;height:36px"></img>About</a></span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
