<?php
require_once "../controllers/subcategorias.controller.php";
require_once "../models/subcategorias.modelo.php";

Class ajaxSubCategorias{
    public $_id;
	public $_idCategoria;
	public $_idSubCategoria;
    public $_subCategoria;
    public $_rutaSubcategoria;
    public $_imagenSubcategoria;


    public function eliminarSubCategorias(){
        $id = $this->_id;
        $ruta = $this->_imagenSubcategoria;

		$respuesta = (new ControllerSubCategorias)->ctrEliminarSubCategorias($id, $ruta);

        echo $respuesta;
    }

    public function crearSubCategorias(){
		$datos = array("subcategoria"=>$this->_subCategoria,
                        "ruta"=>$this->_rutaSubcategoria,
                        "id_categoria"=>$this->_idCategoria,
						"imagen"=>$this->_imagenSubcategoria);

		$respuesta = (new ControllerSubCategorias)->ctrCrearSubCategorias($datos);

		echo $respuesta;
	}

	public function editarSubCategoria(){
		$id = $this->_idSubCategoria;

		$respuesta = (new ControllerSubCategorias)->ctrEditarSubCategoria($id);
		
		$datos = array(	"id"			=>$respuesta["id"],
						"subcategoria"	=>$respuesta["subcategoria"],
						"vinculo"		=>$respuesta["ruta"],
						"imagen"		=>$respuesta["imagen"],
						"id_categoria"	=>$respuesta["id_categoria"]);
		
		print_r($datos);
	}

}

    $tipoOperacion = $_POST["tipoOperacion"];

    if ($tipoOperacion == "eliminarSubCategorias") {
        $eliminarSubCategorias = new ajaxSubCategorias();
		$eliminarSubCategorias -> _id = $_POST["id"];
		$eliminarSubCategorias -> _imagenSubcategoria = $_POST["rutaImagen"];
        $eliminarSubCategorias -> eliminarSubCategorias();
    }

	if($tipoOperacion == "insertarSubCategoria") {
        $crearNuevaSubCategoria = new ajaxSubCategorias();
        $crearNuevaSubCategoria -> _idCategoria = $_POST["idCategorias"];
		$crearNuevaSubCategoria -> _subCategoria = $_POST["NomSubCate"];
		$crearNuevaSubCategoria -> _rutaSubcategoria = $_POST["rutaSubCategorias"];
		$crearNuevaSubCategoria -> _imagenSubcategoria = $_FILES["imagenSubCategoria"];
		$crearNuevaSubCategoria -> crearSubCategorias();
	}

	if ($tipoOperacion == "editarSubcategoria") {
		$editarCategoria = new ajaxSubCategorias();
		$editarCategoria -> _idSubCategoria = $_POST["id_subcategoria"];
		$editarCategoria -> editarSubCategoria();
	}

	if ($tipoOperacion == "actualizarCategoria") {
		$actualizarCategoria = new ajaxSubCategorias();
		$actualizarCategoria -> _idCategoria = $_POST["id"];
		$actualizarCategoria -> _categoria = $_POST["EtituloCategoria"];
		$actualizarCategoria -> _ruta = $_POST["ErutaCategoria"];
		$actualizarCategoria -> _imagen = $_FILES["imagenCategoria"];
		$actualizarCategoria -> _rutaActual = $_POST["rutaActual"];
		$actualizarCategoria -> actualizarCategorias();
	}
?>

