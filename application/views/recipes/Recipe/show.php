<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
  <div class="row">

    <h3 class="page-title clearfix">

      <p class="pull-left">
        <?php echo $recipe->title ?> <span class="recipe-score"><?php echo print_recipe_score($avg_score) ?></span> <br />
        <small class="recipe-owner">- Creada por <cite title="Source Title"><?php echo $owner ?></cite></small>
      </p>

      <p class="pull-right">
        <small class="recipe-time"><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $recipe->cooking_time ?> minutos</small>
      </p>
    </h3>

    <!-- Recipe container -->
    <div class="col-md-10 col-md-offset-1">

      <div class="row">

        <!-- Image  -->
        <div class="col-md-4">
          <?php if(!$can_edit): ?>
            <?php echo print_recipe_image($recipe, "img img-responsive") ?>
          <?php else: ?>
            <label class="btn-plupload-change-recipe-image"
                   data-plupload-change-recipe-image
                   data-recipe-slug="<?php echo $recipe->slug ?>"
                   data-recipe-id="<?php echo $recipe->id ?>">
              <?php echo print_recipe_image($recipe, "img img-responsive") ?>
              <div class="progress hide">
                <div class="progress-bar" role="progressbar"
                     aria-valuenow="0"
                     aria-valuemin="0" aria-valuemax="100"
                     style="width: 0%;">0%</div>
              </div>
              <span class="change-text">Cambiar</span>
            </label>
          <?php endif; ?>
        </div>

        <div class="col-md-8">

          <!-- Description panel -->
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">Descripción</h3>
            </div>
            <div class="panel-body">
              <?php echo $recipe->description ?>
            </div>
          </div><!-- /Description panel -->

          <!-- Ingredients panel -->
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">Ingredientes (1 ración)</h3>
            </div>
            <div class="panel-body">

              <?php foreach ($ingredients as $ingredient): ?>

                <strong><?php echo $ingredient->name ?>: </strong><?php echo $ingredient->quantity ?><br/>

              <?php endforeach; ?>

            </div>
          </div><!-- /Ingredients panel -->

        </div>

      </div>

      <hr><!-- Line separator -->

      <div class="row">
        <div class="col-md-12">

          <!-- Steps -->
          <div class="panel panel-success">
            <div class="panel-heading">
              <h3 class="panel-title">Instrucciones</h3>
            </div>
            <div class="panel-body">

              <?php foreach ($steps as $step): ?>

                <h4><strong>Paso <?php echo $step->numStep ?></strong></h4>
                <hr>
                <?php echo $step->description ?>

              <?php endforeach; ?>

            </div>
          </div><!-- /Steps -->

          <!-- Buttons -->
          <div class="row">
            <div class="col-md-12">

              <div class="pull-right">
                <?php if($can_edit): ?>
                  <a href="" class="btn btn-success"></a>
                  <a href="/recipes/show/<?php echo $recipe->slug ?>/delete" class="btn btn-success"><i class="fa fa-trash" aria-hidden="true"></i> Borrar receta</a>
                <?php endif; ?>
              </div>

            </div>
          </div><!-- /Buttons -->

        </div>
      </div>

      <?php // User (no owner) is logged in and he don't have comment in this recipe?>
      <?php if(isset($user_loggin) && $user_loggin != $owner && $user_haveComment == false && $recipe->published != 0): ?>

        <?php echo form_open('') ?>

        <div class="panel panel-default">
          <div class="panel-body">

            <fieldset>
              <legend>Danos tu opinión</legend>

              <!-- Description -->
              <div class="form-group <?php echo form_error('opinion_description') ? 'has-error' : NULL ?>">
                <label for="opinion_description"></label>
                <textarea id="opinion_description"
                          name="opinion_description"
                          class="form-control"
                          rows="8"
                          placeholder="Comenta que te ha parecido"
                          required><?php echo set_value('opinion_description') ?></textarea>
                <?php if(form_error('opinion_description')): ?>
                  <span class="text-danger"><?php echo form_error('opinion_description') ?></span>
                <?php endif; ?>
              </div><!-- /Description -->

              <!-- Score -->
              <p><strong>Danos tu valoración sobre esta receta</strong></p>

              <div class="form-group">
                <label class="radio-inline" for="score-1">
                  <input type="radio" name="score" value="1" <?php echo  set_radio('score', '1'); ?> id="score-1"> 1
                </label>

                <label class="radio-inline" for="score-2">
                  <input type="radio" name="score" value="2" <?php echo  set_radio('score', '2'); ?> id="score-2"> 2
                </label>

                <label class="radio-inline" for="score-3">
                  <input type="radio" name="score" value="3" <?php echo  set_radio('score', '3'); ?> id="score-3"> 3
                </label>

                <label class="radio-inline" for="score-4">
                  <input type="radio" name="score" value="4" <?php echo  set_radio('score', '4'); ?> id="score-4"> 4
                </label>

                <label class="radio-inline" for="score-5">
                  <input type="radio" name="score" value="5" <?php echo  set_radio('score', '5'); ?> id="score-5"> 5
                </label>
                <?php if(form_error('score')): ?>
                  <span class="text-danger"><?php echo form_error('score') ?></span>
                <?php endif; ?>
              </div><!-- /Score -->

              <input type="submit" class="btn btn-success" value="Enviar comentario">

            </fieldset>

          </div>
        </div>


        <?php echo form_close('') ?>

      <?php // Owner is logged in ?>
      <?php elseif(isset($user_loggin) && $user_loggin == $owner): ?>

        <!-- Nothing happens... -->

      <?php // No user is logged in ?>
      <?php elseif( ! isset($user_loggin)): ?>

        <div class="jumbotron">
          <p>Tienes que iniciar sesión para poder comentar.</p>
          <p>
            <a href="/login" class="btn btn-success">Iniciar sesión</a> o
            <a href="/create-account" class="btn btn-success">Crear cuenta</a>
          </p>
        </div>

      <?php endif; ?>

      <?php // If the recipe has comments, view them ?>
      <?php if(count($comments) > 0): ?>

        <h3>Comentarios de los usuarios</h3>
        <hr>

        <?php foreach ($comments as $comment): ?>

          <?php

          // Reformat date to print
          $date = new DateTime($comment->created_at);

          ?>

          <div class="panel panel-default comment-separator">
            <div class="panel-heading">
              <strong><?php echo $comment->username ?></strong>, el
              <strong><?php echo $date->format('d/m/Y') ?></strong> a las
              <strong><?php echo $date->format('H:i:s') ?></strong>
            </div>
            <div class="panel-body">
              <p class="text-justify"><?php echo $comment->text ?></p>
            </div>
            <div class="panel-footer">

              Puntuación:

              <?php for( $i = 0; $i < 5; $i++ ): ?>
                <?php if($comment->score > $i): ?>
                  <i class="fa fa-star" aria-hidden="true"></i>
                <?php else: ?>
                  <i class="fa fa-star-o" aria-hidden="true"></i>
                <?php endif; ?>

              <?php endfor; ?>

            </div>
          </div>

        <?php endforeach; ?>

      <?php endif; ?>

    </div><!-- /Recipe container -->

    <!-- Published button -->
    <div class="row">
      <div class="col-md-12">

        <div class="pull-right">
          <?php if($can_manage): ?>
            <a href="/recipes/management/<?php echo $recipe->slug ?>/published" class="btn btn-success"><i class="fa fa-check-circle" aria-hidden="true"></i> Publicar</a>
            <a href="/recipes/show/<?php echo $recipe->slug ?>/delete" class="btn btn-success"><i class="fa fa-times-circle" aria-hidden="true"></i> Borrar</a>
          <?php endif; ?>
        </div>

      </div>
    </div>

    <div class="col-md-4">

    </div>
  </div>
</div>
