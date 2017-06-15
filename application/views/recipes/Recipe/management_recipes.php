<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container min-size-view-container">
  <div class="row">
    <div class="col-md-12">

      <?php // If user have recipes ?>
      <?php if(count($all_recipes) > 0): ?>

        <div class="row">
          <?php foreach ($all_recipes as $recipe): ?>

            <?php

            // Reformat date to print
            $date = new DateTime($recipe->created_at);

            ?>

            <div class="col-sm-4 col-md-3">
              <div class="thumbnail">
                <a href="<?php echo print_recipe_url($recipe) ?>">
                  <?php echo print_recipe_image($recipe, "img img-responsive") ?>
                </a>
                <div class="caption">
                  <h5 class="recipe-title"><?php echo $recipe->title ?></h5>
                  <p><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $date->format('d-m-Y'); ?></p>
                </div>
              </div>
            </div>

          <?php endforeach; ?>
        </div>

      <?php // No recipes? ?>
      <?php else: ?>

        <div class="row">
          <div class="col-md-12 category-recipes-container">

            <div class="text-center"><i class="fa fa-cutlery fa-5x category-icon" aria-hidden="true"></i></div>
            <h4 class="text-center">Aún no hay ninguna receta que necesite ser revisada</h4>

          </div>
        </div>

      <?php endif; ?>

    </div><!-- /.col-md-12 -->
  </div><!-- /.row -->
</div><!-- /.container -->