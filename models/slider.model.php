<?php 

class ModelSlider {

	static public function mdlMostrarSlider($tabla) {

		$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();
		return $stmt->fetchAll();

		$stmt -> close();

		$stmt = null;

	}

}


 ?>