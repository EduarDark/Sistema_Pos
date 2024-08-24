<?php
require_once "conexion.php";

class ModeloProducto
{
 

  static public function mdlInfoProductos(){
    $stmt=Conexion::conectar()->prepare("select * from producto");
    $stmt->execute();
    return $stmt->fetchAll();
    
  }

  static public function mdlRegProducto($data)
{
    // Desglosamos el array $data en variables individuales
    $cod_producto = $data["cod_producto"];
    $cod_producto_sin = $data["cod_producto_sin"];
    $nombre_producto = $data["nombre_producto"];
    $precio_producto = $data["precio_producto"];
    $unidad_medida = $data["unidad_medida"];
    $unidad_medida_sin = $data["unidad_medida_sin"];
    $imagen_producto = $data["imagen_producto"];
    $disponible = $data["disponible"];

    var_dump($data);

    // Creamos la consulta SQL para insertar los datos en la tabla producto
    $stmt = Conexion::conectar()->prepare(
        "INSERT INTO producto (cod_producto, cod_producto_sin, nombre_producto, precio_producto, unidad_medida, unidad_medida_sin, imagen_producto, disponible) 
        VALUES ('$cod_producto', '$cod_producto_sin', '$nombre_producto', '$precio_producto', '$unidad_medida', '$unidad_medida_sin', '$imagen_producto', '$disponible')"
    );

    // Ejecutamos la consulta y verificamos si se realizó correctamente
    if ($stmt->execute()) {
        return "ok"; // Si la inserción fue exitosa, retornamos "ok"
    } else {
        return "error"; // Si hubo un error, retornamos "error"
    }
}

  static public function mdlInfoProducto($id){
    $stmt=Conexion::conectar()->prepare("select * from producto where id_producto=$id");
    $stmt->execute();

    return $stmt->fetch();
    
  }
  
  static public function mdlEditProducto($data)
{
    // Desglosamos el array $data en variables individuales
    $cod_producto = $data["cod_producto"];
    $cod_producto_sin = $data["cod_producto_sin"];
    $nombre_producto = $data["nombre_producto"];
    $precio_producto = $data["precio_producto"];
    $unidad_medida = $data["unidad_medida"];
    $unidad_medida_sin = $data["unidad_medida_sin"];
    $imagen_producto = $data["imagen_producto"];
    $disponible = $data["disponible"];
    $id_producto = $data["id_producto"]; // ID del producto a editar

    // Creamos la consulta SQL para actualizar los datos en la tabla producto
    $stmt = Conexion::conectar()->prepare(
        "UPDATE producto 
        SET 
            cod_producto = '$cod_producto', 
            cod_producto_sin = '$cod_producto_sin', 
            nombre_producto = '$nombre_producto', 
            precio_producto = '$precio_producto', 
            unidad_medida = '$unidad_medida', 
            unidad_medida_sin = '$unidad_medida_sin', 
            imagen_producto = '$imagen_producto', 
            disponible = '$disponible' 
        WHERE id_producto = $id_producto"
    );

    // Ejecutamos la consulta y verificamos si se realizó correctamente
    if ($stmt->execute()) {
        return "ok"; // Si la actualización fue exitosa, retornamos "ok"
    } else {
        return "error"; // Si hubo un error, retornamos "error"
    }
}

  
  static public function mdlEliProducto($id){
    $stmt=Conexion::conectar()->prepare("delete from producto where id_producto=$id");

    if($stmt->execute()){
      return "ok";
    }else{
      return "error";
    }

  }
}