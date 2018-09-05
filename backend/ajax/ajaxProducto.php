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
		$datos = array( "id_admin"=>$this->_id_admin,
						"nombre_admin"=>$this->_nombre_admin,
						"correo_admin"=>$this->_correo_admin,
						"password_admin"=>$this->_password_admin,
                        "avatar_admin"=>$this->_avatar_admin,
                        "rutaActual"=>$this->_rutaActual
						);

		$respuesta = ControllerProducto::ctrActualizarproducto($datos);

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
        $actualizarproducto -> _id_producto = $_POST["id"];
        $actualizarproducto -> _ruta = $_POST["ruta"];
        $actualizarproducto -> _titulo_producto = $_POST["titulo"];
        $actualizarproducto -> _descripcion_producto = $_POST["descripcion"];
        $actualizarproducto -> _detalle_producto = $_POST["detalle"];
        $actualizarproducto -> _precio_producto = $_POST["precio"];
        $actualizarproducto -> _imagen = $_FILES["imagen"];
        $actualizarproducto -> _oferta_producto = $_POST["oferta"];
        $actualizarproducto -> _precioOferta_producto = $_POST["precioOferta"];
        $actualizarproducto -> _descuento_producto = $_POST["descuento"];
        $actualizarproducto -> _FinOferta_producto = $_POST["finOferta"];
        $actualizarproducto -> _idCategoria_producto = $_POST["id_categoria"];
        $actualizarproducto -> _idSubCategoria_producto = $_POST["id_subcategoria"];
        $actualizarproducto -> actualizarproducto();
    }
    if ($tipoOperacion == "eliminarProducto") {
        $eliminarproducto = new ajaxproducto();
        $eliminarproducto -> _idProducto = $_POST["id"];
        $eliminarproducto -> _rutaActual = $_POST["rutaActual"];
        $eliminarproducto -> eliminarproducto();
    }
    
    ?>