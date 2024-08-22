<?php
require_once "conexion.php";
class ModeloCliente
{



    static public function mdlInfoClientes()
    {
        $stmt = Conexion::conectar()->prepare("select * from cliente");
        $stmt->execute();
        return $stmt->fetchAll();
    }



    static public function mdlRegCliente($data)
    {
        // id_cliente	razon_social_cliente	nit_ci_cliente	direccion_cliente	nombre_cliente	telefono_cliente	email_cliente
        $razon_social_cliente = $data["razon_social_cliente"];
        $nit_ci_cliente = $data["nit_ci_cliente"];
        $direccion_cliente = $data["direccion_cliente"];
        $nombre_cliente = $data["nombre_cliente"];
        $telefono_cliente = $data["telefono_cliente"];
        $email_cliente = $data["email_cliente"];

        var_dump($data);
        //creamos la consulta para insertar los datos

        $stmt = Conexion::conectar()->prepare("insert into cliente(razon_social_cliente, nit_ci_cliente, direccion_cliente, nombre_cliente, telefono_cliente, email_cliente) values('$razon_social_cliente', '$nit_ci_cliente', '$direccion_cliente', '$nombre_cliente', '$telefono_cliente', '$email_cliente')");
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlInfoCliente($id)
    {
        $stmt = Conexion::conectar()->prepare("select * from cliente where id_cliente=$id");
        $stmt->execute();

        // $result = $stmt->fetch(PDO::FETCH_ASSOC);
        // var_dump($result); 
        $result = $stmt->fetch();

        return $result;
    }

    static public function mdlEditCliente($data)
    {

        // id_cliente	razon_social_cliente	nit_ci_cliente	direccion_cliente	nombre_cliente	telefono_cliente	email_cliente
        $razon_social_cliente = $data["razon_social_cliente"];
        $nit_ci_cliente = $data["nit_ci_cliente"];
        $direccion_cliente = $data["direccion_cliente"];
        $nombre_cliente = $data["nombre_cliente"];
        $telefono_cliente = $data["telefono_cliente"];
        $email_cliente = $data["email_cliente"];
        $id = $data["id_cliente"];

        //consulta para actualizar datos
        $stmt = Conexion::conectar()->prepare("update cliente set razon_social_cliente='$razon_social_cliente', nit_ci_cliente='$nit_ci_cliente', direccion_cliente='$direccion_cliente', nombre_cliente='$nombre_cliente', telefono_cliente='$telefono_cliente', email_cliente='$email_cliente' where id_cliente=$id");
        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }

    static public function mdlEliCliente($id)
    {

        $stmt = Conexion::conectar()->prepare("delete from cliente where id_cliente=$id");

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
}