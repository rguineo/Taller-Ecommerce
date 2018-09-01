<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gestor de Sub-Categorias
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="home"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Categorías</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

      <button class="btn btn-primary" data-toggle="modal" data-target="#modal-insertar-subcategorias">Agregar SubCategoria <i class="fas fa-plus"></i></button>

      <table class="table table-dark">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Categoría</th>
            <th scope="col">SubCategoria</th>
            <th scope="col">Ruta</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>

          <?php 
          
          $Subcategorias = ControllerSubCategorias::listarSubCategoriasCtr();
          
          foreach ($Subcategorias as $key => $value) {
            echo '
              <tr>
                <td>'.$value["id"].'</td>
                <td>'.$value["categoria"].'</td>
                <td>'.$value["subcategoria"].'</td>
                <td>'.$value["ruta"].'</td>
                <td width="100">
                  <button class="btn btn-sm btn-info btnEditarSubCategorias" id="'.$value["id"].'" data-toggle="modal" data-target="#modal-editar-Subcategorias">
                    <i class="far fa-edit"></i>
                  </button>
                  <button class="btn btn-sm btn-danger btnEliminarCategorias" id="'.$value["id"].'">
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