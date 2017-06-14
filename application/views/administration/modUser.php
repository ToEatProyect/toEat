<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container min-size-view-container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">

      <?php echo form_open('') ?>

      <!-- Hidden whit id -->
      <div class="form-group">
        <input type="text" class="form-control hidden" value="<?php echo $user->user_id ?>" id="id" name="id" />
      </div>

      <!-- Name and lastname -->
      <div class="form-group <?php echo form_error('name') ? 'has-error' : NULL ?>">
        <label for="name">
          Nombre y apellidos
          <span class="text-danger" data-toggle="tooltip" data-placement="top" title="Obligatorio">*</span>
        </label>
        <input type="text" class="form-control"
               value="<?php echo set_value("name", $user->name) ?>"
               id="name" name="name" maxlength="60" required />
        <?php if(form_error('name')): ?>
          <span class="text-danger"><?php echo form_error('name') ?></span>
        <?php endif; ?>
      </div><!-- /Name and lastname -->

      <!-- Username -->
      <div class="form-group <?php echo form_error('username') ? 'has-error' : NULL ?>">
        <label for="username">
          Nombre de usuario
          <span class="text-danger" data-toggle="tooltip" data-placement="top" title="Obligatorio">*</span>
        </label>
        <input type="text" class="form-control"
               value="<?php echo set_value("username", $user->username) ?>"
               id="username" name="username" maxlength="50"/>
        <?php if(form_error('username')): ?>
          <span class="text-danger"><?php echo form_error('username') ?></span>
        <?php endif; ?>
      </div><!-- /Username -->

      <!-- Email -->
      <div class="form-group <?php echo form_error('email') ? 'has-error' : NULL ?>">
        <label for="email">
          Correo electrónico
          <span class="text-danger" data-toggle="tooltip" data-placement="top" title="Obligatorio">*</span>
        </label>
        <input type="text" class="form-control"
               value="<?php echo set_value("email", $user->email) ?>"
               id="email" name="email" maxlength="50"/>
        <?php if(form_error('email')): ?>
          <span class="text-danger"><?php echo form_error('email') ?></span>
        <?php endif; ?>
      </div><!-- /Email -->

      <!-- Generate new random password -->
      <div class="form-group">
        <div class="checkbox">
          <label>
            <input type="checkbox" name="new-pass" value="true"> Generar nueva contraseña
          </label>
        </div>
      </div><!-- /Generate new random password -->

      <!-- Role -->
      <div class="form-group">
        <label for="role">
          Tipo de usuario
          <span class="text-danger" data-toggle="tooltip" data-placement="top" title="Obligatorio">*</span>
        </label>
        <select class="form-control" id="role" name="role" <?php echo $user->auth_level==9 ? 'disabled' : NULL ?>>

          <?php if($user->auth_level == 9): ?>
            <option value="9" <?php echo  set_select('role', '9', TRUE); ?>>Admin</option>
          <?php endif; ?>

          <?php for($i = 0; $i < sizeof($userTypes); $i++): ?>
            <?php if($userTypes[$i]['auth_level'] == $user->auth_level): ?>

              <option value="<?php echo $userTypes[$i]['auth_level'] ?>" <?php echo  set_select('role', $userTypes[$i]['auth_level'], TRUE) ?>>
                <?php echo $userTypes[$i]['name'] ?>
              </option>

            <?php else: ?>

              <option value="<?php echo $userTypes[$i]['auth_level'] ?>" <?php echo  set_select('role', $userTypes[$i]['auth_level']) ?>>
                <?php echo $userTypes[$i]['name'] ?>
              </option>

            <?php endif; ?>
          <?php endfor; ?>
        </select>
      </div><!-- /Role -->


      <div class="btn-group">
        <input type="submit" class="btn btn-success" value="Modificar usuario">
        <a href="/users/show/<?php echo $user->username ?>/delete" class="btn btn-success <?php echo $user->auth_level==9 ? 'disabled' : NULL ?>">Eliminar usuario</a>
      </div>
      <?php echo form_close('') ?>

    </div>
  </div>
</div>
