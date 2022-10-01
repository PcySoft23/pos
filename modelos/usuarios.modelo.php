<?php 
require_once "conexion.php";

class ModeloUsuarios{
	// Mostrar Usuarios
	static public function MdlMostrarUsuarios($tabla,$item,$valor){
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

	//Registro de Usuarios
	static function mdlIngresarUsuario($tabla,$datos){
		$stmt=Conexion::conectar()->prepare("insert into $tabla(nombre,usuario,password,perfil,foto)values(:nombre,:usuario,:password,:perfil,:foto)");
		$stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
		$stmt->bindParam(":usuario",$datos["usuario"],PDO::PARAM_STR);
		$stmt->bindParam(":password",$datos["password"],PDO::PARAM_STR);
		$stmt->bindParam(":perfil",$datos["perfil"],PDO::PARAM_STR);
		$stmt->bindParam(":foto",$datos["foto"],PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt=null;
	}

	// Editar Usuario 
	static public function mdlEditarUsuario($tabla,$datos){
		$stmt=Conexion::conectar()->prepare("update $tabla set nombre=:nombre,password=:password,perfil=:perfil,foto=:foto where usuario=:usuario");
		$stmt->bindParam(":nombre",$datos["nombre"],PDO::PARAM_STR);
		$stmt->bindParam(":password",$datos["password"],PDO::PARAM_STR);
		$stmt->bindParam(":perfil",$datos["perfil"],PDO::PARAM_STR);
		$stmt->bindParam(":foto",$datos["foto"],PDO::PARAM_STR);
		$stmt->bindParam(":usuario",$datos["usuario"],PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt=null;
	}

	/********************************************************************
	ACTUALIZAR USUARIO
	*********************************************************************/
    static public function mdlActualizarUsuario($tabla,$item1,$valor1,$item2,$valor2){
    	$stmt=Conexion::conectar()->prepare("update $tabla set $item1=:$item1 where $item2=:$item2");
    	$stmt->bindParam(":".$item1,$valor1,PDO::PARAM_STR);
		$stmt->bindParam(":".$item2,$valor2,PDO::PARAM_STR);

		if($stmt->execute()){
			return "ok";
		}else{
			return "error";
		}
		$stmt->close();
		$stmt=null;
    }

    /********************************************************************
	BORARR USUARIO
	*********************************************************************/
	static public function mdlBorrarUsuario($tabla,$datos){
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
}