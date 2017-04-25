<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
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
    <div id="navbar" class="navbar-collapse collapse">

      <ul class="nav navbar-nav navbar-right">
        <?php if(isset($userData)): ?>
          <li class="dropdown">

            <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button">
              <?php echo $userData->username ?>
              <span class="caret"></span>
            </a>

            <ul class="dropdown-menu">
              <li><a href="/recipes/new-recipe">Nueva receta</a></li>
              <li><a href="/logout">Desconectar</a></li>
            </ul>

          </li>
        <?php else: ?>
          <li><a href="/login">Entrar</a></li>
          <li><a href="/create-account">Crear cuenta</a></li>
        <?php endif; ?>
      </ul>

      <!-- Search form -->
      <ul class="nav navbar-nav navbar-right">
        <li>
          <form class="navbar-form navbar-right" action="/search/" method="get">
            <div class="input-group">

              <input type="text" class="form-control" name="q" placeholder="Search">

          <span class="input-group-btn">
            <button type="submit" class="btn btn-default">
              <i class="fa fa-search"></i>
            </button>
          </span>

            </div>
          </form>
        </li>
      </ul>
      <!-- /Search form -->

    </div><!-- /.navbar-collapse -->
  </div>
  <!-- /.container -->
</nav>