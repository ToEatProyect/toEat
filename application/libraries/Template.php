<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {
  
  private $_CI;
  private $_title;
  
  public function __construct() {
    
    $this->_CI =& get_instance();
    
    $this->_CI->load->library('authentication');
  }

  // Print a view complete
  public function printView($template, $templateData = null) {
    
    $headerViewData = array();
    $footerViewData = array();
    
    $userData = $this->_CI->authentication->user_status(0);
    if($userData) {
      $headerViewData['userData'] = $userData;
    }

    // Set title
    $headerViewData['title'] = $this->_setTitleViewData();
    
    $this->_CI->load->view('/template/header', $headerViewData);
    $this->_CI->load->view($template, $templateData);
    $this->_CI->load->view('/template/footer', $footerViewData);
  }

  // Set title from current page
  public function setTitle($title) {
    $this->_title = $title;
  }

  // --------------------------------------------- Private methods -------------------------------------------------- //

  private function _setTitleViewData() {

    $_siteName = 'ToEat!';

    if($this->_title != null) {
      return $title = $this->_title . ' | ' . $_siteName;
    }
    else {
      return $title = $this->_title;
    }
  }
}