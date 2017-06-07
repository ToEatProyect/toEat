<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-6 col-md-offset-3">

      <?php echo form_open('') ?>

      <!-- Hidden whit id -->
      <div class="form-group">
        <input type="text" class="form-control hidden" value="<?php echo $category->id ?>" id="id" name="id" />
      </div>

      <!-- Name -->
      <div class="form-group <?php echo form_error('name') ? 'has-error' : NULL ?>">
        <label for="name">
          Nombre de la categoría
          <span class="text-danger" data-toggle="tooltip" data-placement="top" title="Obligatorio">*</span>
        </label>
        <input type="text" class="form-control"
               value="<?php echo set_value("name", $category->name) ?>"
               id="name"
               name="name"
               maxlength="40"
               required />
        <?php if(form_error('name')): ?>
          <span class="text-danger"><?php echo form_error('name') ?></span>
        <?php endif; ?>
      </div><!-- /Name -->

      <!-- Parent category -->
      <div class="form-group <?php echo form_error('parent_category') ? 'has-error' : NULL ?>">
        <label for="parent_category">Categoría superior</label>
        <select id="parent_category" name="parent_category" class="form-control" <?php echo $numChilds ? 'disabled' : NULL ?>>
          <option value="0">Sin categoría</option>

          // Are there parent categories? fill select
          <?php if(count($p_category)): ?>

            <?php foreach ($p_category as $item): ?>

              <option value="<?php echo $item->id ?>"
                <?php if($category->parent_category == $item->id): ?>
                  <?php echo  set_select('parent_category', $item->id, TRUE); ?>
                <?php else: ?>
                  <?php echo  set_select('parent_category', $item->id); ?>
                <?php endif; ?>
              ><?php echo $item->name ?></option>

            <?php endforeach; ?>

          <?php endif; ?>

        </select>
        <?php if(form_error('parent_category')): ?>
          <span class="text-danger"><?php echo form_error('parent_category') ?></span>
        <?php endif; ?>
      </div><!-- /Parent category -->

      <input type="submit" class="btn btn-success" value="Modificar categoría">
      <?php echo form_close('') ?>

    </div>
  </div>
</div>
