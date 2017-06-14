<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container min-size-view-container">

  <div class="row">
    <div class="col-md-12">

      <div class="jumbotron">
        <h1>Listado de comentarios</h1>
        <p>Buenas <strong><?php echo $username ?></strong></p>
        <p>Estos son todos tus comentarios, aquí podrás llevar una gestión sobre ellos.</p>
      </div>

    </div>
  </div>

  <div class="row">
    <div class="col-md-10 col-md-offset-1">

      <?php // If exist some ingredient ?>
      <?php if(count($comments) > 0): ?>

        <div class="table-responsive">
          <table class="table table-striped table-hover">

            <thead>
            <tr>
              <th>Receta</th>
              <th>Fecha de creación</th>
              <th>Última modificación</th>
              <th>Puntuacíon</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($comments as $comment): ?>

              <tr>
                <td><a href="/my-comments/<?php echo $comment->slug ?>"><?php echo $comment->title ?></a></td>
                <td><?php echo $comment->created_at ?></td>
                <td><?php echo $comment->lastModDate ?></td>
                <td><?php echo $comment->score ?>/5</td>
              </tr>

            <?php endforeach; ?>
            </tbody>

          </table>
        </div>

      <?php // No comments? ?>
      <?php else: ?>

        <div class="jumbotron">
          <h1>Sin resultados</h1>
          <p>Actualmente no has creado un comentario en ninguna receta</p>
        </div>

      <?php endif; ?>

    </div><!-- /.col-md-12 -->
  </div><!-- /.row -->
</div><!-- /.container -->