<?php
include_once "conexion.php";

class pinturaModelo {
  public static function mdlListarPintura($idCategoria) {
    $listarPintura = null;

    try {
      $objRespuesta = conexion::conectar()->prepare("SELECT p.id As pictureId, p.nombre AS pictureName, p.autor AS pictureAuthor, p.fechaPublicacion AS pictureDate, p.descripcion AS pictureDescription, p.url AS pictureUrl FROM pinturas p, categorias c WHERE p.categoria = :idCategoria AND p.categoria = c.id");
      $objRespuesta->bindParam(":idCategoria", $idCategoria);
      $objRespuesta->execute();
      $listarPintura = $objRespuesta->fetchAll();
      $objRespuesta = null;
    } catch (Exception $e) {
      $listarPintura = $e->getMessage();
    }
    return $listarPintura;
  }
}