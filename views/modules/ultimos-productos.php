<?php 
$lastProductos = ControllerProductos::ctrMostrarLastProductos();
$nProductos = 0;

$ruta = (new Rutas)->urlBackEnd();

foreach ($lastProductos as $key => $value) {
	$nProductos = $nProductos + 1;
}

echo '
<div class="titProductos"><h1>'.$nProductos.' productos destacados</h1></div><br>

<div class="container-fluid">
	<div class="row">';
    foreach ($lastProductos as $key => $value) {
        echo '<div class="col-lg-3 col-md-6 col-sm-12 cardProductos">
                <div class="card h-100" style="width: 18rem;">
                    <img class="cardImg" src="'.$ruta.substr($value["imagen"], 3).'">';
                        if ($value["oferta"] == 1){
                            echo ' 
                            <span class="descuento">'.$value["descuento"].'%</span>
                            <span class="precioAnterior">Anterior $'.number_format($value["precio"], 0, '', '.').'</span>
                            <span class="precioOferta">Oferta $'.number_format($value["precioOferta"], 0, '', '.').'</span>';
                        }else{
                            echo '<span class="txtNormal">Precio Normal</span>
                            <span class="precioNormal">$'.number_format($value["precio"], 0, '', '.').'</span>';
                        };

                    echo '
                    <hr>
                    <div class="card-body">
                        <h5 class="card-title"><a href="#">'.$value["titulo"].'</a></h5>
                        <a href="#"><i class="far fa-heart fa-1.5x wish"></i></a>
                        <a href="#"><i class="fa fa-cart-plus fa-1.5x carruaje"></i></a>
                        <p class="card-text"></p>
                    </div>
                </div>
            </div>';
	}
?>
	</div>
</div>
<br>
<hr>