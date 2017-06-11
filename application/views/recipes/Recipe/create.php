<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">

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

      <div class="row">

        <!-- Ingredients -->
        <div class="col-md-8 ingredient-container">
          <p class="lead"><strong>Ingredientes</strong></p>

          <?php foreach ($ingredients as $ingredient): ?>

            <div class="row">
              <div class="col-md-5">

                <div class="checkbox">
                  <label>
                    <input
                        type="checkbox"
                        value="<?php echo $ingredient->id ?>"
                        name="ingr-<?php echo $ingredient->id ?>"
                        <?php echo set_checkbox('ingr-' . $ingredient->id, $ingredient->id); ?>
                    > <?php echo $ingredient->name ?>
                  </label>
                </div>

              </div>
              <div class="col-md-7">

                <input type="text" class="form-control"
                       value="<?php echo set_value('amount-' . $ingredient->id) ?>"
                       id="amount-<?php echo $ingredient->id ?>"
                       name="amount-<?php echo $ingredient->id ?>"
                       placeholder="Cantidad de <?php echo $ingredient->name ?>"
                       maxlength="40"
                />

              </div>


            </div>

          <?php endforeach; ?>

        </div><!-- /Ingredients -->
        <div class="col-md-4">

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

          <?php for( $i = 0; $i < sizeof($categories); $i++): ?>

            <!-- Category -->
            <div class="form-group">
              <label for="category-<?php echo $i ?>">
                <?php echo $categories[$i]['title'] ?>
                <span class="text-danger" data-toggle="tooltip" data-placement="top" title="Obligatorio">*</span>
              </label>
              <select class="form-control" id="category-<?php echo $i ?>" name="category-<?php echo $i ?>">

                <?php for( $j = 1; $j <= $categories[$i]['n_child']; $j++): ?>
                  <option value="<?php echo $categories[$i]['children']['item-' . $j]['id'] ?>"
                    <?php echo  set_select('category-' . $i, $categories[$i]['children']['item-' . $j]['id']); ?>
                  ><?php echo $categories[$i]['children']['item-' . $j]['name'] ?></option>
                <?php endfor; ?>

              </select>
            </div><!-- /Category -->

          <?php endfor; ?>

        </div>
      </div>

      <!-- Steps -->
      <div class="row">
        <div class="col-md-12" id="steps-container">

          <div class="form-group <?php echo form_error('step-1') ? 'has-error' : NULL ?>">
            <label for="step-1">
              Paso 1
              <span class="text-danger" data-toggle="tooltip" data-placement="top" title="Obligatorio">*</span>
            </label>
            <textarea id="step-1"
                      name="step[]"
                      class="form-control"
                      rows="12"
                      required><?php echo set_value('step-1') ?></textarea>
          </div>

        </div>
      </div>

      <div class="row">
        <div class="col-md-6">

          <div class="btn-group">
            <input type="button" id="addStep" class="btn btn-success" value="Añadir paso">
            <input type="button" id="deleteStep" class="btn btn-success" value="Eliminar paso">
          </div>

        </div>
        <div class="col-md-6"></div>
      </div><!-- /Steps -->

      <input type="submit" class="btn btn-success btn-separator" value="Crear receta">

      <?php echo form_close() ?>

    </div>
  </div>
</div>
