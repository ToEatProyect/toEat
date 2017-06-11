<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">

  <div class="row">
    <div class="col-md-12">

      <?php echo form_open('') ?>

      <div class="panel panel-default">
        <div class="panel-heading">
          <?php echo $comment->title ?>
        </div>
        <div class="panel-body">

          <!-- Description -->
          <div class="form-group <?php echo form_error('opinion_description') ? 'has-error' : NULL ?>">
            <label for="opinion_description"></label>
            <textarea id="opinion_description"
                      name="opinion_description"
                      class="form-control"
                      rows="8"
                      placeholder="Comenta que te ha parecido"
                      required><?php echo set_value('opinion_description', $comment->text) ?></textarea>
            <?php if(form_error('opinion_description')): ?>
              <span class="text-danger"><?php echo form_error('opinion_description') ?></span>
            <?php endif; ?>
          </div><!-- /Description -->

          <!-- Score -->
          <p><strong>Danos tu valoración sobre esta receta</strong></p>

          <div class="form-group">
            <label class="radio-inline" for="score-1">
              <input type="radio"
                     name="score"
                     value="1" <?php echo  set_radio('score', '1', $comment->score == 1 ? TRUE : FALSE); ?>
                     id="score-1"
              > 1
            </label>

            <label class="radio-inline" for="score-2">
              <input type="radio"
                     name="score"
                     value="2" <?php echo  set_radio('score', '2', $comment->score == 2 ? TRUE : FALSE); ?>
                     id="score-2"
              > 2
            </label>

            <label class="radio-inline" for="score-3">
              <input type="radio"
                     name="score"
                     value="3" <?php echo  set_radio('score', '3', $comment->score == 3 ? TRUE : FALSE); ?>
                     id="score-3"
              > 3
            </label>

            <label class="radio-inline" for="score-4">
              <input type="radio"
                     name="score"
                     value="4" <?php echo  set_radio('score', '4', $comment->score == 4 ? TRUE : FALSE); ?>
                     id="score-4"
              > 4
            </label>

            <label class="radio-inline" for="score-5">
              <input type="radio"
                     name="score"
                     value="5" <?php echo  set_radio('score', '5', $comment->score == 5 ? TRUE : FALSE); ?>
                     id="score-5"
              > 5
            </label>
            <?php if(form_error('score')): ?>
              <span class="text-danger"><?php echo form_error('score') ?></span>
            <?php endif; ?>
          </div><!-- /Score -->

          <input type="submit" class="btn btn-success" value="Enviar comentario">

        </div>
      </div>


      <?php echo form_close('') ?>

    </div><!-- /.col-md-12 -->
  </div><!-- /.row -->
</div><!-- /.container -->