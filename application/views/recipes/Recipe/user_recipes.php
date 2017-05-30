<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">

      <?php // If user have recipes ?>
      <?php if(count($recipes) > 0): ?>

        <div class="jumbotron">
          <h1>Hola <strong><?php echo $userData->username ?></strong></h1>
          <p>Aquí podrás ver todas tus recetas y ver el estado en el que se encuentran.</p>
          <p><a href="/recipes/new-recipe" class="btn btn-success">Nueva receta</a></p>
        </div>

        <div class="row">
            <?php foreach ($recipes as $recipe): ?>

              <?php

                // Reformat date to print
                $date = new DateTime($recipe->created_at);

              ?>

              <div class="col-sm-4 col-md-3">
                <div class="thumbnail">
                  <img class="img-responsive" src="/assets/img/recipes/<?php echo $recipe->image ?>" />
                  <div class="caption">
                    <h5 class="recipe-title"><?php echo $recipe->title ?></h5>
                    <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $recipe->cooking_time ?> minutos</p>
                    <p><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $date->format('d-m-Y'); ?></p>
                    <?php if($recipe->published == 0): ?>
                      <p class="text-danger">No publicada</p>
                    <?php else: ?>
                      <p class="text-success">Publicada</p>
                    <?php endif; ?>
                    <a class="btn btn-success" href="">Detalles <i class="fa fa-angle-double-right fa-lg" aria-hidden="true"></i></a>
                  </div>
                </div>
              </div>

            <?php endforeach; ?>
        </div>

      <?php // No recipes? ?>
      <?php else: ?>

        <div class="jumbotron">
          <h1>No hay recetas</h1>
          <p>¿Aún no has creado ninguna receta? ¿Qué esperas? ¡Empieza ya!</p>
          <p><a href="/recipes/new-recipe" class="btn btn-success">Crear receta</a></p>
        </div>

      <?php endif; ?>

    </div><!-- /.col-md-12 -->
  </div><!-- /.row -->
</div><!-- /.container -->