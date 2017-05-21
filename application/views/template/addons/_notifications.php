<?php defined('BASEPATH') OR exit('No direct script access allowed');

if($this->session->flashdata("notify")): ?>

  <div class="alert alert-success alert-dismissible notifications" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <?php echo $this->session->flashdata("notify") ?>
  </div>

<?php endif; ?>