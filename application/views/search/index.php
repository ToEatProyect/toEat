<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
  <div class="row">

    <h3 class="page-title">Búsqueda</h3>

    <!-- Search controls-->
    <div class="col-md-12">

      <?php echo form_open() ?>

      <div class="col-md-8">
        <div class="form-group">
          <input type="text" class="form-control"
                 name="text"
                 placeholder="Patatas con..."
                 value="<?php echo set_value("text") ?>">
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <select class="form-control wz-multiple" name="ingredients[]" multiple="multiple" placeholder="Ingredientes...">
            <?php foreach($all_ingredients as $ingredient): ?>
              <option value="<?php echo $ingredient->id ?>"
              <?php echo
                is_array(set_value("ingredients")) && array_search($ingredient->id, set_value("ingredients")) !== FALSE
                ? "selected": ""?>>
                <?php echo $ingredient->name?>
              </option>
            <?php endforeach; ?>
          </select>
        </div>
      </div>

      <div class="col-md-2">
        <div class="form-group">
          <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
        </div>
      </div>

      <?php echo form_close() ?>

    </div><!-- /Search controls-->


    <?php if(!$has_search): ?>
      <h3>Amo a buscar por aca....</h3>
    <?php else: ?>
      <pre><?php print_r($recipes) ?></pre>
    <?php endif; ?>

  </div>
</div>
