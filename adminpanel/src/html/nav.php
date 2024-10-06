<?php
  $ini = parse_ini_file("/tkf_ini/comserver.ini");
?>
<ul class="nav nav-tabs nav-pills nav-fill">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="/ba41f6a85c1ee640d7b7ee303aa6312320b9a55a">Start</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle active"data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Datenbank</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="/database-dashboard">Dashboard</a></li>
      <li><a class="dropdown-item" href="#">Wetterdaten-DB</a></li>
      <li><a class="dropdown-item" href="#">Datenbankupdate</a></li>
      <li><a class="dropdown-item" href="#">Rechte</a></li>
      <li><a class="dropdown-item" href="/400718fa87db640d6cf852a8c1f7f8ac475de3c4">Datenbanken erstellen</a></li>
    </ul>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Datenbank Connector</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="/crontab">CrontabUI</a></li>
      <li><a class="dropdown-item" href="#">Tinkerforge Gateway</a></li>
      <li><a class="dropdown-item" href="/connector_config">Connector Konfiguration</a></li>
      <li><a class="dropdown-item" href="#">Connector Update</a></li>
    </ul>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Webserver</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="#">Dashboard</a></li>
      <li><a class="dropdown-item" href="/webapp_config">Konfiguration</a></li>
      <li><a class="dropdown-item" href="#">Logs</a></li>
      <li><a class="dropdown-item" href="#">Webserver Update</a></li>
    </ul>
  </li>
  <li class="nav-item dropdown" active>
    <a class="nav-link dropdown-toggle active" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Panel Einstellungen</a>
    <ul class="dropdown-menu">
      <li><a class="dropdown-item" href="/panel_settings">Einstellungen</a></li>
      <li><a class="dropdown-item" href="#">Logout</a></li>
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link active" href="#">About</a>
  </li>
</ul>