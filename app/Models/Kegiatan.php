<?php

namespace App\Models;

use CodeIgniter\Model;

class Kegiatan extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'kegiatan';
    protected $primaryKey       = 'id_kegiatan';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['id_kegiatan','id_ukm','id_ormawa','id_bidang_divisi','id_proposal','tanggal_kegiatan','jam_mulai','jam_akhir','tahun_ajaran_kegiatan','bulan_kegiatan','penanggung_jawab_kegiatan','kontak_penanggung_jawab_kegiatan','nama_kegiatan'];

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
    public function getActivityDone($day, $start, $finish)
    {
        $today = date("Y-m-d");
        if ($today > $day) {
            $descDone = "done";
        } else {
            $descDone = "unfinished";
        }
        return $descDone;
        // dd($descDone);
    }
}
