<?php
    Class ModeloSubCategorias {

        static public function listarSubCategoriasMdl($tabla) {
    
            $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla");
            $sql -> execute();
            return $sql -> fetchAll();
    
        }
    }

?>