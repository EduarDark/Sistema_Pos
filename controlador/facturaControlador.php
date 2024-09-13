<?php
$ruta = parse_url($_SERVER["REQUEST_URI"]);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "ctrRegFactura" ||
    $ruta["query"] == "ctrEditFactura" ||
    $ruta["query"] == "ctrNumFactura" ||
    $ruta["query"] == "ctrUltimoCufd" ||
    $ruta["query"] == "ctrNuevoCufd" ||
    $ruta["query"] == "ctrLeyenda" ||
    $ruta["query"] == "ctrEliFactura"){
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

  static public function ctrRegFactura(){

    require "../modelo/FacturaModelo.php";

    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $data = array(
      "loginFactura" => $_POST["login"],
      "password" => $password,
      "perfil" => "Moderador"
    );

    $respuesta = ModeloFactura::mdlRegFactura($data);

    echo $respuesta;
  }

  static public function ctrInfoFactura($id){

    $respuesta = ModeloFactura::mdlInfoFactura($id);
    return $respuesta;
  }

  static public function ctrEliFactura(){

    require "../modelo/FacturaModelo.php";
    $id = $_POST["id"];

    $respuesta = ModeloFactura::mdlEliFactura($id);
    echo $respuesta;
  }

  static public function ctrNumFactura(){

    require "../modelo/facturaModelo.php";
    $respuesta = ModeloFactura::mdlNumFactura();

    if ($respuesta["max(id_factura)"] == null) {
      echo "1";
    } else {
      echo $respuesta["max(id_factura)"] + 1;
    }
  }

  static public function ctrNuevoCufd(){
    require "../modelo/facturaModelo.php";
    
    $data=array(
      "cufd"=>$_POST["cufd"],
      "fechaVigCufd"=>$_POST["fechaVigCufd"],
      "codControlCufd"=>$_POST["codControlCufd"]
      );

     echo ModeloFactura::mdlNuevoCufd($data);
  }

  static public function ctrUltimoCufd(){
    require "../modelo/facturaModelo.php";

    $respuesta=ModeloFactura::mdlUltimoCufd();
    echo json_encode($respuesta);
  }

  static public function ctrLeyenda(){
    require "../modelo/facturaModelo.php";

    $respuesta=ModeloFactura::mdlLeyenda();
    echo json_encode($respuesta);
  }
}
