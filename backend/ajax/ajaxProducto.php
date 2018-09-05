<?php
require_once "../controllers/productos.controller.php";
require_once "../models/productos.modelo.php";

Class ajaxProducto{
    public $_id_producto;
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
                        "preciooferta"=>$this->_precioOferta_producto,
                        "descuento"=>$this->_descuento_producto,
                        "finoferta"=>$this->_FinOferta_producto,
                        "idcategoria"=>$this->_idCategoria_producto,
                        "idsubcategoria"=>$this->_idSubCategoria_producto
                    );

		$respuesta = (new ControllerProducto)->ctrCrearProducto($datos);

		echo $respuesta;
	}

	public function editarProducto(){
        $id_admin = $this->_id_admin;
        
        $respuesta = (new ControllerProducto)->ctrEditarproducto($id_admin);

        $datos = array("id_admin"=>$respuesta["id_admin"],
						"nombre_admin"=>$respuesta["nombre_admin"],
                        "correo_admin"=>$respuesta["correo_admin"],
                        "password_admin"=>$respuesta["password_admin"],
						"avatar_admin"=>substr($respuesta["avatar_admin"], 3)
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
		$id_admin = $this->id_admin;
		$ruta = $this->avatar_admin;

		$respuesta = ControllerProducto::ctrEliminarproducto($id_admin, $ruta);

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
        $crearNuevoproducto -> _imagen = $_POST["imagenNewProducto"];
        $crearNuevoproducto -> _oferta_producto = $_POST["ofertaProductos"];
        $crearNuevoproducto -> _precioOferta_producto = $_POST["precioOfertaProductos"];
        $crearNuevoproducto -> _descuento_producto = $_POST["descuentoProductos"];
        $crearNuevoproducto -> _FinOferta_producto = $_POST["finOfertaProductos"];
        $crearNuevoproducto -> _idCategoria_producto = $_POST["idCategorias"];
        $crearNuevoproducto -> _idSubCategoria_producto = $_POST["idSubCategorias"];        
        $crearNuevoproducto -> crearPproducto();
    }
    
    if ($tipoOperacion == "editarProducto") {
        $editarproducto = new ajaxProducto();
        $editarproducto -> _id_admin = $_POST["id"];
        $editarproducto -> editarproducto();
    }
    
    if ($tipoOperacion == "actualizarProducto") {
        $actualizarproducto = new ajaxProducto();
        $actualizarproducto -> _id_producto = $_POST["id"];
        $actualizarproducto -> _ruta = $_POST["ruta"];
        $actualizarproducto -> _titulo_producto = $_POST["titulo"];
        $actualizarproducto -> _descripcion_producto = $_POST["descripcion"];
        $actualizarproducto -> _detalle_producto = $_FILES["detalle"];
        $actualizarproducto -> _precio_producto = $_POST["precio"];
        $actualizarproducto -> _imagen = $_POST["imagen"];
        $actualizarproducto -> _oferta_producto = $_FILES["oferta"];
        $actualizarproducto -> _precioOferta_producto = $_POST["precioOferta"];
        $actualizarproducto -> _descuento_producto = $_FILES["descuento"];
        $actualizarproducto -> _FinOferta_producto = $_POST["finOferta"];
        $actualizarproducto -> _idCategoria_producto = $_FILES["id_categoria"];
        $actualizarproducto -> _idSubCategoria_producto = $_POST["id_subcategoria"];
        $actualizarproducto -> actualizarproducto();
    }
    if ($tipoOperacion == "eliminarproducto") {
        $eliminarproducto = new ajaxproducto();
        $eliminarproducto -> _id_producto = $_POST["id"];
        $eliminarproducto -> _ruta = $_POST["ruta"];
        $eliminarproducto -> eliminarproducto();
    }
    
    ?>