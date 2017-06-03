<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
  <div class="row">

    <!-- Recipe container -->
    <div class="col-md-8">
      <h2 class="text-success"><?php echo $recipe->title ?></h2>
      <blockquote>
        <p>Puntuación: <?php echo $avg_score ?></p>
        <p><i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $recipe->cooking_time ?> minutos</p>
        <small>Creada por <cite title="Source Title"><?php echo $owner ?></cite></small>
      </blockquote>

      <hr><!-- Line separator -->

      <!-- Image -->
      <div class="row">
        <div class="col-md-8 col-md-offset-2 recipe-img">
            <img class="img-responsive" src="/assets/img/recipes/<?php echo $recipe->image ?>" />
        </div>
      </div><!-- /Image -->

      <hr><!-- Line separator -->

      <!-- Description -->
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">Descripción</h3>
        </div>
        <div class="panel-body">
          <?php echo $recipe->description ?>
        </div>
      </div><!-- /Description -->

      <!-- Ingredients -->
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">Ingredientes (1 ración)</h3>
        </div>
        <div class="panel-body">
          Listado de ingredientes
        </div>
      </div><!-- /Ingredients -->

      <!-- Steps -->
      <div class="panel panel-success">
        <div class="panel-heading">
          <h3 class="panel-title">Instrucciones</h3>
        </div>
        <div class="panel-body">
          Pasos
          <?php if(isset($user_loggin)){echo $user_loggin;} ?>
        </div>
      </div><!-- /Steps -->

      <?php // User (no owner) is logged in and he don't have comment in this recipe?>
      <?php if(isset($user_loggin) && $user_loggin != $owner && $user_haveComment == false): ?>

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

        <?php foreach ($comments as $comment): ?>

          <?php

          // Reformat date to print
          $date = new DateTime($recipe->created_at);

          ?>

          <h3>Comentarios de los usuarios</h3>
          <hr>

          <div class="panel panel-default">
            <div class="panel-heading"><?php echo $comment->username ?></div>
            <div class="panel-body">
              <p><strong><?php echo $date->format('d-m-Y') . ' | ' . $date->format('H:i:s') ?></strong></p>
              <p class="text-justify"><?php echo $comment->text ?></p>
            </div>
            <div class="panel-footer"><strong>Puntuación: <?php echo $comment->score ?></strong></div>
          </div>

        <?php endforeach; ?>

      <?php endif; ?>

    </div><!-- /Recipe container -->
    <div class="col-md-4">

    </div>
  </div>
</div>
