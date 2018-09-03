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
		$id = $this->_id;

		$respuesta = (new ControllerSubCategorias)->ctrEditarSubCategoria($id);
		
		$datos = array(	"id"			=>$respuesta["id"],
						"subcategoria"	=>$respuesta["subcategoria"],
						"ruta"		=>$respuesta["ruta"],
						"imagen"		=>substr($respuesta["imagen"], 3),
						"id_categoria"	=>$respuesta["id_categoria"]);
		
		echo json_encode($datos);
	}

	public function actualizarSubCategorias(){
		$datos = array(	"id" => $this->_id,
						"subcategoria"=> $this->_subCategoria,
						"ruta" => $this->_rutaSubcategoria,
						"imagen" => $this->_imagenSubcategoria,
						"id_categoria" => $this->_idCategoria,
						"rutaActual" => $this->_rutaActual);

		$respuesta = (new ControllerSubCategorias)->ctrActualizarSubcategoria($datos);

		echo $respuesta;

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
		$editarSubCategoria = new ajaxSubCategorias();
		$editarSubCategoria -> _id = $_POST["id_subcategoria"];
		$editarSubCategoria -> editarSubCategoria();
	}

	if ($tipoOperacion == "actualizarSubcategorias") {
		$actualizarSubCategoria = new ajaxSubCategorias();
		$actualizarSubCategoria -> _id = $_POST["idSub"];
		$actualizarSubCategoria -> _subCategoria = $_POST["subcategorias"];
		$actualizarSubCategoria -> _rutaSubcategoria = $_POST["urlSubcategoria"];
		$actualizarSubCategoria -> _imagenSubcategoria = $_FILES["imagenSubCategoria"];
		$actualizarSubCategoria -> _rutaActual = $_POST["rutaActual"];
		$actualizarSubCategoria -> _idCategoria = $_POST["id_categoria"];
		$actualizarSubCategoria -> actualizarSubCategorias();
	}
?>

