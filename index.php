<?php

include_once "./views/moduls/header.php";
include_once "./views/moduls/navbar.php";
if (isset($_GET["ruta"])) {
  if (
    $_GET["ruta"] == "admin"
    || $_GET["ruta"] == "home"
  ) {
    include_once "./views/moduls/" . $_GET["ruta"] . ".php";
  } else {
    include_once "./views/moduls/404.php";
  }
}

include_once "./views/moduls/footer.php";
