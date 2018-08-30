<?php 

require_once "controllers/template.controller.php";
require_once "controllers/enrutamiento.controller.php";
require_once "controllers/sesion.controller.php";
require_once "controllers/slider.controller.php";
require_once "controllers/categorias.controller.php";
require_once "controllers/subcategorias.controller.php";
require_once "controllers/productos.controller.php";
require_once "controllers/usuario.controller.php";

require_once "models/sesion.modelo.php";
require_once "models/slider.modelo.php";
require_once "models/categorias.modelo.php";
require_once "models/subcategorias.modelo.php";
require_once "models/productos.modelo.php";
require_once "models/usuario.modelo.php";

$template = new ControllerTemplate();
$template -> template();


?>