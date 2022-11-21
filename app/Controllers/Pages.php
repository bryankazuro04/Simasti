<?php 

  namespace App\Controllers;

  use App\Models\ContractModel;
  use App\Models\TransactionModel;
  use Myth\Auth\Models\UserModel;

  class Pages extends BaseController {
    protected $users, $contract, $transaction;

    public function __construct() {
      $this->users = new UserModel();
      $this->contract = new ContractModel();
      $this->transaction = new TransactionModel();
    }
    
    public function index() {
      $data = [
        'title' => 'Home',
        'users' => $this->users->findAll(),
        'userid' => $this->users->findColumn('id'),
        'contracts' => $this->contract->findAll(),
        'transactions' => $this->transaction->findAll(3)
      ];

      return view('pages/home', $data);
    }

    public function topbarNav() {
      $data = [ 'contracts' => $this->contract->findAll() ];
      return view('partials/topbar', $data);
    }
  }
?>