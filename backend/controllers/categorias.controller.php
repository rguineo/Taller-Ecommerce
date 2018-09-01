<?php 

Class ControllerCategorias {
	
	public function listarCategoriasCtr() {
		$tabla = "categorias";
		$respuesta = ModeloCategorias::listarCategoriasMdl($tabla);

		return $respuesta;
	}

	static public function ctrCrearCategorias($datos) {
		$tabla = "categorias";

		list($ancho, $alto) = getimagesize($datos["imagen"]["tmp_name"]);	

		$nuevoAncho = 1024;
		$nuevoAlto = 768;

		$directorio = "../views/dist/img/categoria";

		if($datos["imagen"]["type"] == "image/jpeg"){

			$rutaImagen = $directorio."/".md5($datos["imagen"]["tmp_name"]).".jpeg";

			$origen = imagecreatefromjpeg($datos["imagen"]["tmp_name"]);						
			$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

			imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

			imagejpeg($destino, $rutaImagen);

		}

		if($datos["imagen"]["type"] == "image/png"){

			$rutaImagen = $directorio."/".md5($datos["imagen"]["name"]).".png";

			$origen = imagecreatefrompng($datos["imagen"]["tmp_name"]);						

			$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

			imagealphablending($destino, FALSE);
	
			imagesavealpha($destino, TRUE);

			imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

			imagepng($destino, $rutaImagen);

		}


		$respuesta = ModeloCategorias::mdlCrearCategorias($tabla, $datos, $rutaImagen);

		return $respuesta;

	}

	static public function ctrEliminarCategorias($_idCategoria, $ruta) {

		$tabla = "categorias";

		if ( unlink($ruta) ) {
		
			$respuesta = ModeloCategorias::mdlEliminarCategorias($tabla, $_idCategoria);	
		
		}
		
		return $respuesta;

	}

	static public function ctrEditarCategorias($_idCategoria) {
		$tabla = "categorias";
		$respuesta = ModeloCategorias::mdlEditarCategorias($tabla, $_idCategoria);
		return $respuesta;
	}

	static public function ctrActualizarCategorias($datos) {
		//Validamos si no viene imagen para actualizar solo la tabla
		$tabla = "categorias";

		if ($datos["imagen"]["error"] == 4) {
			$rutaImagen = null;

		} 
		// LA ACTUALIZACIÓN VIENE CON IMAGEN
		else {

			unlink($datos["rutaActual"]);
			
			list($ancho, $alto) = getimagesize($datos["imagen"]["tmp_name"]);	

			$nuevoAncho = 1024;
			$nuevoAlto = 768;

			$directorio = "../views/dist/img/categoria";

			if($datos["imagen"]["type"] == "image/jpeg"){

				$rutaImagen = $directorio."/".md5($datos["imagen"]["tmp_name"]).".jpeg";

				$origen = imagecreatefromjpeg($datos["imagen"]["tmp_name"]);						
				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagejpeg($destino, $rutaImagen);

			}

			if($datos["imagen"]["type"] == "image/png"){

				$rutaImagen = $directorio."/".md5($datos["imagen"]["name"]).".png";

				$origen = imagecreatefrompng($datos["imagen"]["tmp_name"]);						

				$destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

				imagealphablending($destino, FALSE);
		
				imagesavealpha($destino, TRUE);

				imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

				imagepng($destino, $rutaImagen);

			}


			
			
		}

		$respuesta = ModeloCategorias::mdlActualizarCategorias($tabla, $datos, $rutaImagen);

		return $respuesta;

	}

}


?>