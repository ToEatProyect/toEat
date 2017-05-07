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
                <th>Fecha creación</th>
              </tr>
            </thead>

            <tbody>
            <?php foreach ($recipes as $recipe): ?>

              <tr>
                <td><?php echo $recipe->title ?></td>
                <td><?php echo $recipe->created_at ?></td>
              </tr>

            <?php endforeach; ?>
            </tbody>

          </table>
        </div>

      <?php // No recipes? ?>
      <?php else: ?>

        <h1>Aún no has creado ninguna receta</h1>
        <p>¿Qué esperas? Empieza ya</p>
        <a href="/recipes/new-recipe" class="btn btn-default">Crear receta</a>

      <?php endif; ?>

    </div><!-- /.col-md-12 -->
  </div><!-- /.row -->
</div><!-- /.container -->