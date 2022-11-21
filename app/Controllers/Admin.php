<?php 
  namespace App\Controllers;

  use \Myth\Auth\Models\UserModel;
  use \Myth\Auth\Authorization\GroupModel;
  use \Myth\Auth\Entities\User;
  use \Myth\Auth\Config\Auth as AuthConfig;
  
  class Admin extends BaseController {
    protected $db, $builder, $user, $groupModel, $auth, $config;
    
    public function __construct() {
      $this->db = \Config\Database::connect();
      $this->builder = $this->db->table('users');

      $this->user = new UserModel();
      $this->groupModel = new GroupModel();

      $this->config = config('Auth');
      $this->auth = service('authentication');
    }
    
    /*
     *   Homepage Method for Admin
     *
    **/
    public function index() {
      $this->builder->select('users.id as userid, username, no_telepon, email, profile_picture, name, deleted_at');
      $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
      $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
      $query = $this->builder->get();
      $groupID = $query->getRow();
      
      $data = [
        'title' => 'User List',
        'users' => $query->getResult(),
        'group' => $this->groupModel->getGroupsForUser($groupID->userid),
        'roles' => $this->db->table('auth_groups')->select('id as roleid, name')->get()->getResult()
      ];
 
      return view('admin/index', $data);
    }

    /*
     *   User Add Method
     *
    **/
    public function add() {        
      $data = [            
        'title'   => 'Add Users',
        'config'  => $this->config,
      ];
    
      return view('admin/add', $data);            
    }

    /*
     *   Save Process for user add
     *
    **/
    public function save() {
      $users = model(UserModel::class);
  
      $rules = [
        'username' => 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
        'email'    => 'required|valid_email|is_unique[users.email]',
      ];
  
      if (! $this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
      }
  
      $rules = [
        'password'     => 'required|strong_password',
        'pass_confirm' => 'required|matches[password]',
      ];
  
      if (! $this->validate($rules)) {
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
      }
  
      // Save the user
      $allowedPostFields = array_merge(['password'], $this->config->validFields, $this->config->personalFields);
      $user = new User($this->request->getPost($allowedPostFields));
  
      $this->config->requireActivation === null ? $user->activate() : $user->generateActivateHash();
  
      // Ensure default group gets assigned if set
      if (! empty($this->config->defaultUserGroup)) {
        $users = $users->withGroup($this->config->defaultUserGroup);
      }
  
      if (! $users->save($user)) {
        return redirect()->back()->withInput()->with('errors', $users->errors());
      }
  
      if ($this->config->requireActivation !== null) {
        $activator = service('activator');
        $sent = $activator->send($user);

        if (! $sent) {
            return redirect()->back()->withInput()->with('error', $activator->error() ?? lang('Auth.unknownError'));
        }

        // Success!
        return redirect()->to(base_url('/admin/users'));
      }
  
      // Success!
      return redirect()->to(base_url('/admin/users'));
    }

    /*
     *   User Edit Method
     *
    **/
    public function edit($id) {
      $data = [
        'title'       => 'Edit user',
        'validation'  => \Config\Services::validation(),
        'user'        => $this->user->getUser($id)
      ];

      return view('admin/users-edit', $data);
    }

    /*
     *   Update user process
     *
    **/
    public function update($id) {      
      $this->user->save([
        'id'        => $id,
        'username'  => $this->request->getVar('username'),
      ]);

      return redirect()->to('/admin/users');
    }

    /*
     *   User Delete Method
     *
    **/
    public function delete($id) {
      $this->user->delete($id);
      return redirect()->to('/admin/users');
    }

    /*
     *   Changing Role User Method
     *
    **/
    public function changeGroup() {
      $userId = $this->request->getVar('id');
      $groupId = $this->request->getVar('group_id');
  
      $this->groupModel->removeUserFromAllGroups(intval($userId));
  
      $this->groupModel->addUserToGroup(intval($userId), intval($groupId));
  
      return redirect()->to(base_url('/admin/users'));
    }
  }

 ?>