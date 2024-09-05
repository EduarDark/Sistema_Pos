<?php
require_once "conexion.php";
class ModeloCliente{
    static public function mdlAccesoCliente($cliente){
    $stmt=Conexion::conectar()->prepare("select * from cliente where login_cliente='$cliente'");
    $stmt->execute();
    return $stmt->fetch();

    //$stmt->closeCursor();
    //$stmt-->null;
    }
    static public function mdlInfoClientes(){
    $stmt=Conexion::conectar()->prepare("select * from cliente");
    $stmt->execute();
    return $stmt->fetchAll();

    //$stmt->closeCursor();
    //$stmt-->null;
    }
    static public function mdlRegCliente($data){
        $razonCliente=$data["razonCliente"];
        $nitCliente=$data["nitCliente"];
        $direccionCliente=$data["direccionCliente"];
        $nombreCliente=$data["nombreCliente"];
        $telefonoCliente=$data["telefonoCliente"];
        $emailCliente=$data["emailCliente"];
        $stmt=Conexion::conectar()->prepare("insert into cliente(razon_social_cliente,nit_ci_cliente,direccion_cliente,nombre_cliente,telefono_cliente,email_cliente)values('$razonCliente','$nitCliente','$direccionCliente','$nombreCliente','$telefonoCliente','$emailCliente')");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        //$stmt->closeCursor();
        //$stmt-->null;
    }
    static public function mdlInfoCliente($id){
        $stmt=Conexion::conectar()->prepare("select * from cliente where id_cliente=$id");
        $stmt->execute();
        return $stmt->fetch();
    
        //$stmt->closeCursor();
        //$stmt-->null;
    }
    static public function mdlEditCliente($data){
        // var_dump($data);
        $razonCliente=$data["razonCliente"];
        $nitCliente=$data["nitCliente"];
        $direccionCliente=$data["direccionCliente"];
        $nombreCliente=$data["nombreCliente"];
        $telefonoCliente=$data["telefonoCliente"];
        $emailCliente=$data["emailCliente"];
        $id=$data["id"];

        $stmt=Conexion::conectar()->prepare("update cliente set razon_social_cliente='$razonCliente', nit_ci_cliente='$nitCliente', direccion_cliente='$direccionCliente', nombre_cliente='$nombreCliente', telefono_cliente='$telefonoCliente', email_cliente='$emailCliente' where id_cliente=$id");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        //$stmt->closeCursor();
        //$stmt-->null;
    }
    static public function mdlEliCliente($id){

        $stmt=Conexion::conectar()->prepare("delete from cliente where id_cliente=$id");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        //$stmt->closeCursor();
        //$stmt-->null;
    }
    static public function mdlActualizarAcceso($fechaHora, $id){
        $stmt=Conexion::conectar()->prepare("update cliente set ultimo_login='$fechaHora' where id_cliente='$id'");
        
        if($stmt->execute()){
          return "ok";
        }else{
          return "error";
        }
        //$stmt->closeCursor();
        //$stmt-->null;
      }

    static public function mdlBusCliente($nitCliente){
        $stmt = Conexion::conectar()->prepare("select * from cliente where nit_ci_cliente=$nitCliente");
        $stmt->execute();
        return $stmt->fetch();
        // $stmt->closeCursor();
        // $stmt-->null;
    }
}   