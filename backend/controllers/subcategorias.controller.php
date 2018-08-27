<?php
    Class ControllerSubCategorias {
	
        public function listarSubCategoriasCtr() {
            $tabla = "subcategorias";
            $tabla2 = "categorias";
            $respuesta = ModeloSubCategorias::listarSubCategoriasMdl($tabla, $tabla2);
            return $respuesta;
        }
    }
?>