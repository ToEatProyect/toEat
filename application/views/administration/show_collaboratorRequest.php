<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container min-size-view-container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">

      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">Solicitud de usuario</h3>
        </div>
        <div class="panel-body">

          <p>Nombre</p>
          <p class="well"><?php echo $request->name ?></p>

          <p>Nombre de usuario</p>
          <p class="well"><?php echo $request->username ?></p>

          <p>Email</p>
          <p class="well"><?php echo $request->email ?></p>

          <p>Formación</p>
          <p class="well"><?php echo $request->education ?></p>

          <div class="btn-group btn-group-justified">
            <a href="<?php echo $request->username ?>/accept" class="btn btn-success">Aceptar</a>
            <a href="/users/collaborators-request" class="btn btn-success">Volver</a>
            <a href="<?php echo $request->username ?>/deny" class="btn btn-success">Rechazar</a>
          </div>
        </div><!-- /.panel-body -->
      </div><!-- /.panel -->

    </div>
  </div>
</div>
