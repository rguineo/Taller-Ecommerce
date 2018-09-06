<?php
$respuesta = (new ControllerProducto)->ctrCuentaProductos();
$grafico = (new ControllerProducto)->ctrCantidadProducto();
?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor de administración
        <small>Datos del comercio</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">
      <div class="col-lg-3">
        <div class="info-box">
          <!-- Apply any bg-* class to to the icon to color it -->
          <span class="info-box-icon bg-green"><i class="fab fa-product-hunt"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Cantidad Productos</span>
            <span class="info-box-number"><?php echo $respuesta["cuenta"]; ?></span>
            <a href="productos">ver más</a>
            
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-lg-3">
        <div class="info-box">
          <!-- Apply any bg-* class to to the icon to color it -->
          <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Likes</span>
            <span class="info-box-number">93,139</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-lg-3">
        <div class="info-box">
          <!-- Apply any bg-* class to to the icon to color it -->
          <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Likes</span>
            <span class="info-box-number">93,139</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <div class="col-lg-3">
        <div class="info-box">
          <!-- Apply any bg-* class to to the icon to color it -->
          <span class="info-box-icon bg-yellow"><i class="fa fa-star-o"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Likes</span>
            <span class="info-box-number">93,139</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>

      <!-- grafico -->

    <div id="grafico" style="col-lg-12"></div>

    <div class="col-sm-6">
      <table id="datatable" class="table table-responsive">
          <thead>
              <tr>
                  <th>Productos</th>
                  <th>Categorias</th>

              </tr>
          </thead>
          <tbody>
            <?php 
              foreach ($grafico as $key => $value) {
                echo "            
                <tr>
                  <th>".$value["categoria"]."</th>
                  <td>".$value["cantidad"]."</td>
                </tr>";
              }
              ?>
          </tbody>
      </table>
    </div>  	
  
    </section>
    <!-- /.content -->
  </div>