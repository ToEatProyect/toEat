<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">

      <?php echo form_open('', ["class" => "form-create-account"]) ?>
        <!-- Name and lastname -->
        <div class="form-group">
          <label for="userData">
            Nombre y apellidos
            <span class="text-danger" data-toggle="tooltip" data-placement="top" title="Obligatorio">*</span>
          </label>
          <input type="text" class="form-control"
                 value="<?php echo set_value("name_lastname") ?>"
                 id="userData" name="name_lastname" maxlength="60" required />
        </div><!-- /Name and lastname -->

        <!-- Username -->
        <div class="form-group <?php echo form_error('username') ? 'has-error' : NULL ?>">
          <label for="username">
            Usuario
            <span class="text-danger" data-toggle="tooltip" data-placement="top" title="Obligatorio">*</span>
          </label>
          <input type="text" class="form-control"
                 value="<?php echo set_value("username") ?>"
                 id="username" name="username" maxlength="50" required />
          <?php if(form_error('username')): ?>
            <span class="text-danger"><?php echo form_error('username') ?></span>
          <?php endif; ?>
        </div><!-- /Username -->

        <!-- Email -->
        <div class="form-group">
          <label for="email">
            Correo electrónico
            <span class="text-danger" data-toggle="tooltip" data-placement="top" title="Obligatorio">*</span>
          </label>
          <input type="text" class="form-control"
                 value="<?php echo set_value("email") ?>"
                 id="email" name="email" maxlength="50" required />
        </div><!-- /Password -->

        <!-- Password -->
        <div class="form-group">
          <label for="pass">
            Contraseña
            <span class="text-danger" data-toggle="tooltip" data-placement="top" title="Obligatorio">*</span>
          </label>
          <input type="password" class="form-control" id="pass" name="pass" maxlength="50" required />
        </div><!-- /Password -->

        <!-- Password confirmation -->
        <div class="form-group">
          <label for="passconf">
            Repetir contraseña
            <span class="text-danger" data-toggle="tooltip" data-placement="top" title="Obligatorio">*</span>
          </label>
          <input type="password" class="form-control" id="passconf" name="passconf" maxlength="50" required />
        </div><!-- /Password confirmation -->

        <input type="submit" class="btn btn-success" value="Crear cuenta">
      <?php echo form_close('') ?>

    </div>
  </div>
</div>
