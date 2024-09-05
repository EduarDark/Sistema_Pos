<?php
    $ruta=parse_url($_SERVER["REQUEST_URI"]);
    // var_dump($ruta);

    if(isset($ruta["query"])){
        if($ruta["query"]=="ctrRegCliente" || 
        $ruta["query"]=="ctrEditCliente" ||
        $ruta["query"]=="ctrEliCliente" || 
        $ruta["query"]=="ctrBusCliente"
        ){
            $metodo=$ruta["query"];
            $cliente=new ControladorCliente();
            $cliente->$metodo();
        }
    }

class ControladorCliente{

    static public function ctrIngresoCliente(){
        if(isset($_POST["cliente"])){
            $cliente=$_POST["cliente"];
            $password=$_POST["password"];

            $resultado=ModeloCliente::mdlAccesoCliente($cliente);

            if($resultado["login_cliente"]==$cliente && $resultado["password"]==$password && $resultado["estado_cliente"]==1){
                echo '<script>
                window.location="inicio";
                </script>';
            }

        }
    }

    static public function ctrInfoClientes(){
        $respuesta=ModeloCliente::mdlInfoClientes();
        return $respuesta;
    }
    static public function ctrRegCliente(){
        // $respuesta=ModeloCliente::mdlInfoClientes();
        // return $respuesta;

        require "../modelo/clienteModelo.php";
        //$password=password_hash($_POST["password"], PASSWORD_DEFAULT);
        $data=array(
            "razonCliente"=>$_POST["razon"],
            "nitCliente"=>$_POST["nit"],
            "direccionCliente"=>$_POST["direccion"],
            "nombreCliente"=>$_POST["nombre"],
            "telefonoCliente"=>$_POST["telefono"],
            "emailCliente"=>$_POST["email"]
        );
        $respuesta=ModeloCliente::mdlRegCliente($data);
        echo $respuesta;
    }
    static public function ctrInfoCliente($id){
        $respuesta=ModeloCliente::mdlInfoCliente($id);
        return $respuesta;
    }
    static public function ctrEditCliente(){
        require "../modelo/clienteModelo.php";

        $data=array(
            "id"=>$_POST["idCliente"],
            "razonCliente"=>$_POST["razon"],
            "nitCliente"=>$_POST["nit"],
            "direccionCliente"=>$_POST["direccion"],
            "nombreCliente"=>$_POST["nombre"],
            "telefonoCliente"=>$_POST["telefono"],
            "emailCliente"=>$_POST["email"]
        );
        ModeloCliente::mdlEditCliente($data);
        $respuesta=ModeloCliente::mdlEditCliente($data);
        echo $respuesta;
    }
    static public function ctrEliCliente(){
        require "../modelo/clienteModelo.php";
        $id=$_POST["id"];
        $respuesta=ModeloCliente::mdlEliCliente($id);
        echo $respuesta;
    }
    static function ctrBusCliente(){
        require "../modelo/clienteModelo.php";
        $nitCliente=$_POST["nitCliente"];
        $respuesta = ModeloCliente::mdlBusCliente($nitCliente);
        echo json_encode($respuesta);
        //echo $respuesta;
    }
}