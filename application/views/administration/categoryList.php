<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-8 col-md-offset-2">

      <?php // If exist some category ?>
      <?php if(count($categories) > 0): ?>

        <div class="table-responsive">
          <table class="table table-striped table-hover">

            <thead>
            <tr>
              <th>Nombre de la categoria</th>
              <th>Categoría superior</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($categories as $category): ?>

              <tr>
                <td><a href=""><?php echo $category->c_name ?></a></td>

                <?php if($category->parent == NULL): ?>
                  <td>Sin categoría</td>
                <?php else: ?>
                  <td><?php echo $category->parent ?></td>
                <?php endif; ?>
              </tr>

            <?php endforeach; ?>
            </tbody>

          </table>
        </div>

        <?php // No collaborator request? ?>
      <?php else: ?>

        <div class="jumbotron">
          <h1>Sin resultados</h1>
          <p>Actualmente no existe ninguna categoría creada</p>
          <p><a href="/category/new" class="btn btn-primary btn-lg">Crear categoría</a></p>
        </div>

      <?php endif; ?>

    </div><!-- /.col-md-12 -->
  </div><!-- /.row -->
</div><!-- /.container -->
