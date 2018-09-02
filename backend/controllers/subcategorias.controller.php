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

        static public function ctrCrearSubCategorias($datos) {
            $tabla = "subcategorias";
    
            list($ancho, $alto) = getimagesize($datos["imagen"]["tmp_name"]);	
    
            $nuevoAncho = 1024;
            $nuevoAlto = 768;
    
            $directorio = "../views/dist/img/subcategoria";
    
            if($datos["imagen"]["type"] == "image/jpeg"){
    
                $rutaImagen = $directorio."/".md5($datos["imagen"]["tmp_name"]).".jpeg";
    
                $origen = imagecreatefromjpeg($datos["imagen"]["tmp_name"]);						
                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
    
                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
    
                imagejpeg($destino, $rutaImagen);
    
            }
    
            if($datos["imagen"]["type"] == "image/png"){
    
                $rutaImagen = $directorio."/".md5($datos["imagen"]["name"]).".png";
    
                $origen = imagecreatefrompng($datos["imagen"]["tmp_name"]);						
    
                $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
    
                imagealphablending($destino, FALSE);
        
                imagesavealpha($destino, TRUE);
    
                imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
    
                imagepng($destino, $rutaImagen);
    
            }
    
    
            $respuesta = (new ModeloSubCategorias)->mdlCrearSubCategoria($tabla, $datos, $rutaImagen);
            
            return $respuesta;
    
        }


    }
?>