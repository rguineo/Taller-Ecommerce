<?php 

Class ControllerProducto {
	
	public function listarProductoCtr() {
		$tabla = "productos";
		$respuesta = ModeloProducto::listarProductoMdl($tabla);

		return $respuesta;
	}

	static public function ctrCrearProducto($datos) {
		$tabla = "productos";

		list($ancho, $alto) = getimagesize($datos["imagen"]["tmp_name"]);	

		$nuevoAncho = 1024;
		$nuevoAlto = 768;

		$directorio = "../views/dist/img/productos";

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


		$respuesta = ModeloProducto::mdlCrearProducto($tabla, $datos, $rutaImagen);

		return $respuesta;

	}

	static public function ctrEliminarProducto($id_Producto, $ruta) {

		$tabla = "productos";

		if ( unlink($ruta) ) {
		
			$respuesta = ModeloProducto::mdlEliminarProducto($tabla, $id_Producto);	
		
		}
		
		return $respuesta;

	}

	static public function ctrEditarProducto($_idProducto) {
		$tabla = "productos";
		$respuesta = (new ModeloProducto)->mdlEditarProducto($tabla, $_idProducto);
		return $respuesta;
	}

	static public function ctrActualizarProducto($datos) {
		//Validamos si no viene imagen para actualizar solo la tabla
		$tabla = "productos";

		if ($datos["imagen"]["error"] == 4) {
			$rutaImagen = null;

		} 
		// LA ACTUALIZACIÓN VIENE CON IMAGEN
		else {

			unlink("../".$datos["rutaActual"]);
			
			list($ancho, $alto) = getimagesize($datos["imagen"]["tmp_name"]);	

			$nuevoAncho = 1024;
			$nuevoAlto = 768;

			$directorio = "../views/dist/img/productos";

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

		$respuesta = (new ModeloProducto)->mdlActualizarProducto($tabla, $datos, $rutaImagen);

		return $respuesta;

	}

}


?>