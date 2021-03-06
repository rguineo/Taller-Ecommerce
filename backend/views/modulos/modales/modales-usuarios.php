<div class="modal fade" id="modal-insertar-usuario"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insertar Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formu-nuevo-usuario">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
              <input type="text" id="nombre_admin" class="form-control" placeholder="Nombre" required name="nombre_admin">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Correo</label>
            <div class="col-sm-10">
              <input type="text" id="correo_admin"  class="form-control" placeholder="Correo Usuarios" onkeyup=""  required name="correo_admin">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password" id="password_admin"  class="form-control" placeholder="Password Usuarios" onkeyup=""  required name="password_admin">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Avatar</label>
            <div class="col-sm-10 conteImagenCat">
              <input type="file" class="form-control"  id="imagenNuevaUsuario" name="avatar_admin"><br>
              <img src="" id="avatar_admin" alt="" class="thumbnail" width="100">
            </div>
          </div>
          <input type="hidden" name="tipoOperacion" value="insertarUsuario">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- EDITAR USUARIO -->
<div class="modal fade" id="modal-editar-usuario" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formu-editar-usuario">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nombre</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Nombre" required name="nombre_admin">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Correo</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="Correo" required name="correo_admin">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-10">
              <input type="password"  class="form-control" placeholder="Password" required name="password_admin">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Avatar</label>
            <div class="col-sm-10 conteEditarImagen">
              <input type="file" class="form-control"  id="imagenEditarUsuario" name="avatar_admin">
              <br>
              <img src="" id="avatar_admin" alt="" class="thumbnail" width="200">
            </div>
          </div>
       
          <input type="hidden" name="tipoOperacion" value="actualizarUsuario">
          <input type="hidden" name="rutaActual">
          <input type="hidden" name="id_admin">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
      </div>
    </div>
  </div>
</div>