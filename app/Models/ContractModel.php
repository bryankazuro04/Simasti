<?php 
namespace App\Models;

use CodeIgniter\Model;

class ContractModel extends Model{
  protected $table = 'contract';
  protected $useTimesstamps = true;
  protected $allowedFields = [
    'no_kontrak',
    'nama_kontrak',
    'durasi',
    'perusahaan',
    'nilai_kontrak'
  ];

  public function getContract($id = false, $no_kontrak = false){
    if($id == false){
      return $this->findAll();
    }
    return $this->where(['id' => $id])->first();
    return $this->where(['no_kontrak' => $no_kontrak]);
  }
}
 ?>