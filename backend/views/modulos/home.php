<?php
$respuesta = (new ControllerProducto)->ctrCuentaProductos();

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


      <!-- grafico -->

      <div id="container" style="width:100%; height:400px;"></div>



      
      <!-- <div id="grafico" data-highcharts-chart="0">
      </div>
      
      <div id="tablaDatos" class="tabla">
        <table id="datatable" class="table table-responsive datatable">
          <thead>
            <tr>
              <th>#</th>
              <th>Juan</th>
              <th>Pedro</th>
            </tr>
          </thead>

          <tbody>

            <tr>
              <th>manzana</th>
              <td>10</td>
              <td>50</td>
            </tr>

            <tr>
              <th>peras</th>
              <td>15</td>
              <td>45</td>
            </tr>
            
            <tr>
              <th>sandia</th>
              <td>20</td>
              <td>35</td>
            </tr>

          </tbody>
        </table>
      </div> -->

    </section>
    <!-- /.content -->
  </div>