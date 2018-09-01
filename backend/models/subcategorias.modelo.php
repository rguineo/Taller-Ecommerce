<?php

require_once "conexion.php";

    Class ModeloSubCategorias {

        static public function listarSubCategoriasMdl($tabla, $tabla2) {
    
            $sql = Conexion::conectar()->prepare("SELECT subcategorias.id, subcategorias.subcategoria, subcategorias.ruta, categorias.categoria
            FROM subcategorias
            INNER JOIN categorias
            ON subcategorias.id_categoria = categorias.id
            ORDER BY categorias.categoria");
            $sql -> execute();
            return $sql -> fetchAll();
    
        }
        static public function mdlEliminarSubCategorias($tabla, $id) {

		    $sql = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		    $sql->bindParam(":id", $id, PDO::PARAM_INT);

		    if( $sql->execute()) {
			    return "ok";
		    } else {
			return "error";
            }
        }

	}

?>