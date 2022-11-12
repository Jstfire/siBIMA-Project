<?php

namespace App\Models;

use CodeIgniter\Model;

class UKM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'ukm';
    protected $primaryKey       = 'id_ukm';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_ukm','id_ormawa','id_user','nama_ukm','kontak_ukm','desc_ukm'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getMember($id)
    {
        $builder = $this->db->table('ukm');
        $builder->join('mahasiswa', 'mahasiswa.id_ukm = ukm.id_ukm');
        $query = $builder->getWhere(['mahasiswa.id_ukm' => $id]);
        return $query->getResultArray();
    }
}
