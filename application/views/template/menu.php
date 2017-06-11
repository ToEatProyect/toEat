<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">
        <img src="/assets/img/toeat-icon.gif" alt="toeat-icon">
      </a>
    </div>
    <!-- /.navbar-header -->
    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">

      <ul class="nav navbar-nav navbar-left">

        <?php for( $i = 0; $i < sizeof($menu); $i++): ?>

          <li class="dropdown">
            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">
              <?php echo $menu[$i]['title'] ?>
              <span class="caret"></span>
            </a>

            <ul class="dropdown-menu">

              <?php for( $j = 1; $j <= $menu[$i]['n_child']; $j++): ?>
                <li><a href="/recipes/category/<?php echo $menu[$i]['children']['item-' . $j]['slug'] ?>"><?php echo $menu[$i]['children']['item-' . $j]['name']?></a></li>
              <?php endfor; ?>

            </ul>

          </li>

        <?php endfor; ?>

        <?php if(isset($userData)): ?>
          <li><a href="/recipes/my-recipes">Mis recetas</a></li>
        <?php endif; ?>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <?php if(isset($userData)): ?>
          <li class="dropdown">

            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">
              <?php echo $userData->username ?>
              <span class="caret"></span>
            </a>

            <ul class="dropdown-menu">
              <li><a href="/recipes/new-recipe">Nueva receta</a></li>
              <li><a href="/users/collaborators-request">Solicitudes de colaborador</a></li>
              <li><a href="/category/new">Nueva categoría</a></li>
              <li><a href="/category/list">Listado categorías</a></li>
              <li><a href="/users/new">Nuevo usuario (admin)</a></li>
              <li><a href="/users">Lista usuarios (admin)</a></li>
              <li><a href="/ingredients">Listado ingredientes</a></li>
              <li><a href="/ingredients/new">Nuevo ingrediente</a></li>
              <li><a href="/logout">Desconectar</a></li>
            </ul>

          </li>
        <?php else: ?>
          <li><a href="/login">Entrar</a></li>
          <li><a href="/create-account">Crear cuenta</a></li>
        <?php endif; ?>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div>
  <!-- /.container -->
</nav>