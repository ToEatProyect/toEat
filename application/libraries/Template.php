<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {
  
  private $_CI;
  
  public function __construct() {
    
    $this->_CI =& get_instance();
    
    $this->_CI->load->library('authentication');
  }
  
  public function printView($template, $templateData = null) {
    
    $headerViewData = array();
    $footerViewData = array();
    
    $userData = $this->_CI->authentication->user_status(0);
    if($userData) {
      $headerViewData['userData'] = $userData;
    }
    
    $this->_CI->load->view('/template/header', $headerViewData);
    $this->_CI->load->view($template, $templateData);
    $this->_CI->load->view('/template/footer', $footerViewData);
  }
}