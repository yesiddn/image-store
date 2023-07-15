<?php

include_once "conexion.php";

class categoriaModelo
{

  public static function mdlAgregarCategoria($nombre)
  {

    $mensaje = array();
    try {
      $objRespuesta = conexion::conectar()->prepare("INSERT INTO categorias(nombre)VALUES(:nombre)");
      $objRespuesta->bindParam(":nombre", $nombre);

      if ($objRespuesta->execute()) {
        $mensaje = array("codigo" => "200", "mensaje" => "Categoria agregada correctamente");
      } else {
        $mensaje = array("codigo" => "425", "mensaje" => "No se ha podido agregar la categoria");
      }
    } catch (Exception $e) {
      $mensaje = array("codigo" => "425", "mensaje" => $e->getMessage());
    }
    return $mensaje;
  }

  public static function mdlListarCategoria()
  {
    $listarCategoria = null;

    try {
      $objRespuesta = conexion::conectar()->prepare("SELECT * FROM categorias");
      $objRespuesta->execute();
      $listarCategoria = $objRespuesta->fetchAll();
      $objRespuesta = null;
    } catch (Exception $e) {
      $listarCategoria = $e->getMessage();
    }
    return $listarCategoria;
  }

  public static function mdlEditarCategoria($idCategoria, $nombre)
  {
    $mensaje = array();

    try {
      $objRespuesta = conexion::conectar()->prepare("UPDATE categorias SET nombre=:nombre WHERE idCategoria = :idCategoria");

      $objRespuesta->bindParam(":idCategoria", $idCategoria);
      $objRespuesta->bindParam(":nombre", $nombre);


      if ($objRespuesta->execute()) {
        $mensaje = array("codigo" => "200", "mensaje" => "Usuario editado correctamente");
      } else {
        $mensaje = array("codigo" => "425", "mensaje" => "No se ha podido editar el usuario");
      }
    } catch (Exception $e) {
      $mensaje = array("codigo" => "425", "mensaje" => $e->getMessage());
    }
    return $mensaje;
  }

  public static function mdlEliminarCategoria($idCategoria)
  {
    try {
      $objRespuesta = conexion::conectar()->prepare("DELETE FROM categorias WHERE id = :idCategoria");

      $objRespuesta->bindParam(":idCategoria", $idCategoria);


      if ($objRespuesta->execute()) {
        $mensaje = array("codigo" => "200", "mensaje" => "Usuario eliminado correctamente");
      } else {
        $mensaje = array("codigo" => "425", "mensaje" => "No se ha podido eliminar el usuario");
      }
    } catch (Exception $e) {
      $mensaje = array("codigo" => "425", "mensaje" => $e->getMessage());
    }
    return $mensaje;
  }
}
