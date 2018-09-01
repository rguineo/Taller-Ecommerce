<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor de Categorias
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Categorías</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

<div id='page-wrapper'>
  <div class='container-fluid'>
  <button class="btn btn-primary" data-toggle="modal" data-target="#modal-insertar-productos">Agregar Producto <i class="fas fa-plus"></i></button>
    <br><br>
      <div class='row'>
          <div class='col-lg-offset-1 col-lg-10'>
              <div class='table-responsive table_productos'>
                  <table class='table table-striped table-bordered table-hover tabla-usuarios table-dark' id='dataTables-example'>

                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Ruta</th>
                        <th scope="col">Thumbnail</th>
                        <th scope="col">Acciones</th>
                    </thead>
                    <tbody>

                      <?php 
                      
                      $categorias = ControllerCategorias::listarCategoriasCtr();

                      foreach ($categorias as $key => $value) {
                        echo '
                          <tr>
                            <th scope="row">'.$value["id"].'</th>
                            <td>'.$value["categoria"].'</td>
                            <td>'.$value["ruta"].'</td>
                            <td><img src="'.substr($value["imagen"], 3).'" id="imagenCategoria" alt="" class="thumbnail" width="75px" /></td>
                            <td width="100">
                              <button class="btn btn-sm btn-info btnEditarCategorias" idCategorias="'.$value["id"].'" data-toggle="modal" data-target="#modal-editar-categorias">
                                <i class="far fa-edit"></i>
                              </button>
                            </td>
                          </tr>
                        ';
                      }
                      ?>
                    </tbody>
                  </table>
              </div>
          </div>
      </div>
  </div>
</div>

    </section>
    <!-- /.content -->
  </div>