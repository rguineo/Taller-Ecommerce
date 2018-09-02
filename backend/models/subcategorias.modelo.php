<?php

require_once "conexion.php";

    Class ModeloSubCategorias {

        static public function listarSubCategoriasMdl($tabla, $tabla2) {
    
            $sql = Conexion::conectar()->prepare("SELECT subcategorias.id, subcategorias.subcategoria, subcategorias.ruta, subcategorias.imagen,categorias.categoria
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

        static public function mdlCrearSubCategoria($tabla, $datos, $rutaImagen) {

            $sql = Conexion::conectar()->prepare("INSERT INTO $tabla() 
                    VALUES (NULL, :subcategoria, :ruta, :imagen, :id_categoria, NOW())");
            
            $sql->bindParam(":subcategoria", $datos["subcategoria"], PDO::PARAM_STR);
            $sql->bindParam(":ruta", $datos["ruta"], PDO::PARAM_STR);
            $sql->bindParam(":id_categoria", $datos["id_categoria"], PDO::PARAM_INT);
            $sql->bindParam(":imagen", $rutaImagen, PDO::PARAM_STR);
    
            if( $sql -> execute() ) {
                return "ok";
            } else {
                return "error";
            }
    
        }

	}

?>