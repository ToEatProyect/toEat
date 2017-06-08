<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">

  <div class="row">
    <div class="col-md-12">

      <div class="jumbotron">
        <h1>Nuevo ingrediente</h1>
        <p>Crea nuevos ingredientes para que nuestros chefs puedan elaborar sus recetas</p>
      </div>

    </div>
  </div>

  <div class="row">
    <div class="col-md-6 col-md-offset-3">

      <?php echo form_open('') ?>

      <!-- Hidden whit id -->
      <div class="form-group">
        <input type="text" class="form-control hidden" value="<?php echo $ingredient->id ?>" id="id" name="id" />
      </div>

      <!-- Name -->
      <div class="form-group <?php echo form_error('name') ? 'has-error' : NULL ?>">
        <label for="name">
          Nombre del ingrediente
          <span class="text-danger" data-toggle="tooltip" data-placement="top" title="Obligatorio">*</span>
        </label>
        <input type="text" class="form-control"
               value="<?php echo set_value("name", $ingredient->name) ?>"
               id="name"
               name="name"
               maxlength="40"
               required />
        <?php if(form_error('name')): ?>
          <span class="text-danger"><?php echo form_error('name') ?></span>
        <?php endif; ?>
      </div><!-- /Name -->

      <input type="submit" class="btn btn-success" value="Modificar ingrediente">
      <?php echo form_close('') ?>

    </div>
  </div>
</div>