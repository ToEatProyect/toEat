<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">

      <?php foreach ($request as $data): ?>
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">Solicitud de usuario</h3>
        </div>
        <div class="panel-body">

          <p>Nombre</p>
          <p class="well"><?php echo $data->name ?></p>

          <p>Nombre de usuario</p>
          <p class="well"><?php echo $data->username ?></p>

          <p>Email</p>
          <p class="well"><?php echo $data->email ?></p>

          <p>Formación</p>
          <p class="well"><?php echo $data->education ?></p>

          <div class="btn-group btn-group-justified">
            <a href="" class="btn btn-success">Aceptar</a>
            <a href="" class="btn btn-success">Rechazar</a>
          </div>
        </div><!-- /.panel-body -->
      </div><!-- /.panel -->
      <?php endforeach; ?>

    </div>
  </div>
</div>
