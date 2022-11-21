<?php 
namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model{
  protected $table = 'transaction';
  protected $useTimesstamps = true;
  protected $allowedFields = [
    'nama', 
    'garansi', 
    'nilai_perolehan', 
    'status', 
    'nama_user', 
    'no_kontrak', 
    'no_penghapusan'
  ];

  public function getTransaction($id = false){
    if($id == false){
      return $this->findAll();
    }
    return $this->where(['id' => $id])->first();
  }
}

 ?>