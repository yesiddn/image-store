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

  public static function mdlListarTodasPinturas()
  {
    $listarPintura = null;

    try {
      $objRespuesta = conexion::conectar()->prepare("SELECT p.id, p.nombre, p.autor, p.fechaPublicacion , p.descripcion, p.url, c.nombre AS nombreCategoria FROM pinturas p, categorias c WHERE p.categoria = c.id;");
      $objRespuesta->execute();
      $listarPintura = $objRespuesta->fetchAll();
      $objRespuesta = null;
    } catch (Exception $e) {
      $listarPintura = $e->getMessage();
    }
    return $listarPintura;
  }

  public static function mdlAgregarPintura($idCategoria, $nombre, $autor, $fecha, $descripcion, $url)
  {
    $objRespuesta = null;

    try {
      $objRespuesta = conexion::conectar()->prepare("INSERT INTO pinturas (nombre, autor, fechaPublicacion, descripcion, categoria, url) VALUES (:nombre, :autor, :fecha, :descripcion, :idCategoria, :url)");
      $objRespuesta->bindParam(":idCategoria", $idCategoria);
      $objRespuesta->bindParam(":nombre", $nombre);
      $objRespuesta->bindParam(":autor", $autor);
      $objRespuesta->bindParam(":fecha", $fecha);
      $objRespuesta->bindParam(":descripcion", $descripcion);
      $objRespuesta->bindParam(":url", $url);
      
      if ($objRespuesta->execute()) {
        $mensaje = array("codigo" => "200", "mensaje" => "Pintura agregada correctamente");
      } else {
        $mensaje = array("codigo" => "425", "mensaje" => "No se ha podido agregar la pintura");
      }

      $objRespuesta = null;
    } catch (Exception $e) {
      $objRespuesta = $e->getMessage();
    }
    return $mensaje;
  }

  public static function mdlEliminarPintura($idPintura)
  {
    $objRespuesta = null;

    try {
      $objRespuesta = conexion::conectar()->prepare("DELETE FROM pinturas WHERE id = :idPintura");
      $objRespuesta->bindParam(":idPintura", $idPintura);

      if ($objRespuesta->execute()) {
        $mensaje = array("codigo" => "200", "mensaje" => "Pintura eliminada correctamente");
      } else {
        $mensaje = array("codigo" => "425", "mensaje" => "No se ha podido eliminar la pintura");
      }

      $objRespuesta = null;
    } catch (Exception $e) {
      $objRespuesta = $e->getMessage();
    }
    return $mensaje;
  }

  public static function mdlEditarPintura($idPintura, $nombre, $autor, $fecha, $descripcion, $idCategoria, $url)
  {
    $objRespuesta = null;

    try {
      $objRespuesta = conexion::conectar()->prepare("UPDATE pinturas SET nombre = :nombre, autor = :autor, fechaPublicacion = :fecha, descripcion = :descripcion, categoria = :idCategoria, url = :url WHERE id = :idPintura");
      $objRespuesta->bindParam(":idPintura", $idPintura);
      $objRespuesta->bindParam(":nombre", $nombre);
      $objRespuesta->bindParam(":autor", $autor);
      $objRespuesta->bindParam(":fecha", $fecha);
      $objRespuesta->bindParam(":descripcion", $descripcion);
      $objRespuesta->bindParam(":idCategoria", $idCategoria);
      $objRespuesta->bindParam(":url", $url);

      if ($objRespuesta->execute()) {
        $mensaje = array("codigo" => "200", "mensaje" => "Pintura editada correctamente");
      } else {
        $mensaje = array("codigo" => "425", "mensaje" => "No se ha podido editar la pintura");
      }

      $objRespuesta = null;
    } catch (Exception $e) {
      $objRespuesta = $e->getMessage();
    }
    return $mensaje;
  }
}