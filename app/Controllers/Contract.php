<?php 
  namespace App\Controllers;

  use App\Controllers\BaseController;
  use App\Models\ContractModel;

  class Contract extends BaseController {
    protected $kontrak;

    public function __construct() {
      $this->kontrak = new ContractModel();
    }

    public function index() {
      $data = [
        'title'     => 'Contract',
        'contract'  => $this->kontrak->getContract(),
      ];

      return view('pages/contract', $data);
    }

    public function add() {
      $data = [
        'title'       => 'Tambah Kontrak',
        'validation'  => \Config\Services::validation()
      ];

      return view('pages/contract-form', $data);
    }

    public function save(){
      if(!$this->validate([
        'no_kontrak' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Kolom {field} wajib diisi!'
            ]
          ],
        'nama_kontrak' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Kolom {field} wajib diisi!'
            ]
          ],
        'durasi' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Kolom {field} wajib diisi!'
            ]
          ],
        'perusahaan' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Kolom {field} wajib diisi!'
            ]
          ],
        'nilai_kontrak' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Kolom {field} wajib diisi!'
            ]
          ],
      ])){
        return redirect()->to('/contract/add')->withInput();
      }

      $this->kontrak->save([
        'no_kontrak'    => $this->request->getVar('no_kontrak'),
        'nama_kontrak'  => $this->request->getVar('nama_kontrak'),
        'durasi'        => $this->request->getVar('durasi'),
        'perusahaan'    => $this->request->getVar('perusahaan'),
        'nilai_kontrak' => $this->request->getVar('nilai_kontrak'),
      ]);

      return redirect()->to('/contract');
    }

    public function delete($id){
      $this->kontrak->delete($id);
      return redirect()->to('/contract');
    }

    public function edit($id){
      $data = [
        'title'       => 'Perubahaan Kontrak',
        'validation'  => \Config\Services::validation(),
        'contract'    => $this->kontrak->getContract($id)
      ];

      return view('pages/contract-edit', $data);
    }

    public function update($id){
      if(!$this->validate([
        'no_kontrak' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Kolom {field} wajib diisi!'
          ]
        ],
        'nama_kontrak' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Kolom {field} wajib diisi!'
          ]
        ],
        'durasi' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Kolom {field} wajib diisi!'
          ]
        ],
        'perusahaan]' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Kolom {field} wajib diisi!'
          ]
        ],
        'nilai_kontrak' => [
          'rules' => 'required',
          'errors' => [
            'required' => 'Kolom {field} wajib diisi!'
          ]
        ],
      ]))
      
      $this->kontrak->save([
        'id'            => $id,
        'no_kontrak'    => $this->request->getVar('no_kontrak'),
        'nama_kontrak'  => $this->request->getVar('nama_kontrak'),
        'durasi'        => $this->request->getVar('durasi'),
        'perusahaan'    => $this->request->getVar('perusahaan'),
        'nilai_kontrak' => $this->request->getVar('nilai_kontrak'),
      ]);

      return redirect()->to('/contract');
    }
  }

?>