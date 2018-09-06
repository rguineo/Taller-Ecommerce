<?php
    Class ControllerSubCategorias {
	
        public function listarSubCategoriasCtr() {
            $tabla = "subcategorias";
            $tabla2 = "categorias";
            $respuesta = (new ModeloSubCategorias)->listarSubCategoriasMdl($tabla, $tabla2);
            return $respuesta;
        }

        static public function ctrBuscarSubCategoria($id){ //Buscar Subcategoria a partir de la id de la SubCategoria
            $tabla = "subcategorias";
            $respuesta = (new ModeloSubCategorias)->mdlBuscarSubCategorias($tabla, $id);
            return $respuesta;
        }
        static public function buscarSubCategoriasCat($idCat){//Buscar Subcategoria a partir de la id de la Categoria
            $tabla = "subcategorias";
            $respuesta = (new ModeloSubCategorias)->mdlBuscarSubCat($tabla, $idCat);
            return $respuesta;
        }

        static public function ctrEliminarSubCategorias($id, $ruta) {

            $tabla = "subcategorias";

            if ( unlink($ruta) ) {
            
                $respuesta = (new ModeloSubCategorias)->mdlEliminarSubCategorias($tabla, $id);	
            
            }
            
            return $respuesta;
    
        }

        static public function ctrCrearSubCategorias($datos) {
            $tabla = "subcategorias";
            $categoria = $datos["subcategoria"];
    
            $validar = (new ModeloSubCategorias)->mdlValidarSubCategoria($tabla, $categoria);
    
            if ($validar == "error"){
                return $validar;
            } else {

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

        public function ctrEditarSubCategoria($id){
            $tabla = "subcategorias";

            $respuesta = (new ModeloSubCategorias)->mdlEditarSubCategoria($tabla, $id);
            return $respuesta;

        }

        public function ctrActualizarSubcategoria($datos){
            //Validamos si no viene imagen para actualizar solo la tabla
            $tabla = "subcategorias";
    
            if ($datos["imagen"]["error"] == 4) {
                $rutaImagen = null;
    
            } 
            // LA ACTUALIZACIÓN VIENE CON IMAGEN
            else {
    
                unlink( "../".$datos["rutaActual"] );
                
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
                
            }

            $respuesta = (new ModeloSubCategorias)->mdlActualizarSubcategoria($tabla, $datos, $rutaImagen);
            return $respuesta;
        }

    }
?>