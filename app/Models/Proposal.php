<?php

namespace App\Models;

use CodeIgniter\Model;

class Proposal extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'proposal';
    protected $primaryKey       = 'id_proposal';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_proposal','id_kegiatan','id_ukm','id_ormawa','id_bidang_divisi','link_proposal','nama_proposal','untuk_wadir','acc_upk', 'acc_baak', 'acc_wadir', 'id_user', 'id_lpj', 'status', 'nama_kegiatan'];

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

    public function getOrmawa($id)
    {
        $builder = $this->db->table('ormawa');
        $builder->select('nama_ormawa');
        $query = $builder->getWhere(['ormawa.id_ormawa' => $id]);
        return $query->getFirstRow()->nama_ormawa;
    }
    public function getUKM($id)
    {
        $builder = $this->db->table('ukm');
        $builder->select('nama_ukm');
        $query = $builder->getWhere(['ukm.id_ukm' => $id]);
        return $query->getFirstRow()->nama_ukm;
    }
    public function getBidangDivisi($id)
    {
        $builder = $this->db->table('bidang_divisi');
        $builder->select('nama_bidang_divisi');
        $query = $builder->getWhere(['bidang_divisi.id_bidang_divisi' => $id]);
        return $query->getFirstRow()->nama_bidang_divisi;
    }
    public function getKegiatan($id)
    {
        $builder = $this->db->table('kegiatan');
        $builder->select('nama_kegiatan');
        $query = $builder->getWhere(['kegiatan.id_kegiatan' => $id]);
        return $query->getFirstRow()->nama_kegiatan;
    }
}
