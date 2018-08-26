<div class="container-fluid slider" id="slider">
    <div class="row">

      <ul>
        <?php 
        $slider = ControllerSlider::ctrMostrarSlider();

        foreach ($slider as $key => $value) {
          echo '
            <li>
              <img src="'.$urlBackEnd.'views/dist/img/slider/back_default.jpg" alt="">
              <div class="infoSlide">
                <div class="textoSlide">
                  <h1>'.$value["titulo"].'</h1>
                  <p>'.$value["descripcion"].'</p>
                  <a href="'.$value["url"].'" class="btn btn-default backColor">
                    ver detalle <i class="fas fa-chevron-right"></i>
                  </a>
                </div>
                <img src="'.$urlBackEnd.substr($value["rutaImg"], 3).'" alt="">
              </div>
            </li>
          ';
        }

        ?>
      </ul>

      <div class="flechas" id="left"><i class="fas fa-chevron-left"></i></div>
      <div class="flechas" id="right"><i class="fas fa-chevron-right"></i></div>
      
      <ol id="paginacion">
        <?php 
        for ($i = 1; $i <= count($slider); $i++) {
          echo '<li item="'.$i.'"><i class="fas fa-circle"></i></li>';
        }
        ?>
      </ol>

    </div>    
</div>
