<?php 
  namespace App\Controllers;

  class Register extends BaseController {
    public function index() {
      $data = [ 'title' => 'Register' ];

      return view('auth/register-form', $data);
    }
  }

?>