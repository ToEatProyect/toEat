<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">

      <?php // If user have recipes ?>
      <?php if(count($recipes) > 0): ?>

        <div class="table-responsive">
          <table class="table table-striped table-hover">

            <thead>
              <tr>
                <th>Nombre de la receta</th>
                <th>Tiempo de cocción</th>
                <th>Fecha creación</th>
                <th>Publicada</th>
              </tr>
            </thead>

            <tbody>
            <?php foreach ($recipes as $recipe): ?>

              <tr>
                <td><?php echo $recipe->title ?></td>
                <td><?php echo $recipe->cooking_time ?></td>
                <td><?php echo $recipe->created_at ?></td>

                  <?php if($recipe->published == 0): ?>
                    <td>No</td>
                  <?php else: ?>
                    <td>Si</td>
                  <?php endif; ?>

              </tr>

            <?php endforeach; ?>
            </tbody>

          </table>
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