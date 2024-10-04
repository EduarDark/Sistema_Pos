<?php
$ruta = parse_url($_SERVER["REQUEST_URI"]);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrNumFactura" ||
    $ruta["query"] == "ctrUltimoCufd" ||
    $ruta["query"] == "ctrNuevoCufd" ||
    $ruta["query"] == "ctrLeyenda" ||
    $ruta["query"] == "ctrRegistrarFactura" ||
    $ruta["query"] == "ctrAnularFactura"){
    $metodo = $ruta["query"];
    $Factura = new ControladorFactura();
    $Factura->$metodo();
  }
}

class ControladorFactura
{

  static public function ctrInfoFacturas(){

    $respuesta = ModeloFactura::mdlInfoFacturas();
    return $respuesta;
  }

  static public function ctrInfoFactura($id){

     // Añadir encabezados CORS
     header("Access-Control-Allow-Origin: *");
     header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
     header("Access-Control-Allow-Headers: Content-Type, Authorization");
 

    $respuesta = ModeloFactura::mdlInfoFactura($id);
    return $respuesta;
  }

  static public function ctrAnularFactura(){


    require "../modelo/FacturaModelo.php";
    $cuf = $_POST["cuf"];

    $respuesta = ModeloFactura::mdlAnularFactura($cuf);
    echo $respuesta;
  }

  static public function ctrNumFactura(){

     // Añadir encabezados CORS
     header("Access-Control-Allow-Origin: *");
     header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
     header("Access-Control-Allow-Headers: Content-Type, Authorization");
 

    require "../modelo/facturaModelo.php";
    $respuesta = ModeloFactura::mdlNumFactura();

    if ($respuesta["max(id_factura)"] == null) {
      echo "1";
    } else {
      echo $respuesta["max(id_factura)"] + 1;
    }
  }

  static public function ctrNuevoCufd(){

     // Añadir encabezados CORS
     header("Access-Control-Allow-Origin: *");
     header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
     header("Access-Control-Allow-Headers: Content-Type, Authorization");
 
    require "../modelo/facturaModelo.php";
    
    $data=array(
      "cufd"=>$_POST["cufd"],
      "fechaVigCufd"=>$_POST["fechaVigCufd"],
      "codControlCufd"=>$_POST["codControlCufd"]
      );

     echo ModeloFactura::mdlNuevoCufd($data);
  }

  static public function ctrUltimoCufd(){

     // Añadir encabezados CORS
     header("Access-Control-Allow-Origin: *");
     header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
     header("Access-Control-Allow-Headers: Content-Type, Authorization");
 
    require "../modelo/facturaModelo.php";

    $respuesta=ModeloFactura::mdlUltimoCufd();
    echo json_encode($respuesta);
  }

  static public function ctrLeyenda(){

     // Añadir encabezados CORS
     header("Access-Control-Allow-Origin: *");
     header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
     header("Access-Control-Allow-Headers: Content-Type, Authorization");
 
    require "../modelo/facturaModelo.php";

    $respuesta=ModeloFactura::mdlLeyenda();
    echo json_encode($respuesta);
  }

  static public function ctrRegistrarFactura(){

    require "../modelo/facturaModelo.php";

     $data=array(
      "codFactura"=>$_POST["codFactura"],
      "idCliente"=>$_POST["idCliente"],
      "detalle"=>$_POST["detalle"],
      "neto"=>$_POST["neto"],
      "descuento"=>$_POST["descuento"],
      "total"=>$_POST["total"],
      "fechaEmision"=>$_POST["fechaEmision"],
      "cufd"=>$_POST["cufd"],
      "cuf"=>$_POST["cuf"],
      "xml"=>$_POST["xml"],
      "idUsuario"=>$_POST["idUsuario"],
      "usuario"=>$_POST["usuario"],
      "leyenda"=>$_POST["leyenda"],
    );
    $respuesta=ModeloFactura::mdlRegistrarFactura($data);
    echo $respuesta;
  }
  static public function ctrCantidadVentas(){
    $respuesta=ModeloFactura::mdlCantidadVentas();
    return ($respuesta);
    //echo $respuesta;
}  
}
