<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template {
  
  private $_CI;
  private $_title;
  
  public function __construct() {
    
    $this->_CI =& get_instance();
    
    $this->_CI->load->library('authentication');
    $this->_CI->load->model('administrator_model');
  }

  // Print a view complete
  public function printView($template, $templateData = null) {
    
    $headerViewData = array();
    $footerViewData = array();

    // Set headerViewData
    $headerViewData['title'] = $this->_setTitleViewData();
    $headerViewData['userData'] = $this->_setUserData();
    $headerViewData['menu'] = $this->_createMenuOptions();
    
    $this->_CI->load->view('/template/header', $headerViewData);
    $this->_CI->load->view($template, $templateData);
    $this->_CI->load->view('/template/footer', $footerViewData);
  }

  // Set title from current page
  public function setTitle($title) {
    $this->_title = $title;
  }

  // --------------------------------------------- Private methods -------------------------------------------------- //

  // Build title to send to head
  private function _setTitleViewData() {

    $_SITE_NAME = 'ToEat!';

    if($this->_title != null) {
      return $title = $this->_title . ' | ' . $_SITE_NAME;
    }
    else {
      return $title = $_SITE_NAME;
    }
  }

  // Send userdata if someone is logged in
  private function _setUserData() {

    $userData = $this->_CI->authentication->user_status(0);
    if($userData) {
      return $userData;
    }
  }

  // Retrieve data to build menu
  private function _createMenuOptions() {

    $result = array();

    $menu_items = $this->_CI->administrator_model->getAll_categories();

    foreach ($menu_items as $item) {

      if($item->parent != null){
        continue;
      }

      $menu_elements = [];
      $menu_elements['title'] = $item->c_name;
      $menu_elements['children'] = array();

      $x = 1;

      foreach ($menu_items as $child_item){

        if($child_item->parent != $item->c_name) {
          continue;
        }

        $menu_elements['children']['item-' . $x] = array();
        $menu_elements['children']['item-' . $x]['name'] = $child_item->c_name;
        $menu_elements['children']['item-' . $x]['slug'] = $child_item->slug;

        $x++;
      }

      $menu_elements['n_child'] = $x-1;

      $result[] = $menu_elements;
    }

    return $result;
  }
}