<?php
require_once "../controllers/productos.controller.php";
require_once "../controllers/categorias.controller.php";
require_once "../controllers/subcategorias.controller.php";

require_once "../models/productos.modelo.php";
require_once "../models/categorias.modelo.php";
require_once "../models/subcategorias.modelo.php";

Class ajaxProducto{
    public $_idProducto;
    public $_ruta;
	public $_titulo_producto;
	public $_descripcion_producto;
	public $_detalle_producto;
    public $_precio_producto;
    public $_imagen;
    public $_oferta_producto;
    public $_precioOferta_producto;
    public $_descuento_producto;
    public $_FinOferta_producto;
    public $_idCategoria_producto;
    public $_idSubCategoria_producto;
    public $_rutaActual;

    public function crearProducto(){
		$datos = array(	"ruta"=>$this->_ruta,
                        "titulo"=>$this->_titulo_producto,
                        "descripcion"=>$this->_descripcion_producto,
                        "detalle"=>$this->_detalle_producto,
                        "precio"=>$this->_precio_producto,
                        "imagen"=>$this->_imagen,
                        "oferta"=>$this->_oferta_producto,
                        "precioOferta"=>$this->_precioOferta_producto,
                        "descuento"=>$this->_descuento_producto,
                        "finOferta"=>$this->_FinOferta_producto,
                        "id_categoria"=>$this->_idCategoria_producto,
                        "id_subcategoria"=>$this->_idSubCategoria_producto
                    );

		$respuesta = (new ControllerProducto)->ctrCrearProducto($datos);

		echo $respuesta;
	}

	public function editarProducto(){
        $id = $this->_idProducto;
        
        $respuesta = (new ControllerProducto)->ctrEditarProducto($id);

        $idCat = $respuesta["id_categoria"];  
        $categoria = (new ControllerCategorias)->ctrBuscarCategoria($idCat);

        $idSubCat = $respuesta["id_subcategoria"];
        $subcategoria = (new ControllerSubCategorias)->ctrBuscarSubCategoria($idSubCat);

        $datos = array("id"=>$respuesta["id"],
						"titulo"=>$respuesta["titulo"],
                        "ruta"=>$respuesta["ruta"],
                        "descripcion"=>$respuesta["descripcion"],
                        "detalle"=>$respuesta["detalle"],
                        "precio"=>$respuesta["precio"],
                        "imagen"=>substr($respuesta["imagen"], 3),
                        "imagenActual"=>$respuesta["imagen"],
                        "oferta"=>$respuesta["oferta"],
                        "precioOferta"=>$respuesta["precioOferta"],
                        "descuento"=>$respuesta["descuento"],
                        "finOferta"=>$respuesta["finOferta"],
                        "id_categoria"=>$respuesta["id_categoria"],
                        "id_subcategoria"=>$respuesta["id_subcategoria"],
                        "categoria"=>$categoria["categoria"],
                        "subcategoria"=>$subcategoria["subcategoria"]                        
                        );

        echo json_encode($datos);

    }
    public function actualizarProducto(){
		$datos = array( "id"=>$this->_idProducto,
						"tituloProducto"=>$this->_titulo_producto,
						"rutaProducto"=>$this->_ruta,
						"descripcion"=>$this->_descripcion_producto,
                        "detalle"=>$this->_detalle_producto,
                        "precio"=>$this->_precio_producto,
                        "imagen"=>$this->_imagen,
                        "oferta"=>$this->_oferta_producto,
                        "precioOferta"=>$this->_precioOferta_producto,
                        "descuento"=>$this->_descuento_producto,
                        "finOferta"=>$this->_FinOferta_producto,
                        "rutaActual"=>$this->_rutaActual
						);

		$respuesta = (new ControllerProducto)->ctrActualizarproducto($datos);

		echo $respuesta;
	}

    public function eliminarproducto(){
		$id = $this->_idProducto;
		$rutaActual = $this->_rutaActual;

		$respuesta = ControllerProducto::ctrEliminarProducto($id, $rutaActual);

		echo $respuesta;

	}
}
    
    $tipoOperacion = $_POST["tipoOperacion"];

    if($tipoOperacion == "insertarProducto") {
        $crearNuevoproducto = new ajaxProducto();
        $crearNuevoproducto -> _ruta = $_POST["rutaProductos"];
        $crearNuevoproducto -> _titulo_producto = $_POST["tituloProductos"];
        $crearNuevoproducto -> _descripcion_producto = $_POST["descripcionProductos"];
        $crearNuevoproducto -> _detalle_producto = $_POST["detalleProductos"];
        $crearNuevoproducto -> _precio_producto = $_POST["precioProductos"];
        $crearNuevoproducto -> _imagen = $_FILES["imagenNewProducto"];
        $crearNuevoproducto -> _oferta_producto = $_POST["ofertaProductos"];
        $crearNuevoproducto -> _precioOferta_producto = $_POST["precioOfertaProductos"];
        $crearNuevoproducto -> _descuento_producto = $_POST["descuentoProductos"];
        $crearNuevoproducto -> _FinOferta_producto = date($_POST["finOfertaProductos"]);
        $crearNuevoproducto -> _idCategoria_producto = $_POST["idCategorias"];
        $crearNuevoproducto -> _idSubCategoria_producto = $_POST["idSubCategorias"];        
        $crearNuevoproducto -> crearProducto();
    }
    
    if ($tipoOperacion == "editarProducto") {
        $editarproducto = new ajaxProducto();
        $editarproducto -> _idProducto = $_POST["id"];
        $editarproducto -> editarProducto();
    }
    
    if ($tipoOperacion == "actualizarProducto") {
        $actualizarproducto = new ajaxProducto();
        $actualizarproducto -> _idProducto = $_POST["id_producto"];
        $actualizarproducto -> _ruta = $_POST["rutaProductos"];
        $actualizarproducto -> _titulo_producto = $_POST["tituloProductos"];
        $actualizarproducto -> _descripcion_producto = $_POST["descripcionProductos"];
        $actualizarproducto -> _detalle_producto = $_POST["detalleProductos"];
        $actualizarproducto -> _precio_producto = $_POST["precioProductos"];
        $actualizarproducto -> _imagen = $_FILES["imagenEdProducto"];
        $actualizarproducto -> _oferta_producto = $_POST["ofertaProductos"];
        $actualizarproducto -> _precioOferta_producto = $_POST["precioOfertaProductos"];
        $actualizarproducto -> _descuento_producto = $_POST["descuentoProductos"];
        $actualizarproducto -> _FinOferta_producto = $_POST["finOfertaProductos"];
        $actualizarproducto -> _rutaActual = $_POST["rutaActual"];
        $actualizarproducto -> actualizarProducto();
    }
    if ($tipoOperacion == "eliminarProducto") {
        $eliminarproducto = new ajaxproducto();
        $eliminarproducto -> _idProducto = $_POST["id"];
        $eliminarproducto -> _rutaActual = $_POST["rutaActual"];
        $eliminarproducto -> eliminarproducto();
    }
    
    ?>