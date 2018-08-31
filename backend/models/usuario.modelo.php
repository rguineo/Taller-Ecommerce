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
				VALUES (NULL, :nombre, :correo, :pass, :avatar, NOW())");
		
		$sql->bindParam(":nombre", $datos["nombre_admin"], PDO::PARAM_STR);
		$sql->bindParam(":correo", $datos["correo_admin"], PDO::PARAM_STR);
		$sql->bindParam(":pass", $datos["password_admin"], PDO::PARAM_STR);
		$sql->bindParam(":avatar", $rutaImagen, PDO::PARAM_STR);

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