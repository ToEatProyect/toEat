<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php echo form_open($login_url) ?>
        <div class="form-group">
          <label for="login_string">Usename</label>
          <input type="text" class="form-control" name="login_string"
                 <?php // If the user fails authentication, maintains name ?>
                 <?php if(isset($login_string)) : ?>value="<?php echo $login_string ?>" <?php endif; ?>
                 id="login_string" autocomplete="off" maxlength="255" />
        </div>
        <div class="form-group">
          <label for="login_pass">Password</label>
          <input type="password" class="form-control" name="login_pass" id="login_pass" maxlength="255" />
        </div>
        <input type="submit" value="Enviar" class="btn btn-success"/>
      <?php echo form_close()?>
    </div>
  </div>
</div>