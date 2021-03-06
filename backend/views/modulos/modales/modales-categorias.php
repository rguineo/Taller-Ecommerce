<div class="modal fade" id="modal-insertar-categorias"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insertar Nueva Categoría</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formu-nuevo-categorias">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Categoria</label>
            <div class="col-sm-10">
              <input type="text" id="titulo-categoria" class="form-control" placeholder="Categoria" required name="tituloCategorias">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Ruta</label>
            <div class="col-sm-10">
              <input type="text" id="ruta-categoria"  class="form-control" placeholder="Ruta amigable" onkeyup=""  required name="rutaCategorias" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Imagen</label>
            <div class="col-sm-10 conteImagenCat">
              <input type="file" class="form-control" id="imagenNueva" name="imagenCategoria"><br>
              <img src="" id="imagenCategoria" alt="" class="thumbnail" width="100">
            </div>
          </div>
          <input type="hidden" name="tipoOperacion" value="insertarCategoria">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- EDITAR Categorias -->
<div class="modal fade" id="modal-editar-categorias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formu-editar-categoria">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Título</label>
            <div class="col-sm-10">
              <input type="text" id="EtituloCategoria" class="form-control" placeholder="Titulo" required name="EtituloCategoria">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Imagen</label>
            <div class="col-sm-10 conteEditarImagen">
              <input type="file" class="form-control"  id="imagen" name="imagenCategoria">
              <br>
              <img src="" id="imagenCategoria" alt="" class="thumbnail" width="200">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Vínculo</label>
            <div class="col-sm-10">
              <input type="text" id="ErutaCategoria" class="form-control" placeholder="vínculo" required name="ErutaCategoria" readonly>
            </div>
          </div>
       
          <input type="hidden" name="tipoOperacion" value="actualizarCategoria">
          <input type="hidden" name="rutaActual">
          <input type="hidden" name="id">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
      </div>
    </div>
  </div>
</div>