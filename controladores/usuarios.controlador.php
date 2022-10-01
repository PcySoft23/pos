<?php 
class ControladorUsuarios{
	// INGRESO USUARIO
	static public function crtIngresoUsuario(){
		if(isset($_POST["ingUsuario"])){
			if(preg_match('/^[-a-zA-Z0-9]+$/',$_POST["ingUsuario"]) && preg_match('/^[-a-zA-Z0-9]+$/',$_POST["ingPassword"])){

				$encryptar=crypt($_POST["ingPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$tabla="usuarios";
				$item="usuario";//Columna usuario db
				$valor=$_POST["ingUsuario"];
				$respuesta=ModeloUsuarios::MdlMostrarUsuarios($tabla,$item,$valor);

				if($respuesta["usuario"]==$_POST["ingUsuario"] && $respuesta["password"]==$encryptar){

					if($respuesta["estado"]==1){
						$_SESSION["iniciarSesion"]="ok";
						$_SESSION["id"]=$respuesta["id"];
						$_SESSION["nombre"]=$respuesta["nombre"];
						$_SESSION["usuario"]=$respuesta["usuario"];
						$_SESSION["foto"]=$respuesta["foto"];
						$_SESSION["perfil"]=$respuesta["perfil"];

						//Captura fecha y horapara saber el ultimo login
						date_default_timezone_set('America/Lima');
						$fecha=date('Y-m-d');
						$hora=date('H:i:s');
						$fechaActual=$fecha.' '.$hora;
						
						$item1="ultimo_login";
						$valor1=$fechaActual;
						$item2="id";
						$valor2=$respuesta["id"];

						$ultimo_login=ModeloUsuarios::mdlActualizarUsuario($tabla,$item1,$valor1,$item2,$valor2);
						if($ultimo_login=="ok"){
							echo '<script>
								window.location="inicio";
							  </script>';
						}
										
					}else{
						echo '<br>
						<div class="alert alert-danger">El usuario aún no esta activado</div>';
					}
				}else{
					echo '<br><div class="alert alert-danger">Error al ingresar, vuelve a intentarlo</div>';
				}
			}
		}
	}

	// REGISTRO DE USUARIO
	static public function ctrCrearUsuario(){
		if(isset($_POST["nuevoUsuario"])){
			if(preg_match('/^[-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) && 
			   preg_match('/^[-a-zA-Z0-9]+$/', $_POST["nuevoUsuario"])&&
			   preg_match('/^[-a-zA-Z0-9]+$/', $_POST["nuevoPassword"])){ 

			   	$ruta="";
			   	/************************************************************
			   	// Validar imagen 
			   	************************************************************/
			   	if(isset($_FILES["nuevaFoto"]["tmp_name"])){
			   		list($ancho,$alto)=getimagesize($_FILES["nuevaFoto"]["tmp_name"]);
			   		$nuevoAncho=500;
			   		$nuevoAlto=500;
			   		//Creamos el directorio donde guardamos la foto
			   		$directorio="vistas/img/usuarios/".$_POST["nuevoUsuario"];
			   		mkdir($directorio,0755);

			   		if($_FILES["nuevaFoto"]["type"]=="image/jpeg"){
			   			// guardamos la imagen en el directorio
			   			$aleatorio=mt_rand(100,999);
			   			$ruta="vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".jpg";
			   			$origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
			   			$destino=imagecreatetruecolor($nuevoAncho, $nuevoAlto);
			   			imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
			   			imagejpeg($destino,$ruta);
			   		}

			   		if($_FILES["nuevaFoto"]["type"]=="image/png"){
			   			// guardamos la imagen en el directorio
			   			$aleatorio=mt_rand(100,999);
			   			$ruta="vistas/img/usuarios/".$_POST["nuevoUsuario"]."/".$aleatorio.".png";
			   			$origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
			   			$destino=imagecreatetruecolor($nuevoAncho, $nuevoAlto);
			   			imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
			   			imagepng($destino,$ruta);
			   		}
			   	}
			   	/************************************************************
			   	// Termina Validar imagen 
			   	************************************************************/

				$tabla="usuarios";
				$encryptar=crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$datos=array("nombre"=>$_POST["nuevoNombre"],
							"usuario"=>$_POST["nuevoUsuario"],
							"password"=>$encryptar,
							"perfil"=>$_POST["nuevoPerfil"],
							"foto"=>$ruta);
				$respuesta=ModeloUsuarios::mdlIngresarUsuario($tabla,$datos);
				if($respuesta=="ok"){
					echo '<script>
						   swal.fire({
						   		icon:"success",
						   		title:"¡El usuario ha sido guardado correctamente",
						   		showConfirmButton:true,
						   		confirmButtonText:"Cerrar",
						   		closeOnConfirm:false
						   	}).then((result)=>{
								if(result.value){
									window.location="usuarios";
								}
						   	});
					</script>';
				}
			}else{
				echo '<script>
					   swal.fire({
					   		icon:"error",
					   		title:"¡El usuario no puede ir vacio o llevar caracteres especiales",
					   		showConfirmButton:true,
					   		confirmButtonText:"Cerrar",
					   		closeOnConfirm:false
					   	}).then((result)=>{
							if(result.value){
								window.location="usuarios";
							}
					   	});
				</script>';
			}
		}
	}

	/************************************************************
	 MOSTRAR USUARIO
	************************************************************/
	static public function ctrMostrarUsuarios($item,$valor){
		$tabla="usuarios";
		$respuesta=ModeloUsuarios::MdlMostrarUsuarios($tabla,$item,$valor);
		return $respuesta;
	}

	/************************************************************
	 EDITAR USUARIO
	************************************************************/
	static public function ctrEditarUsuario(){
		if (isset($_POST["editarUsuario"])) {
			if(preg_match('/^[-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

				/************************************************************
			   	// Validar imagen 
			   	************************************************************/
			   	$ruta=$_POST["fotoActual"];
			   	if(isset($_FILES["editarFoto"]["tmp_name"]) && !empty($_POST["fotoActual"]["tmp_name"])){
			   		list($ancho,$alto)=getimagesize($_FILES["editarFoto"]["tmp_name"]);
			   		$nuevoAncho=500;
			   		$nuevoAlto=500;
			   		//Creamos el directorio donde guardamos la foto
			   		$directorio="vistas/img/usuarios/".$_POST["editarUsuario"];
			   		//Preguntamos si existe otra imagen en la bd
			   		if(!empty($_POST["fotoActual"])){
			   			unlink($_POST["fotoActual"]);//borra la foto antigua
			   		}else{
			   			mkdir($directorio,0755);
			   		}

			   		if($_FILES["editarFoto"]["type"]=="image/jpeg"){
			   			// guardamos la imagen en el directorio
			   			$aleatorio=mt_rand(100,999);
			   			$ruta="vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".jpg";
			   			$origen = imagecreatefromjpeg($_FILES["editarFoto"]["tmp_name"]);
			   			$destino=imagecreatetruecolor($nuevoAncho, $nuevoAlto);
			   			imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
			   			imagejpeg($destino,$ruta);
			   		}

			   		if($_FILES["editarFoto"]["type"]=="image/png"){
			   			// guardamos la imagen en el directorio
			   			$aleatorio=mt_rand(100,999);
			   			$ruta="vistas/img/usuarios/".$_POST["editarUsuario"]."/".$aleatorio.".png";
			   			$origen = imagecreatefrompng($_FILES["editarFoto"]["tmp_name"]);
			   			$destino=imagecreatetruecolor($nuevoAncho, $nuevoAlto);
			   			imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
			   			imagepng($destino,$ruta);
			   		}
			   	}

			   	$tabla="usuarios";
			   	if($_POST["editarPassword"]!=""){
			   		if(preg_match('/^[-a-zA-Z0-9]+$/',$_POST["editarPassword"])){
			   			$encryptar=crypt($_POST["editarPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
			   		}else{
			   			echo '<script>
							   swal.fire({
							   		icon:"error",
							   		title:"¡La contraseña no puede ir vacia o llevar caracteres especiales!",
							   		showConfirmButton:true,
							   		confirmButtonText:"Cerrar",
							   		closeOnConfirm:false
							   	}).then((result)=>{
									if(result.value){
										window.location="usuarios";
									}
							   	});
								</script>';
			   		}
			   	}else{
			   		$encryptar=$_POST["passwordActual"];
			   	}
			   	$datos=array("nombre"=>$_POST["editarNombre"],
							"usuario"=>$_POST["editarUsuario"],
							"password"=>$encryptar,
							"perfil"=>$_POST["editarPerfil"],
							"foto"=>$ruta);
				$respuesta=ModeloUsuarios::mdlEditarUsuario($tabla,$datos);
				if($respuesta=="ok"){
					echo '<script>
						   swal.fire({
						   		icon:"success",
						   		title:"¡El usuario ha sido editado correctamente",
						   		showConfirmButton:true,
						   		confirmButtonText:"Cerrar",
						   		closeOnConfirm:false
						   	}).then((result)=>{
								if(result.value){
									window.location="usuarios";
								}
						   	});
					</script>';
				}
			}else{
				echo '<script>
						swal.fire({
							icon:"error",
							title:"¡El nombre no puede ir vacia o llevar caracteres especiales!",
							showConfirmButton:true,
							confirmButtonText:"Cerrar",
							closeOnConfirm:false
							}).then((result)=>{
								if(result.value){
									window.location="usuarios";
								}
							});
						</script>';
			}
		}
	}


	/************************************************************
	 BORRAR USUARIO
	************************************************************/
	static public function ctrBorrarUsuario(){
		if(isset($_GET["idUsuario"])){
			$tabla="usuarios";
			$datos=$_GET["idUsuario"];

			if($_GET["fotoUsuario"]!=""){
				unlink($_GET["fotoUsuario"]);
				rmdir('vistas/img/usuarios/'.$_GET["usuario"]);
			}
			$respuesta=ModeloUsuarios::mdlBorrarUsuario($tabla,$datos);

			if($respuesta=="ok"){
				echo '<script>
					   swal.fire({
				   		icon:"success",
				   		title:"¡El usuario ha sido borrado correctamente",
				   		showConfirmButton:true,
				   		confirmButtonText:"Cerrar",
				   		closeOnConfirm:false
					   	}).then((result)=>{
							if(result.value){
								window.location="usuarios";
							}
					   	});
				</script>';
			}
		}
	}
}