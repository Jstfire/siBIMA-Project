<?php

namespace App\Models;

use CodeIgniter\Model;

class BidangDivisi extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'bidang_divisi';
    protected $primaryKey       = 'id_bidang_divisi';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_bidang_divisi', 'id_user', 'id_ormawa', 'nama_bidang_divisi', 'kontak_bidang_divisi', 'desc_ormawa'];

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
        $builder = $this->db->table('bidang_divisi');
        $builder->join('mahasiswa', 'mahasiswa.id_bidang_divisi = bidang_divisi.id_bidang_divisi');
        $query = $builder->getWhere(['mahasiswa.id_bidang_divisi' => $id]);
        return $query->getResultArray();
    }
}
