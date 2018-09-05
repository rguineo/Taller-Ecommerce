<?php 

require_once "conexion.php";

Class ModeloProducto {

	static public function listarProductoMdl($tabla) {

		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$sql -> execute();
		return $sql -> fetchAll();

	}

	static public function mdlCrearProducto($tabla, $datos, $rutaImagen) {

		$sql = Conexion::conectar()->prepare("INSERT INTO $tabla() 
				VALUES (NULL, :ruta, :titulo, :descripcion, :detalle, :precio, :imagen, :oferta, :precioOferta, :descuento, :finOferta, :id_categoria, :id_subcategoria, NOW())");
		
		$sql->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
		$sql->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
		$sql->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
		$sql->bindParam(":detalle", $datos["detalle"], PDO::PARAM_INT);
<<<<<<< HEAD
		$sql->bindParam(":precio", $datos["precio"], PDO::PARAM_INT);
		$sql->bindParam(":imagen", $rutaImagen, PDO::PARAM_STR);
		$sql->bindParam(":oferta", $datos["oferta"], PDO::PARAM_INT);
		$sql->bindParam(":precioOferta", $datos["precioOferta"], PDO::PARAM_INT);
		$sql->bindParam(":descuento", $datos["descuento"], PDO::PARAM_INT);
		//$sql->bindParam(":finOferta", $datos["finOferta"], PDO::PARAM_STR);
		$sql->bindParam (":finOferta", strtotime (date ($datos["finOferta"])), PDO::PARAM_STR);
=======
		$sql->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
		$sql->bindParam(":imagen", $rutaImagen, PDO::PARAM_STR);
		$sql->bindParam(":oferta", $datos["oferta"], PDO::PARAM_STR);
		$sql->bindParam(":precioOferta", $datos["precioOferta"], PDO::PARAM_INT);
		$sql->bindParam(":descuento", $datos["descuento"], PDO::PARAM_STR);
		$sql->bindParam(":finOferta", strtotime(date ($datos["finOferta"])), PDO::PARAM_STR);
>>>>>>> 196fae8daab4757dc1a7978cdef1905cbbcf6413
		$sql->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
		$sql->bindParam(":id_subcategoria", $datos["id_subcategoria"], PDO::PARAM_INT);

		if( $sql -> execute() ) {
			return "ok";
		} else {
			return "error";
		}

	}

	static public function mdlEliminarProducto($tabla, $id) {

		$sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$sql->bindParam(":id", $id, PDO::PARAM_INT);

		if( $sql->execute()) {
			return "ok";
		} else {
			return "error";
		}

	}

	static public function mdlEditarProducto($tabla, $id) {

		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE id = :id");
		$sql->bindParam(":id", $id, PDO::PARAM_INT);

		$sql -> execute();
		return $sql -> fetch();

	}

	static public function mdlActualizarProducto($tabla, $datos, $rutaImagen) {

		if( is_null($rutaImagen)) {
			$sql = Conexion::conectar()->prepare("UPDATE $tabla 
			SET ruta = :ruta, titulo = :titulo, descripcion = :descripcion, detalle = :detalle, precio = :precio, imagen = :imagen, oferta = :oferta, precioOferta = :precioOferta, descuento = :descuento; finOferta = :finOferta, id_categoria = :id_categoria, id_subcategoria = :id_subcategoria, fecha = NOW() WHERE id = :id");

			$sql->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
			$sql->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
			$sql->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$sql->bindParam(":detalle", $datos["detalle"], PDO::PARAM_INT);
			$sql->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
			$sql->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
			$sql->bindParam(":oferta", $datos["oferta"], PDO::PARAM_STR);
			$sql->bindParam(":precioOferta", $datos["precioOferta"], PDO::PARAM_INT);
			$sql->bindParam(":descuento", $datos["descuento"], PDO::PARAM_STR);
			$sql->bindParam(":finOferta", $datos["finOferta"], PDO::PARAM_STR);
			$sql->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_STR);
			$sql->bindParam(":id_subcategoria", $datos["id_subcategoria"], PDO::PARAM_INT);

		} else {
			$sql = Conexion::conectar()->prepare("UPDATE $tabla 
			SET ruta = :ruta, titulo = :titulo, descripcion = :descripcion, detalle = :detalle, precio = :precio, imagen = :imagen, oferta = :oferta, precioOferta = :precioOferta, descuento = :descuento; finOferta = :finOferta, fecha = NOW() WHERE id = :id");

			$sql->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
			$sql->bindParam(":titulo", $datos["titulo"], PDO::PARAM_STR);
			$sql->bindParam(":descripcion", $datos["descripcion"], PDO::PARAM_STR);
			$sql->bindParam(":detalle", $datos["detalle"], PDO::PARAM_INT);
			$sql->bindParam(":precio", $datos["precio"], PDO::PARAM_STR);
			$sql->bindParam(":imagen", $datos["imagen"], PDO::PARAM_STR);
			$sql->bindParam(":oferta", $datos["oferta"], PDO::PARAM_STR);
			$sql->bindParam(":precioOferta", $datos["precioOferta"], PDO::PARAM_INT);
			$sql->bindParam(":descuento", $datos["descuento"], PDO::PARAM_STR);
			$sql->bindParam(":finOferta", $datos["finOferta"], PDO::PARAM_STR);
			$sql->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_STR);
			$sql->bindParam(":id_subcategoria", $datos["id_subcategoria"], PDO::PARAM_INT);
		} 

		if($sql->execute()) {
			return "ok";
		} else {
			return "error";
		}

	}
	public function mdlMostrarProducto(){
        $table = $this->getTabla();
        $sql = Conexion::conectar()->prepare("SELECT * FROM $table");
        $sql -> execute();
        return $sql->fetchAll();
    }

}
?>