<?php

Class ctrCategorias{

    public function MostrarCategorias(){
        $table = "categorias";

        $categoria = new mdlCategoria();
        $categoria->setTabla();
        $respuesta = $categoria->mdlMostrarCategoria();
        return $respuesta;
    }

    public function AgregarCategoria(){

    }

}
?>