<?php 

class ControllerSlider {

	public function ctrMostrarSlider() {

		$tabla = "slider";

		$respuesta = ModelSlider::mdlMostrarSlider($tabla);

		return $respuesta;

	}


}


 ?>
