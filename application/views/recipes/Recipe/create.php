<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">

      <?php echo form_open() ?>
      
        <!-- Title -->
        <div class="form-group <?php echo form_error('title') ? 'has-error' : NULL ?>">
          <label for="title">
            Título de la receta
            <span class="text-danger" data-toggle="tooltip" data-placement="top" title="Obligatorio">*</span>
          </label>
          <input type="text" class="form-control"
                 value="<?php echo set_value('title') ?>"
                 id="title"
                 name="title"
                 required/>
          <?php if(form_error('title')): ?>
            <span class="text-danger"><?php echo form_error('title') ?></span>
          <?php endif; ?>
        </div><!-- /Title -->

        <!-- Cooking time -->
        <div class="form-group <?php echo form_error('cooking_time') ? 'has-error' : NULL ?>">
          <label for="cooking_time">
            Tiempo de cocción
            <span class="text-danger" data-toggle="tooltip" data-placement="top" title="Obligatorio">*</span>
          </label>
          <input type="text"
                 class="form-control"
                 value="<?php echo set_value('cooking_time') ?>"
                 id="cooking_time"
                 name="cooking_time"
                 placeholder="En minutos"
                 required/>
          <?php if(form_error('cooking_time')): ?>
            <span class="text-danger"><?php echo form_error('cooking_time') ?></span>
          <?php endif; ?>
        </div><!-- /Cooking time -->

        <!-- Description -->
        <div class="form-group <?php echo form_error('recipe_description') ? 'has-error' : NULL ?>">
          <label for="recipe_description">
            Descripción de la receta
            <span class="text-danger" data-toggle="tooltip" data-placement="top" title="Obligatorio">*</span>
          </label>
          <textarea id="recipe_description"
                    name="recipe_description"
                    class="form-control"
                    rows="12"
                    required><?php echo set_value('recipe_description') ?></textarea>
          <?php if(form_error('recipe_description')): ?>
            <span class="text-danger"><?php echo form_error('recipe_description') ?></span>
          <?php endif; ?>
        </div><!-- /Description -->

      <input type="submit" class="btn btn-success" value="Crear receta">

      <?php echo form_close() ?>

    </div>
  </div>
</div>
