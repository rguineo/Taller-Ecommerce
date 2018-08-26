<?php 

class ControllerEnrutamiento {

	public function enrutamiento() {

		$ruta = $_GET["ruta"];

		if ($ruta == "home" ||
			$ruta == "slider" ||
			$ruta == "categorias" ||
			$ruta == "subcategorias" ||
			$ruta == "productos" ||
			$ruta == "salir") {

			include "views/modulos/".$ruta.".php";
		
		} else {
			include "views/modulos/error404.php";
		}


	}
}

?>