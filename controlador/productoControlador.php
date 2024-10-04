<?php

$ruta = parse_url($_SERVER["REQUEST_URI"]);

if (isset($ruta["query"])) {

    if (
        $ruta["query"] == "ctrRegProducto" ||
        $ruta["query"] == "ctrEditProducto" ||
        $ruta["query"] == "ctrBusProducto" ||
        $ruta["query"] == "ctrEliProducto"
    ) {
        $metodo = $ruta["query"];
        $producto = new ControladorProducto();
        $producto->$metodo();
    }
}




class ControladorProducto
{


    static public function ctrInfoProductos()
    {
        $respuesta = ModeloProducto::mdlInfoProductos();
        return $respuesta;
    }


    static public function ctrRegProducto()
    {
        require "../modelo/productoModelo.php";
        $imagen = $_FILES["imgProducto"];
        $imgNombre = $imagen["name"];
        $imgTmp = $imagen["tmp_name"];
        move_uploaded_file($imgTmp, "../assest/dist/img/productos/" . $imgNombre);


        $data = array(
            "codProducto" => $_POST["codProducto"],
            "codProductoSIN" => $_POST["codProductoSIN"],
            "desProducto" => $_POST["desProducto"],
            "preProducto" => $_POST["preProducto"],
            "unidadMedidad" => $_POST["unidadMedidad"],
            "unidadMedidadSIN" => $_POST["unidadMedidadSIN"],
            "codProducto" => $_POST["codProducto"],
            "imgProducto" => $imgNombre,
        );
        $respuesta = ModeloProducto::mdlRegProducto($data);

        echo $respuesta;
    }

    static public function ctrInfoProducto($id)
    {

        $respuesta = ModeloProducto::mdlInfoProducto($id);
        return $respuesta;
    }


    static public function ctrEditProducto()
    {
        require "../modelo/productoModelo.php";

        $imagen = $_FILES["imgProducto"];
        if ($imagen["name"] == "") {
            $imgNombre = $_POST["imgActual"];
        } else {
            $imgNombre = $imagen["name"];
            $imgTmp = $imagen["tmp_name"];
            move_uploaded_file($imgTmp, "../assest/dist/img/productos/" . $imgNombre);
        }

        $data = array(
            "idProducto" => $_POST["idProducto"],
            "codProductoSIN" => $_POST["codProductoSIN"],
            "desProducto" => $_POST["desProducto"],
            "preProducto" => $_POST["preProducto"],
            "unidadMedidad" => $_POST["unidadMedidad"],
            "unidadMedidadSIN" => $_POST["unidadMedidadSIN"],
            "estado" => $_POST["estado"],
            "imgProducto" => $imgNombre,
        );


        $respuesta = ModeloProducto::mdlEditProducto($data);
        echo $respuesta;
    }

    static public function ctrEliProducto()
    {
        require "../modelo/productoModelo.php";
        $id = $_POST["id"];
        $respuesta = ModeloProducto::mdlEliProducto($id);
        echo $respuesta;
    }

    static public function ctrBusProducto()
    {
        require "../modelo/productoModelo.php";
        $codProducto=$_POST["codProducto"];
        $respuesta = ModeloProducto::mdlBusProducto($codProducto);
        echo json_encode($respuesta);
    }

    static public function ctrCantidadProductos(){
        $respuesta=ModeloProducto::mdlCantidadProductos();
        return ($respuesta);
        //echo $respuesta;
    }

}