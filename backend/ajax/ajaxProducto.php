<?php
require_once "../controllers/producto.controller.php";
require_once "../models/producto.modelo.php";

Class ajaxproducto{
	public $_id_admin;
	public $_nombre_admin;
	public $_correo_admin;
	public $_password_admin;
    public $_avatar_admin;
    public $_rutaActual;

    public function crearproducto(){
		$datos = array(	"nombre_admin"=>$this->_nombre_admin,
                        "correo_admin"=>$this->_correo_admin,
                        "password_admin"=>$this->_password_admin,
                        "avatar_admin"=>$this->_avatar_admin);

		$respuesta = (new ControllerProducto)->ctrCrearproducto($datos);

		echo $respuesta;
	}

	public function editarproducto(){
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
    public function actualizarproducto(){
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

    if($tipoOperacion == "insertarproducto") {
        $crearNuevoproducto = new ajaxproducto();
        $crearNuevoproducto -> _nombre_admin = $_POST["nombre_admin"];
        $crearNuevoproducto -> _correo_admin = $_POST["correo_admin"];
        $crearNuevoproducto -> _password_admin = $_POST["password_admin"];
        $crearNuevoproducto -> _avatar_admin = $_FILES["avatar_admin"];
        $crearNuevoproducto -> crearproducto();
    }
    
    if ($tipoOperacion == "editarproducto") {
        $editarproducto = new ajaxproducto();
        $editarproducto -> _id_admin = $_POST["id_admin"];
        $editarproducto -> editarproducto();
    }
    
    if ($tipoOperacion == "actualizarproducto") {
        $actualizarproducto = new ajaxproducto();
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