<?php
require_once 'conexion.php';

Class mdlCategoria{
    private $_tabla;

    public function setTabla($tabla){
        $this->_tabla = $tabla;
    }

    public function getTabla(){
        return $this->_tabla;
    }

    public function mdlMostrarCategoria(){
        $table = $this->getTabla();
		$sql = Conexion::conectar()->prepare("SELECT * FROM $tabla");
		$sql -> execute();
		return $sql->fetchAll();
    }
}

?>