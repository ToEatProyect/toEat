<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">
      <?php echo form_open($login_url) ?>

        <!-- Username -->
        <div class="form-group <?php echo isset($login_error_message) ? "has-error" : "" ?>">
          <label for="login_string">Nombre de usuario</label>
          <input type="text" class="form-control" name="login_string"
                 <?php // If the user fails authentication, maintains name ?>
                 <?php if(isset($login_string)) : ?>value="<?php echo $login_string ?>" <?php endif; ?>
                 id="login_string" autocomplete="off" maxlength="255" />
        </div><!-- /Username -->

        <!-- Password -->
        <div class="form-group">
          <label for="login_pass">Contraseña</label>
          <input type="password" class="form-control" name="login_pass" id="login_pass" maxlength="255" />
          <?php if(isset($login_string)): ?>
            <span class="text-danger">Datos incorrectos. Inténtelo de nuevo.</span>
          <?php endif; ?>
        </div><!-- /Password -->

        <input type="submit" value="Enviar" class="btn btn-success"/>
      <?php echo form_close()?>
    </div>
  </div>
</div>