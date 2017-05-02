<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">

      <?php echo form_open() ?>
      
        <!-- Title -->
        <div class="form-group <?php echo form_error('title') ? 'has-error' : NULL ?>">
          <label for="title">Título de la receta</label>
          <input type="text" class="form-control"
                 value="<?php set_value('title') ?>"
                 id="title" name="title"/>
          <?php if(form_error('title')): ?>
            <span class="text-danger"><?php echo form_error('title') ?></span>
          <?php endif; ?>
        </div><!-- /Title -->

        <!-- Description -->
        <div class="form-group <?php echo form_error('recipe_description') ? 'has-error' : NULL ?>">
          <label for="recipe_description">Descripción de la receta</label>
          <textarea id="recipe_description" name="recipe_description"
                    class="form-control"
                    rows="20"><?php set_value('recipe_description') ?></textarea>
        </div><!-- /Description -->

      <input type="submit" class="btn btn-success" value="Crear receta">

      <?php echo form_close() ?>

    </div>
  </div>
</div>
