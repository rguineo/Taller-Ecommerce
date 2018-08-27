<?php

Class ajaxCategoria{
	public $_categoria;
	public $_ruta;
	public $_imagen;

	public function crearCategoria(){
		$datos = array("categoria"=>$this->_categoria,
						"ruta"=>$this->_ruta,
						"imagen"=>$this->_imagen);

		$respuesta = ControllerCategorias::ctrCrearCategoria($datos);

		echo $respuesta;
	}


}

?>