<?php
$ruta = parse_url($_SERVER["REQUEST_URI"]);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrRegProducto" ||
    $ruta["query"] == "ctrEditProducto" ||
    $ruta["query"] == "ctrEliProducto"
  ) {
    $metodo = $ruta["query"];
    $producto = new controladorProducto();
    $producto->$metodo();
  }
}

class controladorProducto
{

  static public function ctrInfoProductos()
  {
    $respuesta = ModeloProducto::mdlInfoProductos();
    return $respuesta;
  }

  static public function ctrRegProducto()
  {
      require "../modelo/productoModelo.php";
  
      // id_producto, cod_producto, cod_producto_sin, nombre_producto, precio_producto, unidad_medida, unidad_medida_sin, imagen_producto, disponible
      // Creamos el array de datos
      $data = array(
          "cod_producto" => $_POST["cod_producto"],
          "cod_producto_sin" => $_POST["cod_producto_sin"],
          "nombre_producto" => $_POST["nombre_producto"],
          "precio_producto" => $_POST["precio_producto"],
          "unidad_medida" => $_POST["unidad_medida"],
          "unidad_medida_sin" => $_POST["unidad_medida_sin"],
          "imagen_producto" => $_POST["imagen_producto"],
          "disponible" => $_POST["disponible"]
      );
  
      var_dump($data);
      $respuesta = ModeloProducto::mdlRegProducto($data);
  
      echo $respuesta;
  }  

  static public function ctrInfoProducto($id)
  {
    $respuesta = ModeloProducto::mdlInfoProducto($id);
    return $respuesta;
  }

  static function ctrEditProducto()
  {
      require "../modelo/productoModelo.php";
  
      // id_producto, cod_producto, cod_producto_sin, nombre_producto, precio_producto, unidad_medida, unidad_medida_sin, imagen_producto, disponible
      // Creamos el array de datos para editar el producto
      $data = array(
          "cod_producto" => $_POST["cod_producto"],
          "cod_producto_sin" => $_POST["cod_producto_sin"],
          "nombre_producto" => $_POST["nombre_producto"],
          "precio_producto" => $_POST["precio_producto"],
          "unidad_medida" => $_POST["unidad_medida"],
          "unidad_medida_sin" => $_POST["unidad_medida_sin"],
          "imagen_producto" => $_POST["imagen_producto"],
          "disponible" => $_POST["disponible"],
          "id_producto" => $_POST["id"] // ID del producto a editar
      );
  
      // Llamamos al modelo para editar el producto
      $respuesta = ModeloProducto::mdlEditProducto($data);
       // Mostramos la respuesta
      echo $respuesta;
  }  

  static function ctrEliProducto()
  {
    require "../modelo/productoModelo.php";
    $id = $_POST["id"];

    $respuesta = ModeloProducto::mdlEliProducto($id);
    echo $respuesta;
  }
}
