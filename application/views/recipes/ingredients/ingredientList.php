<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container min-size-view-container">

  <div class="row">
    <div class="col-md-12">

      <div class="jumbotron">
        <h1>Listado de ingredientes</h1>
        <p>Si es necesario, crea nuevos ingredientes para que nuestros chefs puedan elaborar sus recetas.</p>
        <p>Puedes hacerlo pulsando el siguiente botón.</p>
        <p><a href="/ingredients/new" class="btn btn-success btn-lg"><i class="fa fa-plus" aria-hidden="true"></i> Crear ingrediente</a></p>
      </div>

    </div>
  </div>

  <div class="row">
    <div class="col-md-6 col-md-offset-3">

      <?php // If exist some ingredient ?>
      <?php if(count($ingredients) > 0): ?>

        <div class="table-responsive">
          <table class="table table-striped table-hover">

            <thead>
            <tr>
              <th>Nombre del ingrediente</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($ingredients as $ingredient): ?>

              <tr>
                <td><a href="/ingredients/modify/<?php echo $ingredient->slug ?>"><?php echo $ingredient->name ?></a></td>
              </tr>

            <?php endforeach; ?>
            </tbody>

          </table>
        </div>

      <?php // No ingredients? ?>
      <?php else: ?>

        <div class="jumbotron">
          <h1>Sin resultados</h1>
          <p>Actualmente no existe ningun ingrediente creado</p>
        </div>

      <?php endif; ?>

    </div><!-- /.col-md-12 -->
  </div><!-- /.row -->
</div><!-- /.container -->