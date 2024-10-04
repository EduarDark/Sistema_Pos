<?php
require_once "conexion.php";
class ModeloProducto
{

    static public function mdlInfoProductos()
    {
        $stmt = Conexion::conectar()->prepare("select * from producto");
        $stmt->execute();

        return $stmt->fetchAll();

        /*       $stmt->close();
        $stmt->null;  */
    }



    static public function mdlRegProducto($data)
    {
        $codProducto = $data["codProducto"];
        $codProductoSIN = $data["codProductoSIN"];
        $desProducto = $data["desProducto"];
        $preProducto = $data["preProducto"];
        $unidadMedidad = $data["unidadMedidad"];
        $unidadMedidadSIN = $data["unidadMedidadSIN"];
        $imgProducto = $data["imgProducto"];

        $stmt = Conexion::conectar()->prepare("insert into producto(cod_producto, cod_producto_sin,
 nombre_producto, precio_producto, unidad_medida, unidad_medida_sin, imagen_producto) 
values('$codProducto', '$codProductoSIN', '$desProducto', '$preProducto', '$unidadMedidad',
 '$unidadMedidadSIN', '$imgProducto')");

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        /*       $stmt->close();
        $stmt->null();
 */
    }

    static public function mdlInfoProducto($id)
    {
        $stmt = Conexion::conectar()->prepare("select * from producto where id_producto=$id");
        $stmt->execute();

        return $stmt->fetch();

        /*   $stmt->close();
        $stmt->null; */
    }

    static public function mdlEditProducto($data)
    {

        $id = $data["idProducto"];
        $codProductoSIN = $data["codProductoSIN"];
        $desProducto = $data["desProducto"];
        $preProducto = $data["preProducto"];
        $unidadMedidad = $data["unidadMedidad"];
        $unidadMedidadSIN = $data["unidadMedidadSIN"];
        $estado = $data["estado"];
        $imgProducto = $data["imgProducto"];


        $stmt = Conexion::conectar()->prepare("update producto set cod_producto_sin='$codProductoSIN',
 nombre_producto='$desProducto', precio_producto='$preProducto', unidad_medida='$unidadMedidad', unidad_medida_sin='$unidadMedidadSIN', imagen_producto='$imgProducto', disponible='$estado'
where id_producto=$id");

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        /* 
        $stmt->close();
        $stmt->null();
 */
    }

    static public function mdlEliProducto($id)
    {

        $stmt = Conexion::conectar()->prepare("delete from producto where id_producto=$id");

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
        /* 
    $stmt->close();
    $stmt->null();
*/
    }


    static public function mdlBusProducto($cod)
    {
        $stmt = Conexion::conectar()->prepare("select * from producto where cod_producto='$cod'");
        $stmt->execute();

        return $stmt->fetch();

        /*   $stmt->close();
        $stmt->null; */
    }

    static public function mdlCantidadProductos(){
        $stmt=Conexion::conectar()->prepare("select count(*) as producto from producto");
        $stmt->execute();
        return $stmt->fetch();
        /*   $stmt->close();
        $stmt->null; */ 
    }
}
