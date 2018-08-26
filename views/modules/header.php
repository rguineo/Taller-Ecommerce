<header class="cabezal" id="cabezal">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3 col-md-12 logoHeader">
              <a href="index.php"><h1 class="logo">Logotipo</h1></a>
          </div>
          <div class="col-lg-6 col-md-7">
            <form class="buscador">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <button class="btn btn-default backColor input-group-text" id="btnCategorias">Categorias <i class="fas fa-chevron-down separarLeft"></i></button>
                </div>
                <input type="text" class="form-control" placeholder="Ej. Zapatillas Rojas">
                <div class="input-group-append">
                  <button class="btn btn-default backColor input-group-text"><i class="fas fa-search"></i></button>
                </div>
              </div>  
            </form>
            
          </div>
          <div class="col-lg-3 col-md-5 accionesUsuario text-center">
            <div class="carrito">
              <i class="fas fa-shopping-cart fa-lg"></i>
              <br>
              <span>$</span>
            </div>
            <div class="deseos">
              <i class="far fa-heart fa-lg"></i>
              <br>
              <span>Mis Deseos</span>
            </div>
            <div class="cuenta">
              <i class="fas fa-user fa-lg"></i>
              <br>
              <span>Mi cuenta</span>
            </div>

          </div>
        </div>
      </div>
    </header>
    
    <div id="capa"></div>


    <div class="container backColor categorias" id="categorias">
      <div class="row">

        <?php 
        $columna = null;
        $valor = null;
        $categoria = ControllerProductos::ctrMostrarCategorias($columna, $valor);

        //var_dump($categoria);

        foreach ($categoria as $key => $value) {
          echo '
              <div class="col-lg-2 col-md-4 col-sm-6 col-12">
                <a href="'.$value["ruta"].'"><h2>'.$value["categoria"].'</h2></a>
                <hr>
                <ul>';
                $columna = "id_categoria";
                $valor = $value["id"];
                $subcategoria = ControllerProductos::ctrMostrarSubCategorias($columna, $valor);

                foreach ($subcategoria as $key => $value) {
                  echo '<a href="'.$value["ruta"].'"><li>'.$value["subcategoria"].'</li></a>';
                }
          echo '        
                </ul>
              </div>

          ';
        }

        ?>

        
      </div>
    </div>