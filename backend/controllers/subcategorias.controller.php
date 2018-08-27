<?php
    Class ControllerSubCategorias {
	
        public function listarSubCategoriasCtr() {
            $tabla = "subcategorias";
            $respuesta = ModeloSubCategorias::listarSubCategoriasMdl($tabla);
            return $respuesta;
        }
    }
?>