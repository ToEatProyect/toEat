<?php defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->flashdata("alert")): ?>

  <div class="alert alert-danger alert-dismissible notifications" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php echo $this->session->flashdata("alert") ?>
  </div>

<?php endif; ?>