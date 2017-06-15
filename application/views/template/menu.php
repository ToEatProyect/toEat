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
          <?php echo $userData->auth_level == 3 ? '<li><a href="/recipes/my-recipes">Mis recetas</a></li>' : NULL ?>
          <?php echo $userData->auth_level != 9 ? '<li><a href="/my-comments">Mis comentarios</a></li>' : NULL ?>
        <?php endif; ?>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <?php if(isset($userData)): ?>
          <li class="dropdown">

            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">
              <i class="toEat-login-user fa fa-user fa-2x" aria-hidden="true"></i>
              <?php echo $userData->username ?>
              <span class="caret"></span>
            </a>

            <ul class="dropdown-menu">

              <!-- New recipe - Only collaborator -->
              <?php echo $userData->auth_level == 3 ? '<li><a href="/recipes/new-recipe">Nueva receta</a></li>' : NULL ?>

              <!-- My recipes - Only collaborator -->
              <?php echo $userData->auth_level == 3 ? '<li><a href="/recipes/my-recipes">Mis recetas</a></li>' : NULL ?>

              <!-- My comments - All less admin -->
              <?php echo $userData->auth_level != 9 ? '<li><a href="/my-comments">Mis comentarios</a></li>' : NULL ?>

              <!-- Collaborator request - Admin and moderators -->
              <?php echo $userData->auth_level == 9 || $userData->auth_level == 6
                ? '<li><a href="/users/collaborators-request">Solicitudes de colaborador</a></li>' : NULL ?>

              <!-- Users - Only admin -->
              <?php echo $userData->auth_level == 9 ? '<li><a href="/users">Usuarios</a></li>' : NULL ?>

              <!-- Categories - Only admin -->
              <?php echo $userData->auth_level == 9 ? '<li><a href="/category/list">Categorías</a></li>' : NULL ?>

              <!-- Ingredients - Only admin -->
              <?php echo $userData->auth_level == 9 ? '<li><a href="/ingredients">Ingredientes</a></li>' : NULL ?>

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