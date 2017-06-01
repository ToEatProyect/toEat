<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
  <div class="row">

    <!-- Recipe container -->
    <div class="col-md-8">
      <h2><?php echo $recipe->title ?></h2>
      <blockquote>
        <p>Valoración de los usuarios</p>
        <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $recipe->cooking_time ?> minutos</p>
        <small>Creada por <cite title="Source Title"><?php echo $owner ?></cite></small>
      </blockquote>

      <hr><!-- Line separator -->

      <!-- Image -->
      <div class="row">
        <div class="col-md-8 col-md-offset-2 recipe-img">
            <img class="img-responsive" src="/assets/img/recipes/<?php echo $recipe->image ?>" />
        </div>
      </div><!-- /Image -->

      <hr><!-- Line separator -->

      <!-- Description -->
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">Descripción</h3>
        </div>
        <div class="panel-body">
          <?php echo $recipe->description ?>
        </div>
      </div><!-- /Description -->

      <!-- Ingredients -->
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">Ingredientes (1 ración)</h3>
        </div>
        <div class="panel-body">
          Listado de ingredientes
        </div>
      </div><!-- /Ingredients -->

      <!-- Steps -->
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">Instrucciones</h3>
        </div>
        <div class="panel-body">
          Pasos
        </div>
      </div><!-- /Steps -->

    </div><!-- /Recipe container -->
    <div class="col-md-4">

    </div>
  </div>
</div>
