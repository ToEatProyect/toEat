<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container min-size-view-container">
  <div class="row">
    <div class="col-md-12">

      <?php // If exist some collaborator request ?>
      <?php if(count($requests) > 0): ?>

        <div class="table-responsive">
          <table class="table table-striped table-hover">

            <thead>
            <tr>
              <th>Nombre de usuario</th>
              <th>Nombre y apellidos</th>
              <th>Correo</th>
              <th>Fecha de la solicitud</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($requests as $request): ?>

              <tr>
                <td><a href="/users/collaborators-request/<?php echo $request->username ?>"><?php echo $request->username ?></a></td>
                <td><?php echo $request->name ?></td>
                <td><?php echo $request->email ?></td>
                <td><?php echo $request->created_at ?></td>
              </tr>

            <?php endforeach; ?>
            </tbody>

          </table>
        </div>

        <?php // No collaborator request? ?>
      <?php else: ?>

        <div class="jumbotron">
          <h1>Sin resultados</h1>
          <p>En este momento no hay ninguna solicitud para nuevos colaboradores pendiente</p>
        </div>

      <?php endif; ?>

    </div><!-- /.col-md-12 -->
  </div><!-- /.row -->
</div><!-- /.container -->