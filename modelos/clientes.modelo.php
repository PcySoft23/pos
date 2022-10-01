<?php 
require_once "conexion.php";
class ModeloClientes{
	// CREAR CLIENTE 
	static public function mdlIngresarCliente($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, documento, email,telefono,direccion,fecha_nacimiento) VALUES (:nombre, :documento, :email,:telefono,:direccion,:fecha_nacimiento)");

		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_INT);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt=null;
	}

	// MOSTRAR CLIENTES
	static public function mdlMostrarClientes($tabla,$item,$valor){
		if($item!=null){
			$stmt=Conexion::conectar()->prepare("select * from $tabla where $item=:$item");
			$stmt->bindParam(":".$item,$valor,PDO::PARAM_STR);
			$stmt->execute();
			return $stmt->fetch();
		}else{
			$stmt=Conexion::conectar()->prepare("select * from $tabla");
			$stmt->execute();
			return $stmt->fetchAll();
		}
		
		$stmt->close();
		$stmt=null;
	}


	// EDITAR CLIENTE 
	static public function mdlEditarCliente($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla set nombre=:nombre, documento=:documento, email=:email,telefono=:telefono,direccion=:direccion,fecha_nacimiento=:fecha_nacimiento WHERE id=:id");

		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
		$stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
		$stmt->bindParam(":documento", $datos["documento"], PDO::PARAM_INT);
		$stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
		$stmt->bindParam(":telefono", $datos["telefono"], PDO::PARAM_STR);
		$stmt->bindParam(":direccion", $datos["direccion"], PDO::PARAM_STR);
		$stmt->bindParam(":fecha_nacimiento", $datos["fecha_nacimiento"], PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt=null;
	}


	//BORRAR CLIENTE
	static public function mdlEliminarCliente($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("delete from $tabla where id=:id");
		$stmt->bindParam(":id",$datos,PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt=null;
	}	


	/**************************************************
	ACTUALIZAR CLIENTE
	***************************************************/
    static public function mdlActualizarCliente($tabla,$item1,$valor1,$valor2){
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
}