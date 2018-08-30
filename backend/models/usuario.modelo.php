<?php 

require_once "conexion.php";

Class ModeloUsuario {

	static public function listarUsuarioMdl($tabla) {

		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$sql -> execute();
		return $sql -> fetchAll();

	}

	static public function mdlCrearUsuario($tabla, $datos, $rutaImagen) {

		$sql = Conexion::conectar()->prepare("INSERT INTO $tabla() 
				VALUES (NULL, :categoria, :ruta, :imagen, NOW())");
		
		$sql->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
		$sql->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$sql->bindParam(":imagen", $rutaImagen, PDO::PARAM_STR);

		if( $sql -> execute() ) {
			return "ok";
		} else {
			return "error";
		}

	}

	static public function mdlEliminarUsuario($tabla, $id_admin) {

		$sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id_admin = :id");

		$sql->bindParam(":id", $id_admin, PDO::PARAM_INT);

		if( $sql->execute()) {
			return "ok";
		} else {
			return "error";
		}

	}


}
?>