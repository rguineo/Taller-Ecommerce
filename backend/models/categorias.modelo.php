<?php 

require_once "conexion.php";

Class ModeloCategorias {

	static public function listarCategoriasMdl($tabla) {

		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$sql -> execute();
		return $sql -> fetchAll();

	}

	static public function mdlCrearCategoria($tabla, $datos, $rutaImagen) {

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

	static public function mdlEliminarCategoria($tabla, $idCategoria) {

		$sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$sql->bindParam(":id", $idCategoria, PDO::PARAM_INT);

		if( $sql->execute()) {
			return "ok";
		} else {
			return "error";
		}

	}

	static public function mdlEditarCategoria($tabla, $idCategoria) {

		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
		$sql->bindParam(":id", $idCategoria, PDO::PARAM_INT);

		$sql -> execute();
		return $sql -> fetch();

	}

	static public function mdlActualizarCategoria($tabla, $datos, $rutaImagen) {

		if( is_null($rutaImagen)) {
			$sql = Conexion::conectar()->prepare("UPDATE $tabla SET categoria = :categoria, ruta = :ruta, fecha = NOW() WHERE id = :id");

			$sql->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
			$sql->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
			$sql->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		} else {
			$sql = Conexion::conectar()->prepare("UPDATE $tabla SET categoria = :categoria, ruta = :ruta, imagen = :imagen, fecha = NOW() WHERE id = :id");

			$sql->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
			$sql->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
			$sql->bindParam(":imagen", $imagen, PDO::PARAM_STR);
			$sql->bindParam(":id", $datos["id"], PDO::PARAM_INT);



		} 

		if($sql->execute()) {
			return "ok";
		} else {
			return "error";
		}

	}
	public function mdlMostrarCategorias(){
        $table = $this->getTabla();
        $sql = Conexion::conectar()->prepare("SELECT * FROM $table");
        $sql -> execute();
        return $sql->fetchAll();
    }

}
?>