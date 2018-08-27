<?php
require_once "../controllers/categorias.controller.php";
require_once "../models/categorias.modelo.php";

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

$tipoOperacion = $_POST["tipoOperacion"];

if($tipoOperacion == "insertarCategoria") {
	$crearNuevaCategoria = new ajaxCategoria();
	$crearNuevaCategoria -> _categoria = $_POST["tituloCategorias"];
	$crearNuevaCategoria -> _ruta = $_POST["rutaCategorias"];
	$crearNuevaCategoria -> _imagen = $_FILES["imagenCategoria"];
	$crearNuevaCategoria -> crearCategoria();
}

if ($tipoOperacion == "editarSlider") {
	$editarSlider = new ajaxSlider();
	$editarSlider -> id_slider = $_POST["id_slider"];
	$editarSlider -> editarSlider();
}

/*
if ($tipoOperacion == "actualizarSlider") {
	$actualizarSlider = new ajaxSlider();
	$actualizarSlider -> id_slider = $_POST["id_slider"];
	$actualizarSlider -> titulo_slider = $_POST["tituloSlider"];
	$actualizarSlider -> descripcion_slider = $_POST["descripcionSlider"];
	$actualizarSlider -> vinculo_slider = $_POST["urlSlider"];
	$actualizarSlider -> imagen_slider = $_FILES["imagenSlider"];
	$actualizarSlider -> rutaActual = $_POST["rutaActual"];
	$actualizarSlider -> actualizarSlider();
}
if ($tipoOperacion == "eliminarSlider") {
	$eliminarSlider = new ajaxSlider();
	$eliminarSlider -> id_slider = $_POST["id_slider"];
	$eliminarSlider -> imagen_slider = $_POST["rutaImagen"];
	$eliminarSlider -> eliminarSlider();
}*/

?>