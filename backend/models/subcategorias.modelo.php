<?php
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
    }

?>