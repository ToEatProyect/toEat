<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">

      <?php if($haveRecipes): ?>

        <div class="jumbotron">
          <h1><strong><?php echo $c_name ?></strong></h1>
        </div>

        <?php $i = 0 ?>

        <?php for( $j = 0; $j < sizeof($recipes); $j++ ): ?>

          <?php if($i == 0): ?>
            <div class="row">
          <?php endif; ?>
            <div class="col-md-3 col-sm-6">

              <img class="img-responsive" src="/assets/img/recipes/<?php echo $recipes[$j]['image'] ?>" />
              <div class="caption">

                <p class="star-separator">

                  <?php if($recipes[$j]['avg_score'] == null): ?>

                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>

                  <?php else: ?>

                    <?php for( $x = 0; $x < 5; $x++ ): ?>

                      <?php if($recipes[$j]['avg_score'] > $x): ?>
                        <i class="fa fa-star" aria-hidden="true"></i>
                      <?php else: ?>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                      <?php endif; ?>

                    <?php endfor; ?>

                  <?php endif; ?>

                </p>

                <h5 class="recipe-title">
                  <a class="text-success" href="/recipes/show/<?php echo $recipes[$j]['slug'] ?>"><?php echo $recipes[$j]['title'] ?></a>
                </h5>
              </div>

            </div>
          <?php if($i == 1): ?>
            <div class="clearfix visible-sm-block"></div>
          <?php endif; ?>

          <?php if($i == 3): ?>
            </div>
          <?php endif; ?>

          <?php
            if($i == 3){
              $i = 0;
            }
            else{
              $i++;
            }
          ?>

        <?php endfor; ?>

        <?php if($i != 3): ?>
          </div>
        <?php endif; ?>

      <?php else: ?>

        <div class="row">
          <div class="col-md-12 category-recipes-container">

            <div class="text-center"><i class="fa fa-cutlery fa-5x category-icon" aria-hidden="true"></i></div>
            <h4 class="text-center">Aún no hay ninguna receta para esta categoría</h4>

            <?php if($collaborator != false && $collaborator == 3): ?>
              <p class="text-center">¡Ánimo! Tu puedes ser el primero</p>
              <div class="text-center"><a href="/recipes/new-recipe" class="btn btn-success">Crear receta <i class="fa fa-plus" aria-hidden="true"></i></a></div>
            <?php endif; ?>

          </div>
        </div>

      <?php endif; ?>

    </div>
  </div>
</div>
