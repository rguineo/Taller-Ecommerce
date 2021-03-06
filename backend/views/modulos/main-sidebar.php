<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $_SESSION["avatar"]; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION["nombre"];?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menú</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="active"><a href="home"><i class="fa fa-link"></i> <span>Home</span></a></li>
        <li><a href="slider"><i class="fa fa-link"></i> <span>Slider</span></a></li>
        <li><a href="categorias"><i class="fa fa-link"></i> <span>Categorías</span></a></li>
        <li><a href="subcategorias"><i class="fa fa-link"></i> <span>Sub Categorías</span></a></li>
        <li><a href="productos"><i class="fa fa-link"></i> <span>Productos</span></a></li>
        <li><a href="usuarios"><i class="fa fa-link"></i> <span>Usuarios</span></a></li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>