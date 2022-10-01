<?php 
require_once "conexion.php";
class ModeloCategorias{
	// CREAR CATEGORIA 
	static public function mdlIngresarCategoria($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("insert into $tabla(categoria)values(:categoria)");
		$stmt->bindParam(":categoria",$datos,PDO::PARAM_STR);
		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt=null;
	}

	// MOSTRAR CATEGORIAS 
	static public function mdlMostrarCategorias($tabla,$item,$valor){
		if($item !=null){
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

	// EDITAR CATEGORIA 
	static public function mdlEditarCategoria($tabla,$datos){
		$stmt = Conexion::conectar()->prepare("update $tabla set categoria=:categoria where id=:id");
		$stmt->bindParam(":categoria",$datos["categoria"],PDO::PARAM_STR);
		$stmt->bindParam(":id",$datos["id"],PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt=null;
	}

	//BORRAR CATEGORIA
	static public function mdlBorrarCategoria($tabla,$datos){
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
}