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

      <button class="btn btn-primary" data-toggle="modal" data-target="#modal-insertar-categorias">Agregar Categoria <i class="fas fa-plus"></i></button>

      <table class="table table-dark">
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
                <td><img src="'.$value["imagen"].'" id="imagenCategoria" alt="" class="thumbnail" width="100" style="display: none"></td>
                <td width="100">
                  <button class="btn btn-sm btn-info btnEditarCategorias" idCategorias="'.$value["id"].'" data-toggle="modal" data-target="#modal-editar-categorias">
                    <i class="far fa-edit"></i>
                  </button>
                  <button class="btn btn-sm btn-danger btnEliminarCategorias" idCategorias="'.$value["id"].'">
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