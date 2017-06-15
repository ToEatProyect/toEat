<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container min-size-view-container">

  <!-- Heading Row -->
  <div class="row">
    <div class="col-md-8">
      <img class="img-responsive img-rounded" src="/assets/img/imgRecipe_test2.jpg" alt="">
    </div>
    <!-- /.col-md-8 -->
    <div class="col-md-4">
      <h1>To Eat!</h1>
      <p>
        ¿Buscas algo muy concreto? ¿Estás en casa y no sabes que cocinar?
        ¡Ningun problema! Nosotros te ayudamos a encontrar justo lo que necesitas
      </p>
      <a class="btn btn-success btn-lg" href="/search/index">¡Pulsa aquí!</a>
    </div>
    <!-- /.col-md-4 -->
  </div>
  <!-- /.row -->

  <hr>

  <!-- Call to Action Well -->
  <div class="row">
    <div class="col-lg-12">
      <div class="well text-center">
        <strong>Si quieres colaborar con nosotros creando recetas puedes hacerlo haciendo clic <a href="/new-collaborator-request">aquí</a></strong>
      </div>
    </div>
    <!-- /.col-lg-12 -->
  </div>
  <!-- /.row -->

  <div class="row">
    <?php foreach ($recipes as $recipe): ?>

      <?php

      // Reformat date to print
      $date = new DateTime($recipe->created_at);

      ?>

      <div class="col-sm-4 col-md-4">
        <div class="thumbnail">
          <a href="<?php echo print_recipe_url($recipe) ?>">
            <?php echo print_recipe_image($recipe, "img img-responsive") ?>
          </a>
          <div class="caption">

            <h5 class="recipe-title"><?php echo $recipe->title ?></h5>
            <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $recipe->cooking_time ?> minutos</p>
            <p><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $date->format('d-m-Y'); ?></p>

          </div>
        </div>
      </div>

    <?php endforeach; ?>
  </div>

</div>
<!-- /.container -->