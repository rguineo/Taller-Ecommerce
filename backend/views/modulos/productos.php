<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor de productos

      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <button class="btn btn-primary" data-toggle="modal" data-target="#modal-insertar-productos">Agregar Producto <i class="fas fa-plus"></i></button>

      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Ruta</th>
            <th scope="col">Titulo</th>
            <th scope="col">Descripción</th>
            <th scope="col">Detalle</th>
            <th scope="col">Precio</th>
            <th scope="col">Imagen</th>
            <th scope="col">Oferta</th>
            <th scope="col">Precio Oferta</th>
            <th scope="col">Descuento</th>
            <th scope="col">Fin Oferta</th>
        </thead>
        <tbody>

          <?php 
          
          $productos = ControllerProductos::listarProductosCtr();

          foreach ($productos as $key => $value) {
            echo '
              <tr>
                <th scope="row">'.$value["id"].'</th>
                <td>'.$value["ruta"].'</td>
                <td>'.$value["titulo"].'</td>
                <td>'.$value["descripcion"].'</td>
                <td>'.$value["detalle"].'</td>
                <td>'.$value["precio"].'</td>
                <td><img src="'.$value["imagen"].'" id="imagenProductos" alt="" class="thumbnail" width="100"></td>
                <td>'.$value["oferta"].'</td>
                <td>'.$value["precioOferta"].'</td>
                <td>'.$value["descuento"].'</td>
                <td>'.$value["finOferta"].'</td>
                <td width="100">
                  <button class="btn btn-sm btn-info btnEditarProductos" idProductos="'.$value["id"].'" data-toggle="modal" data-target="#modal-editar-productos">
                    <i class="far fa-edit"></i>
                  </button>
                  <button class="btn btn-sm btn-danger btnEliminarProductos" idProductos="'.$value["id"].'">
                    <i class="far fa-trash-alt"></i>
                  </button>
                </td>
              </tr>
            ';
          }
          ?>
        </tbody>
      </table>

    </section>
    <!-- /.content -->
  </div>