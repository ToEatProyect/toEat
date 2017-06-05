<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">

      <div class="jumbotron">
        <h1><strong><?php echo $c_name ?></strong></h1>
      </div>

      <?php if(count($recipes > 0)): ?>

        <?php foreach ($recipes as $recipe): ?>

          <?php

          // Reformat date to print
          $date = new DateTime($recipe->lastModDate);

          ?>

          <?php for( $i = 0; $i < 4; $i++): ?>

            <div class="row">
              <div class="col-md-3 col-sm-6">

                <div class="thumbnail">
                  <img class="img-responsive" src="/assets/img/recipes/<?php echo $recipe->image ?>" />
                  <div class="caption">
                    <h5 class="recipe-title"><?php echo $recipe->title ?></h5>
                    <p><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $date->format('d-m-Y'); ?></p>
                    <a class="btn btn-success" href="/recipes/show/<?php echo $recipe->slug ?>">Detalles <i class="fa fa-angle-double-right fa-lg" aria-hidden="true"></i></a>
                  </div>
                </div>

              </div>

              <?php if($i = 1): ?>
                <div class="clearfix visible-sm-block"></div>
              <?php endif; ?>
            </div>

          <?php endfor; ?>

        <?php endforeach; ?>

      <?php endif; ?>

    </div>
  </div>
</div>
