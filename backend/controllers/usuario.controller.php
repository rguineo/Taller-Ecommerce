<?php 

Class ControllerUsuario {
	
	public function listarUsuarioCtr() {
		$tabla = "administrador";
		$respuesta = ModeloUsuario::listarUsuarioMdl($tabla);

		return $respuesta;
	}

	static public function ctrCrearUsuario($datos) {
		$tabla = "administrador";

		list($ancho, $alto) = getimagesize($datos["avatar_admin"]["tmp_name"]);	

		$nuevoAncho = 1024;
		$nuevoAlto = 768;

		$directorio = "../views/dist/img/avatar";

		if($datos["avatar_admin"]["type"] == "image/jpeg"){

			$rutaImagen = $directorio."/".md5($datos["avatar_admin"]["tmp_name"]).".jpeg";

			$origen = imagecreatefromjpeg($datos["avatar_admin"]["tmp_name"]);						
			$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

			imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

			imagejpeg($destino, $rutaImagen);

		}

		if($datos["avatar_admin"]["type"] == "image/png"){

			$rutaImagen = $directorio."/".md5($datos["avatar_admin"]["name"]).".png";

			$origen = imagecreatefrompng($datos["avatar_admin"]["tmp_name"]);						

			$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

			imagealphablending($destino, FALSE);
	
			imagesavealpha($destino, TRUE);

			imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

			imagepng($destino, $rutaImagen);

		}


		$respuesta = ModeloUsuario::mdlCrearUsuario($tabla, $datos, $rutaImagen);

		return $respuesta;

	}

	static public function ctrEliminarUsuario($id_admin, $ruta) {

		$tabla = "administrador";
		
		if ( unlink("../".$ruta) ) {
		
			$respuesta = ModeloUsuario::mdlEliminarUsuario($tabla, $id_admin);	
		
		}
		
		return $respuesta;

	}

}


?>