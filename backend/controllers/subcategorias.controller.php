<?php
    Class ControllerSubCategorias {
	
        public function listarSubCategoriasCtr() {
            $tabla = "subcategorias";
            $tabla2 = "categorias";
            $respuesta = ModeloSubCategorias::listarSubCategoriasMdl($tabla, $tabla2);
            return $respuesta;
        }
        static public function ctrEliminarSubCategorias($id, $ruta) {

            $tabla = "subcategorias";
            
            if ( unlink($ruta) ) {
            
                $respuesta = ModeloSubCategorias::mdlEliminarSubCategorias($tabla, $id);	
            
            }
            
            return $respuesta;
    
        }
    }
?>