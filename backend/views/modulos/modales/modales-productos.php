<?php

  $categorias = new ControllerCategorias();
  $respCat = $categorias->listarCategoriasCtr();

  $subcategorias = new ControllerSubCategorias();
  $respSubCat = $subcategorias->listarSubCategoriasCtr();
?>
<div class="modal fade" id="modal-insertar-productos"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Insertar Nuevo Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formu-nuevo-productos">

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Categoría</label>
            <div class="col-sm-4">
              <select class="form-control" id="inputCategorias" name="idCategorias" required>
                <option value="">Elija la Categoría</option>
                <?php
                    foreach ($respCat as $key => $value) {
                    echo "<option value=".$value["id"]." rutaImagenCat=".$value["imagen"].">".$value["categoria"]."</option>";
                    }
                ?>
              </select>
            </div>
            <label class="col-sm-2 col-form-label">SubCategoría</label>
            <div class="col-sm-4">
              <select class="form-control" id="inputSubCategorias" name="idSubCategorias">
                <option value="">Elija la Sub-Categoría</option>
                <?php
                    foreach ($respSubCat as $key => $value) {
                    echo "<option value=".$value["id"]." rutaImagenCat=".$value["imagen"].">".$value["subcategoria"]."</option>";
                    }
                ?>
              </select>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Titulo</label>
            <div class="col-sm-10">
              <input type="text" id="titulo-productos"  class="form-control" placeholder="Titulo" onkeyup=""  required name="tituloProductos">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Ruta</label>
            <div class="col-sm-10">
              <input type="text" id="ruta-productos" class="form-control" placeholder="Ruta amigable" name="rutaProductos" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Descripción</label>
            <div class="col-sm-10">
              <input type="text" id="descripcion-productos"  class="form-control" placeholder="Descripcion Productos" onkeyup=""  required name="descripcionProductos">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Detalle</label>
            <div class="col-sm-10">
              <input type="text" id="detalle-productos"  class="form-control" placeholder="Detalle Productos" onkeyup=""  required name="detalleProductos">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Precio</label>
            <div class="col-sm-10">
              <input type="text" id="precio-productos"  class="form-control" placeholder="Precio Productos" onkeyup=""  required name="precioProductos">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Imagen</label>
            <div class="col-sm-10 conteImagenProd">
              <input type="file" class="form-control"  id="imagenNuevoProducto" name="imagenNewProducto"><br>
              <img src="" id="imagenNewProducto" alt="" class="thumbnail" width="100" style="display: none">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Oferta</label>
            <div class="col-sm-10">
              <input type="text" id="oferta-productos"  class="form-control" placeholder="Oferta Productos" onkeyup=""  required name="ofertaProductos">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Precio Oferta</label>
            <div class="col-sm-10">
              <input type="text" id="precioOferta-productos"  class="form-control" placeholder="Precio Oferta Productos" onkeyup=""  required name="precioOfertaProductos">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Descuento</label>
            <div class="col-sm-10">
              <input type="text" id="descuento-productos"  class="form-control" placeholder="Descuento Productos" onkeyup=""  required name="descuentoProductos">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Fin Oferta</label>
            <div class="col-sm-10">
              <input type="date" id="finOferta-productos"  class="form-control" placeholder="Fin Oferta Productos" onkeyup=""  required name="finOfertaProductos">
            </div>
          </div>
          <input type="hidden" name="tipoOperacion" value="insertarProducto">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- EDITAR PRODUCTO -->
<div class="modal fade" id="modal-editar-productos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formu-editar-productos">

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Categoría</label>
            <div class="col-sm-4">
              <input type="text" id="EdCategoria" name="EdCategoria" class="form-control" readonly>
            </div>
            <label class="col-sm-2 col-form-label">SubCategoría</label>
            <div class="col-sm-4">
            <input type="text" id="EdSubCategoria" name="EdSubCategoria" class="form-control" readonly>
            </div>
          </div>


          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Titulo</label>
            <div class="col-sm-10">
              <input type="text" id="Etitulo-productos"  class="form-control" placeholder="Titulo" onkeyup=""  required name="tituloProductos">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Ruta</label>
            <div class="col-sm-10">
              <input type="text" id="Eruta-productos" class="form-control" placeholder="Ruta amigable" name="rutaProductos" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Descripción</label>
            <div class="col-sm-10">
              <input type="text" id="descripcion-productos"  class="form-control" placeholder="Descripcion Productos" onkeyup=""  required name="descripcionProductos">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Detalle</label>
            <div class="col-sm-10">
              <input type="text" id="detalle-productos"  class="form-control" placeholder="Detalle Productos" onkeyup=""  required name="detalleProductos">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Precio</label>
            <div class="col-sm-10">
              <input type="text" id="precio-productos"  class="form-control" placeholder="Precio Productos" onkeyup=""  required name="precioProductos">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Imagen</label>
            <div class="col-sm-10 conteImagenProd">
              <input type="file" class="form-control" id="imagenNuevoProducto" name="imagenEdProducto"><br>
              <img src="" id="imagenEdProducto" alt="" class="thumbnail" width="100" name="EimagenProducto">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Oferta</label>
            <div class="col-sm-10">
              <input type="text" id="oferta-productos"  class="form-control" placeholder="Oferta Productos" onkeyup=""  required name="ofertaProductos">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Precio Oferta</label>
            <div class="col-sm-10">
              <input type="text" id="precioOferta-productos"  class="form-control" placeholder="Precio Oferta Productos" onkeyup=""  required name="precioOfertaProductos">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Descuento</label>
            <div class="col-sm-10">
              <input type="text" id="descuento-productos"  class="form-control" placeholder="Descuento Productos" onkeyup=""  required name="descuentoProductos">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Fin Oferta</label>
            <div class="col-sm-10">
              <input type="date" id="finOferta-productos"  class="form-control" placeholder="Fin Oferta Productos" onkeyup=""  required name="finOfertaProductos">
            </div>
          </div>
       
          <input type="hidden" name="tipoOperacion" value="actualizarProducto">
          <input type="hidden" name="rutaActual">
          <input type="hidden" name="id_slider">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
      </div>
    </div>
  </div>
</div>