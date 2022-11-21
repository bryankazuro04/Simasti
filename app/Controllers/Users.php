<?php 
  namespace App\Controllers;

  use App\Controllers\BaseController;
  use Myth\Auth\Models\UserModel;
  use \Myth\Auth\Password;
  
  class Users extends BaseController {
    protected $user, $db, $builder;

    public function __construct() {
      $this->db = \Config\Database::connect();
      $this->builder = $this->db->table('users');
      $this->user = new UserModel();
    }
    
    /*
     *   Homepage Method for User
     *
    **/
    public function index() {
      $data = [
        'title' => 'User Profile',
      ];

      return view('user/index', $data);
    }

    /*
     *   User Setting Method
     *
    **/
    public function setting() {
      $this->builder->select('id, username, email, no_telepon, profile_picture');
      $query = $this->builder->get();
      
      $data = [
        'title' => 'User Settings',
        'user'  => $query->getRow()
      ];

      return view('user/user-setting', $data);
    }

    /*
    *   Process for User Edit
    *
    **/
    public function update($id) { 
      $gambar = $this->request->getFile('profile_picture');

      if($gambar->getError() == 4){
        $namaGambar = $this->request->getVar('gambarLama');
      } else {
        $namaGambar = $gambar->getRandomName();
        $gambar->move('images', $namaGambar);
        unlink('images/' . $this->request->getVar('gambarLama'));
      }
      
      $this->user->save([
        'id' => $id,
        'username' => $this->request->getVar('username'),
        'fullname' => $this->request->getVar('fullname'),
        'no_telepon' => $this->request->getVar('no_telepon'),
        'profile_picture' => $namaGambar,
      ]);

      return redirect()->to('/user/profile');
    }

    /*
     *   Change Password Method
     *
    **/
    public function changePassword($id = null) {
      $data = [            
        'id' => $id,
        'title' => 'Update Password',
      ];
      return view('user/set_password', $data);            
    }
 
    /*
     *   Process of Changing Password user
     *
    **/
    public function setPassword() {
      $id = $this->request->getVar('id');
      $rules = [
          'password'     => 'required|strong_password',
          'pass_confirm' => 'required|matches[password]',
      ];

      if (! $this->validate($rules)) {
        $data = [            
          'id' => $id,
          'title' => 'Update Password',
          'validation' => $this->validator,
        ];

        return view('user/set_password', $data);
      } else {
        $userModel = new UserModel();
        $data = [            
            'password_hash' => Password::hash($this->request->getVar('password')),
            'reset_hash' => null,
            'reset_at' => null,
            'reset_expires' => null,
        ];
        $userModel->update($this->request->getVar('id'), $data);  

        return redirect()->to(base_url('/user/setting'));
      }
    }
  }

?>