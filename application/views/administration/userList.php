<div class="container min-size-view-container">

  <div class="row">
    <div class="col-md-12">

      <div class="jumbotron">
        <h1>Listado de usuarios</h1>
        <p>Administración de usuarios de la aplicación</p>
        <p><a href="/users/new" class="btn btn-success btn-lg">Crear usuario</a></p>
      </div>

    </div>
  </div>

  <div class="row">
    <div class="col-md-10 col-md-offset-1">

      <?php // If exist some ingredient ?>
      <?php if(count($users) > 0): ?>

        <div class="table-responsive">
          <table class="table table-striped table-hover">

            <thead>
            <tr>
              <th>Usuario</th>
              <th>Email</th>
              <th>Fecha de creación</th>
              <th>Rol de usuario</th>
            </tr>
            </thead>

            <tbody>
            <?php foreach ($users as $user): ?>

              <tr>
                <?php if($user->auth_level == 9): ?>
                  <td><?php echo $user->username ?></td>
                <?php else: ?>
                  <td><a href="/users/show/<?php echo $user->username ?>"><?php echo $user->username ?></a></td>
                <?php endif; ?>
                <td><?php echo $user->email ?></td>
                <td><?php echo $user->created_at ?></td>
                <td><?php echo $user->auth_level ?></td>
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