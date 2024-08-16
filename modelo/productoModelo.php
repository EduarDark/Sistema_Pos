<?php
require_once "conexion.php";
class ModeloProducto
{
    /*----------------
    acceso al sistema
    -----------------*/
    static public function mdlAccesoProducto($producto){
        $stmt = Conexion::conectar()->prepare("select * from producto where login_producto='$producto'");
        $stmt->execute();

        return $stmt->fetch();
    }

    static public function mdlInfoProductos(){

        $stmt = Conexion::conectar()->prepare("select * from producto");
        $stmt->execute();

        return $stmt->fetchALL();

        $stmt->close();
        $stmt->null;
    }

    static public function mdlRegProducto($data){
        $loginProducto=$data["loginProducto"];
        $password=$data["password"];
        $perfil=$data["perfil"];

        $stmt=Conexion::conectar()-> prepare("insert into producto(login_producto,password,perfil) 
        values('$loginProducto', '$password', '$perfil')");
        if($stmt-> execute()){
            return "ok";
        }else{
            return "error";
        }
    
    } 

    static public function mdlActualizarAcceso($fechaHora, $id){
        $stn-Conexion::conectar()->prepare("update producto set ultimo_login-'$fechaHora' where id_producto-'$id'");

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
    }

    static public function mdlInfoProducto($id) {
        $stmt = Conexion::conectar()->prepare("select * from producto where id_producto=$id");
        $stmt->execute();

        return $stmt->fetch();

        $stmt->close();
        $stmt->null;
    }   

    static public function mdlEditProducto($data){

        $password=$data["password"];
        $perfil=$data["perfil"];
        $estado=$data["estado"];
        $id=$data["id"];

        $stmt=Conexion::conectar()-> prepare("update producto set password='$password', perfil='$perfil', estado='$estado' where
        id_producto=$id");

        if($stmt-> execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
        $stmt->null();
    }

    static public function mdlEliProducto($id){
        $stmt=Conexion::conectar()-> prepare("delete from producto where
        id_producto=$id");

        if($stmt-> execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt->close();
        $stmt->null();
    }
    }


  