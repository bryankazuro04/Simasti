<?php 
  namespace App\Controllers;

  use App\Models\ContractModel;
  use App\Models\TransactionModel;

  class Transaction extends BaseController{
    protected $transaksi, $kontrak, $users, $db, $builder;
    
    public function __construct(){
      $this->db         = \Config\Database::connect();
      $this->builder    = $this->db->table('users');
      $this->transaksi  = new TransactionModel();
      $this->kontrak    = new ContractModel();
    }

    public function index(){
      $data = [
        'title'       => 'Transaction',
        'transaction' => $this->transaksi->getTransaction(),
      ];

      return view('pages/transaction', $data);
    }

    public function add($no_kontrak = false){
      $this->builder->select('users.username');
      $query = $this->builder->get();
      
      $data = [
        'title'       => "Penambahan Transaksi",
        'contract'    => $this->kontrak->getContract($no_kontrak),
        'users'       => $query->getResult(),
        'validation'  => \Config\Services::validation()
      ];

      return view('pages/transaction-form', $data);
    }

    public function history(){
      if(!$this->validate([
        'nama' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Kolom {field} wajib diisi!'
          ]
        ],
        'garansi' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Kolom {field} wajib diisi!'
          ]
        ],
        'nilai_perolehan' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Kolom {field} wajib diisi!'
          ]
        ],
        'status' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Kolom {field} wajib diisi!'
          ]
        ],
        'no_kontrak' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Kolom No. Kontrak wajib diisi!'
          ]
        ],
        'nama_user' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Kolom Nama User wajib diisi!'
          ]
        ],
        'no_penghapusan' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Kolom No. Penghapusan wajib diisi!'
          ]
        ]
      ])){
        $validation = \Config\Services::validation();
        return redirect()->to('/transaction/add')->withInput()->with('validation', $validation);
      }

      $this->transaksi->save([
        'nama'            => $this->request->getVar('nama'),
        'garansi'         => $this->request->getVar('garansi'),
        'nilai_perolehan' => $this->request->getVar('nilai_perolehan'),
        'status'          => $this->request->getVar('status'),
        'nama_user'       => $this->request->getVar('nama_user'),
        'no_kontrak'      => $this->request->getVar('no_kontrak'),
        'no_penghapusan'  => $this->request->getVar('no_penghapusan'),
      ]);

      return redirect()->to('/transaction');
    }

    public function delete($id){
      $this->transaksi->delete($id);
      return redirect()->to('/transaction');
    }

    public function edit($id){
      $data = [
        'title'       => "Perubahan Transaksi",
        'validation'  => \Config\Services::validation(),
        'transaction' => $this->transaksi->getTransaction($id),
      ];

      return view('pages/transaction-edit', $data);
    }

    public function update($id){
      if(!$this->validate([
        'nama' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Kolom {field} wajib diisi!'
          ]
        ],
        'garansi' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Kolom {field} wajib diisi!'
          ]
        ],
        'nilai_perolehan' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Kolom {field} wajib diisi!'
          ]
        ],
        'status' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Kolom {field} wajib diisi!'
          ]
        ],
        'no_penghapusan' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Kolom {field} wajib diisi!'
          ]
        ],
      ])){
        $validation = \Config\Services::validation();
        return redirect()->to('/transaction/edit/' . $this->request->getVar('id'))->withInput()->with('validation', $validation);
      }
      
      $this->transaksi->save([
        'id'              => $id,
        'nama'            => $this->request->getVar('nama'),
        'garansi'         => $this->request->getVar('garansi'),
        'nilai_perolehan' => $this->request->getVar('nilai_perolehan'),
        'status'          => $this->request->getVar('status'),
        'nama_user'       => $this->request->getVar('nama_user'),
        'no_kontrak'      => $this->request->getVar('no_kontrak'),
        'no_penghapusan'  => $this->request->getVar('no_penghapusan'),
      ]);

      return redirect()->to('/transaction');    }
  }

?>