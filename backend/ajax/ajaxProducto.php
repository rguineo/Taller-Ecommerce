<?php
require_once "../controllers/producto.controller.php";
require_once "../models/producto.modelo.php";

Class ajaxProducto{
	public $_id_producto;
	public $_titulo_producto;
	public $_descripcion_producto;
	public $_detalle_producto;
    public $_precio_producto;
    public $_oferta_producto;
    public $_precioOferta_producto;
    public $_descuento_producto;
    public $_FinOferta_producto;
    public $_idCategoria_producto;
    public $_idSubCategoria_producto;
    public $_rutaActual;

    public function crearProducto(){
		$datos = array(	"titulo"=>$this->_titulo_producto,
                        "descripcion"=>$this->_descripcion_producto,
                        "deatalle"=>$this->_detalle_producto,
                        "precio"=>$this->_precio_producto,
                        "oferta"=>$this->_oferta_producto,
                        "preciooferta"=>$this->_precioOferta_producto,
                        "descuento"=>$this->_descuento_producto,
                        "finoferta"=>$this->_FinOferta_producto,
                        "idcategoria"=>$this->_idCategoria_producto,
                        "idsubcategoria"=>$this->_idSubCategoria_producto
                    );

		$respuesta = (new ControllerProducto)->ctrCrearproducto($datos);

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
        $crearNuevoproducto -> _titulo_producto = $_POST["nombre_admin"];
        $crearNuevoproducto -> _descripcion_producto = $_POST["correo_admin"];
        $crearNuevoproducto -> _detalle_producto = $_POST["password_admin"];
        $crearNuevoproducto -> _precio_producto = $_POST["password_admin"];
        $crearNuevoproducto -> _oferta_producto = $_POST["password_admin"];
        $crearNuevoproducto -> _precioOferta_producto = $_POST["password_admin"];
        $crearNuevoproducto -> _descuento_producto = $_POST["password_admin"];
        $crearNuevoproducto -> _FinOferta_producto = $_POST["password_admin"];
        $crearNuevoproducto -> _idCategoria_producto = $_POST["password_admin"];
        $crearNuevoproducto -> _idSubCategoria_producto = $_POST["password_admin"];
        
        $crearNuevoproducto -> _avatar_admin = $_FILES["avatar_admin"];
        $crearNuevoproducto -> crearPproducto();
    }
    
    if ($tipoOperacion == "editarProducto") {
        $editarproducto = new ajaxProducto();
        $editarproducto -> _id_admin = $_POST["id_admin"];
        $editarproducto -> editarproducto();
    }
    
    if ($tipoOperacion == "actualizarProducto") {
        $actualizarproducto = new ajaxProducto();
        $actualizarproducto -> _id_admin = $_POST["id_admin"];
        $actualizarproducto -> _nombre_admin = $_POST["nombre_admin"];
        $actualizarproducto -> _correo_admin = $_POST["correo_admin"];
        $actualizarproducto -> _password_admin = $_POST["password_admin"];
        $actualizarproducto -> _avatar_admin = $_FILES["avatar_admin"];
        $actualizarproducto -> _rutaActual = $_POST["rutaActual"];
        
        $actualizarproducto -> actualizarproducto();
    }
    if ($tipoOperacion == "eliminarproducto") {
        $eliminarproducto = new ajaxproducto();
        $eliminarproducto -> id_admin = $_POST["id_admin"];
        $eliminarproducto -> avatar_admin = $_POST["avatar_admin"];
        $eliminarproducto -> eliminarproducto();
    }
    
    ?>