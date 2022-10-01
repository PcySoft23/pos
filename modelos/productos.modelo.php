<?php 
require_once "conexion.php";

class ModeloProductos{
	static public function mdlMostrarProductos($tabla,$item,$valor,$orden){
		if($item !=null){
			$stmt=Conexion::conectar()->prepare("select * from $tabla where $item=:$item order by id desc");
			$stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
		}else{
			$stmt=Conexion::conectar()->prepare("select * from $tabla order by $orden desc");
			$stmt->execute();
			return $stmt->fetchAll();
		}
		$stmt->close();
		$stmt=null;
	}

	// REGISTRAR PRODUCTO 
	static public function mdlIngresarProducto($tabla,$datos){
		$stmt=Conexion::conectar()->prepare("insert into $tabla(id_categoria,codigo,descripcion,imagen,stock,precio_compra,precio_venta)values(:id_categoria,:codigo,:descripcion,:imagen,:stock,:precio_compra,:precio_venta)");
		$stmt->bindParam(":id_categoria",$datos["id_categoria"],PDO::PARAM_STR);
		$stmt->bindParam(":codigo",$datos["codigo"],PDO::PARAM_STR);
		$stmt->bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);
		$stmt->bindParam(":imagen",$datos["imagen"],PDO::PARAM_STR);
		$stmt->bindParam(":stock",$datos["stock"],PDO::PARAM_STR);
		$stmt->bindParam(":precio_compra",$datos["precio_compra"],PDO::PARAM_STR);
		$stmt->bindParam(":precio_venta",$datos["precio_venta"],PDO::PARAM_STR);
		
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt=null;
	}

	// EDITAR PRODUCTO 
	static public function mdlEditarProducto($tabla,$datos){
		$stmt=Conexion::conectar()->prepare("update $tabla set id_categoria=:id_categoria,descripcion=:descripcion,imagen=:imagen,stock=:stock,precio_compra=:precio_compra,precio_venta=:precio_venta where codigo=:codigo");

		$stmt->bindParam(":id_categoria",$datos["id_categoria"],PDO::PARAM_STR);
		$stmt->bindParam(":codigo",$datos["codigo"],PDO::PARAM_STR);
		$stmt->bindParam(":descripcion",$datos["descripcion"],PDO::PARAM_STR);
		$stmt->bindParam(":imagen",$datos["imagen"],PDO::PARAM_STR);
		$stmt->bindParam(":stock",$datos["stock"],PDO::PARAM_STR);
		$stmt->bindParam(":precio_compra",$datos["precio_compra"],PDO::PARAM_STR);
		$stmt->bindParam(":precio_venta",$datos["precio_venta"],PDO::PARAM_STR);
		
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt=null;
	}


	//BORRAR PRODUCTO 
	static public function mdlEliminarProducto($tabla,$datos){
		$stmt=Conexion::conectar()->prepare("delete from $tabla where id=:id");

		$stmt->bindParam(":id",$datos,PDO::PARAM_STR);
		
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt=null;
	}


	/********************************************************************
	ACTUALIZAR PRODUCTO
	*********************************************************************/
    static public function mdlActualizarProducto($tabla,$item1,$valor1,$valor2){
    	$stmt=Conexion::conectar()->prepare("update $tabla set $item1=:$item1 where id=:id");
    	$stmt->bindParam(":".$item1,$valor1,PDO::PARAM_STR);
		$stmt->bindParam(":id",$valor2,PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt=null;
    }

    /*=============================================
	MOSTRAR SUMA VENTAS
	=============================================*/	
	static public function mdlMostrarSumaVentas($tabla){
		$stmt = Conexion::conectar()->prepare("SELECT SUM(ventas) as total FROM $tabla");
		$stmt -> execute();
		return $stmt -> fetch();
		$stmt -> close();
		$stmt = null;
	}
}