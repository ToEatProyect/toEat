<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Only can be executed from command line
if(php_sapi_name() != "cli") { exit("No accesible from web browser"); }

class Cmd extends MY_Controller{

  public function __construct() {
    parent::__construct();
  }

  public function create_admin_user()
  {
    // Customize this array for your user
    $user_data = [
        'username' => 'admin',
        'passwd' => '1234',
        'email' => 'toeatsite@gmail.com',
        'name' => 'superAdmin',
        'auth_level' => '9', // 9 if you want to login @ examples/index.
    ];

    // Load resources
    $this->load->helper('auth');

    $user_data['passwd'] = $this->authentication->hash_passwd($user_data['passwd']);
    $user_data['user_id'] = 1; //Admin is always user 1
    $user_data['created_at'] = date('Y-m-d H:i:s');

    //Insert into database
    $this->db
        ->set($user_data)
        ->insert(db_table('user_table'));

    if ($this->db->affected_rows() == 1) {
      echo 'Admin user created successfully';
      return 0;
    } else {
      return -1;
    }
  }
}