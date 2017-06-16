<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container min-size-view-container">
  <div class="row">

    <h3 class="page-title">Búsqueda</h3>

    <!-- Search controls-->
    <div class="col-md-12">

      <?php echo form_open() ?>

      <div class="col-md-3 col-md-offset-6">
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

      <div class="col-md-3">
        <div class="form-group">
          <button type="submit" class="btn btn-success"><i class="fa fa-search"></i> Buscar</button>
        </div>
      </div>

      <?php echo form_close() ?>

    </div><!-- /Search controls-->


    <?php if(!$has_search): ?>
      <h3>¿Qué necesitas?</h3>
    <?php else: ?>

      <?php if(count($recipes)): ?>

        <div class="row">
          <div class="col-md-12">

            <div class="table-responsive">
              <table class="table table-striped table-hover">

                <?php for($i = 0; $i < sizeof($recipes); $i++): ?>
                  <tr><td><a href="/recipes/show/<?php echo $recipes[$i] ?>"><?php echo $recipes[$i] ?></a></td></tr>
                <?php endfor; ?>

              </table>
            </div>

          </div>
        </div>
      <?php else: ?>
        <h2>No hay coincidencias</h2>
      <?php endif; ?>

    <?php endif; ?>

  </div>
</div>
