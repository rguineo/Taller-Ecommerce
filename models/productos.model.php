<?php 

require "conexion.php";

class ModelProductos {

	static public function mdlMostrarCategorias($tabla, $columna, $valor) {

		if ($columna != null) {
			$sql = Conexion::Conectar()->prepare("SELECT * FROM $tabla WHERE $columna = '$valor'");
			$sql -> execute();
			return $sql->fetch();
		} else {
			$sql = Conexion::Conectar()->prepare("SELECT * FROM $tabla");
			$sql -> execute();
			return $sql->fetchAll();
		}
	}

	static public function mdlMostrarSubCategorias($tabla, $columna, $valor){

		$sql = Conexion::Conectar()->prepare("SELECT * FROM $tabla WHERE $columna = '$valor'");
		$sql -> execute();
		return $sql->fetchAll();
	}

	static public function mdlMostrarLastProductos($tabla){

		$sql = Conexion::Conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC LIMIT 10");
		$sql -> execute();
		return $sql->fetchAll();
	}

}

?>