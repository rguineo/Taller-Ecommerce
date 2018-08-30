<?php 

Class ControllerUsuario {
	
	public function listarUsuarioCtr() {
		$tabla = "administrador";
		$respuesta = ModeloUsuario::listarUsuarioMdl($tabla);

		return $respuesta;
	}

	static public function ctrEliminarUsuario($id_admin, $ruta) {

		$tabla = "administrador";

		if ( unlink($ruta) ) {
		
			$respuesta = ModeloUsuario::mdlEliminarUsuario($tabla, $id_admin);	
		
		}
		
		return $respuesta;

	}

}


?>