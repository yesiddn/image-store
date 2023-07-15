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
  public $idPintura;
  public $idCategoria;
  public $nombre;
  public $autor;
  public $fecha;
  public $descripcion;
  public $url;

  public function ctrListarPintura()
  {
    $objRespuesta = pinturaModelo::mdlListarPintura($this->idCategoria);
    echo json_encode($objRespuesta);
  }

  public function ctrListarTodasPinturas() {
    $objRespuesta = pinturaModelo::mdlListarTodasPinturas();
    echo json_encode($objRespuesta);
  }

  public function ctrAgregarPintura()
  {
    $objRespuesta = pinturaModelo::mdlAgregarPintura($this->idCategoria, $this->nombre, $this->autor, $this->fecha, $this->descripcion, $this->url);
    echo json_encode($objRespuesta);
  }

  public function ctrEliminarPintura() {
    $objRespuesta = pinturaModelo::mdlEliminarPintura($this->idPintura);
    echo json_encode($objRespuesta);
  }

  public function ctrEditarPintura() {
    $objRespuesta = pinturaModelo::mdlEditarPintura($this->idPintura, $this->nombre, $this->autor, $this->fecha, $this->descripcion, $this->idCategoria, $this->url);
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

if (isset($_POST["listarPinturas"]) == "OK") {
  $objUsuarios = new pinturaControl();
  $objUsuarios->ctrListarTodasPinturas();
}

if (isset($_POST["regNombrePintura"], $_POST["regAutor"], $_POST["regFecha"], $_POST["regDescripcion"], $_POST["regCategory"], $_POST["regUrl"])) {
  $objUsuarios = new pinturaControl();
  $objUsuarios->idCategoria = $_POST["regCategory"];
  $objUsuarios->nombre = $_POST["regNombrePintura"];
  $objUsuarios->autor = $_POST["regAutor"];
  $objUsuarios->fecha = $_POST["regFecha"];
  $objUsuarios->descripcion = $_POST["regDescripcion"];
  $objUsuarios->url = $_POST["regUrl"];
  $objUsuarios->ctrAgregarPintura();
}

if(isset($_POST["idPintura"])) {
  $objUsuarios = new pinturaControl();
  $objUsuarios->idPintura = $_POST["idPintura"];
  $objUsuarios->ctrEliminarPintura();
}

if(isset($_POST["idPintura"], $_POST["edit-nombre"], $_POST["edit-autor"], $_POST["edit-fecha"], $_POST["edit-descripcion"],$_POST["edit-categoria"], $_POST["edit-url"])) {
  $objUsuarios = new pinturaControl();
  $objUsuarios->idPintura = $_POST["idPintura"];
  $objUsuarios->nombre = $_POST["edit-nombre"];
  $objUsuarios->autor = $_POST["edit-autor"];
  $objUsuarios->fecha = $_POST["edit-fecha"];
  $objUsuarios->descripcion = $_POST["edit-descripcion"];
  $objUsuarios->idCategoria = $_POST["edit-categoria"];
  $objUsuarios->url = $_POST["edit-url"];
  $objUsuarios->ctrEditarPintura();
}