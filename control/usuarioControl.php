<?php
include_once "../models/usuarioModelo.php";
include_once "../models/pinturaModelo.php";

class categoriasControl
{
  public $nombre;
  public $idCategoria;

  // SE CREA EL METODO
  public function ctrAgregarCategoria()
  {

    $objRespuesta = categoriaModelo::mdlAgregarCategoria($this->nombre);
    echo json_encode($objRespuesta);
  }

  public function ctrListarCategoria()
  {
    $objRespuesta = categoriaModelo::mdlListarCategoria();
    echo json_encode($objRespuesta);
  }

  public function ctrEditarCategoria()
  {
    $objRespuesta = categoriaModelo::mdlEditarCategoria($this->idCategoria, $this->nombre);
    echo json_encode($objRespuesta);
  }

  public function ctrEliminarCategoria()
  {
    $objRespuesta = categoriaModelo::mdlEliminarCategoria($this->idCategoria);
    echo json_encode($objRespuesta);
  }
}

class pinturaControl
{
  public $idCategoria;

  public function ctrListarPintura()
  {
    $objRespuesta = pinturaModelo::mdlListarPintura($this->idCategoria);
    echo json_encode($objRespuesta);
  }
}


if (isset($_POST["regNombre"])) {

  $objUsuarios = new categoriasControl();
  $objUsuarios->nombre = $_POST["regNombre"];

  $objUsuarios->ctrAgregarCategoria();
}

if (isset($_POST["listarCategoria"]) == "OK" || isset($_POST["getCategories"]) == "OK") {
  $objUsuario = new categoriasControl();
  $objUsuario->ctrListarCategoria();
}

if (isset($_POST["editNombre"], $_POST["editCategoria"])) {

  $objUsuarios = new categoriasControl();
  $objUsuarios->idCategoria = $_POST["editCategoria"];
  $objUsuarios->nombre = $_POST["editNombre"];
  $objUsuarios->ctrEditarCategoria();
}

if (isset($_POST['idCategoria'])) {
  $objUsuarios = new categoriasControl();
  $objUsuarios->idCategoria = $_POST["idCategoria"];
  $objUsuarios->ctrEliminarCategoria();
}

if (isset($_POST["getPictures"])) {
  $objUsuarios = new pinturaControl();
  $objUsuarios->idCategoria = $_POST["getPictures"];
  $objUsuarios->ctrListarPintura();
}
