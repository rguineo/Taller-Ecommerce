<?php 

class ControllerProductos {

	static public function ctrMostrarCategorias ($columna, $valor) {

		$tabla = "categorias";

		$respuesta = ModelProductos::mdlMostrarCategorias($tabla, $columna, $valor);

		return $respuesta;
	
	}

	static public function ctrMostrarSubCategorias($columna, $valor) {

		$tabla = "subcategorias";

		$respuesta = ModelProductos::mdlMostrarSubCategorias($tabla, $columna, $valor);

		return $respuesta;
	}


	static public function ctrMostrarLastProductos(){
		$tabla = "productos";
		$respuesta = ModelProductos::mdlMostrarLastProductos($tabla);
		return $respuesta;

	}

}

?>
