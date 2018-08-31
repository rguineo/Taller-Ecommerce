<?php
require_once "../controllers/usuario.controller.php";
require_once "../models/usuario.modelo.php";

Class ajaxUsuario{
	public $_id_admin;
	public $_nombre_admin;
	public $_correo_admin;
	public $_password_admin;
    public $_avatar_admin;
    public $_rutaActual;

    public function crearUsuario(){
		$datos = array(	"nombre_admin"=>$this->_nombre_admin,
                        "correo_admin"=>$this->_correo_admin,
                        "password_admin"=>$this->_password_admin,
                        "avatar_admin"=>$this->_avatar_admin);

		$respuesta = (new ControllerUsuario)->ctrCrearUsuario($datos);

		echo $respuesta;
	}

	public function editarUsuario(){
        $id_admin = $this->_id_admin;
        
        $respuesta = (new ControllerUsuario)->ctrEditarUsuario($id_admin);

        $datos = array("id_admin"=>$respuesta["id_admin"],
						"nombre_admin"=>$respuesta["nombre_admin"],
                        "correo_admin"=>$respuesta["correo_admin"],
                        "password_admin"=>$respuesta["password_admin"],
						"avatar_admin"=>substr($respuesta["avatar_admin"], 3)
						);

        echo json_encode($datos);

    }
    public function actualizarUsuario(){
		$datos = array( "id_admin"=>$this->_id_admin,
						"nombre_admin"=>$this->_nombre_admin,
						"correo_admin"=>$this->_correo_admin,
						"password_admin"=>$this->_password_admin,
                        "avatar_admin"=>$this->_avatar_admin,
                        "rutaActual"=>$this->_rutaActual
						);

		$respuesta = ControllerUsuario::ctrActualizarUsuario($datos);

		echo $respuesta;
	}

    public function eliminarUsuario(){
		$id_admin = $this->id_admin;
		$ruta = $this->avatar_admin;

		$respuesta = ControllerUsuario::ctrEliminarUsuario($id_admin, $ruta);

		echo $respuesta;

	}
}
    
    $tipoOperacion = $_POST["tipoOperacion"];

    if($tipoOperacion == "insertarUsuario") {
        $crearNuevoUsuario = new ajaxUsuario();
        $crearNuevoUsuario -> _nombre_admin = $_POST["nombre_admin"];
        $crearNuevoUsuario -> _correo_admin = $_POST["correo_admin"];
        $crearNuevoUsuario -> _password_admin = $_POST["password_admin"];
        $crearNuevoUsuario -> _avatar_admin = $_FILES["avatar_admin"];
        $crearNuevoUsuario -> crearUsuario();
    }
    
    if ($tipoOperacion == "editarUsuario") {
        $editarUsuario = new ajaxUsuario();
        $editarUsuario -> _id_admin = $_POST["id_admin"];
        $editarUsuario -> editarUsuario();
    }
    
    if ($tipoOperacion == "actualizarUsuario") {
        $actualizarUsuario = new ajaxUsuario();
        $actualizarUsuario -> _id_admin = $_POST["id_admin"];
        $actualizarUsuario -> _nombre_admin = $_POST["nombre_admin"];
        $actualizarUsuario -> _correo_admin = $_POST["correo_admin"];
        $actualizarUsuario -> _password_admin = $_POST["password_admin"];
        $actualizarUsuario -> _avatar_admin = $_FILES["avatar_admin"];
        $actualizarUsuario -> _rutaActual = $_POST["rutaActual"];
        
        $actualizarUsuario -> actualizarUsuario();
    }
    if ($tipoOperacion == "eliminarUsuario") {
        $eliminarUsuario = new ajaxUsuario();
        $eliminarUsuario -> id_admin = $_POST["id_admin"];
        $eliminarUsuario -> avatar_admin = $_POST["avatar_admin"];
        $eliminarUsuario -> eliminarUsuario();
    }
    
    ?>