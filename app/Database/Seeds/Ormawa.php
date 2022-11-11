<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Ormawa extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_ormawa' =>  'OM001',
                'id_user' => '2',
                'nama_ormawa' => 'DPM',
                'kontak_ormawa' => '628',
                'desc_ormawa' => 'Dewan Perwakilan Mahasiswa',
            ],
            [
                'id_ormawa' =>  'OM002',
                'id_user' => '3',
                'nama_ormawa' => 'SEMA',
                'kontak_ormawa' => '628',
                'desc_ormawa' => 'Senat Mahasiswa',
            ], [
                'id_ormawa' =>  'OM003',
                'id_user' => '4',
                'nama_ormawa' => 'SPD',
                'kontak_ormawa' => '628',
                'desc_ormawa' => 'Satuan Penegak Disiplin',
            ], [
                'id_ormawa' =>  'OM004',
                'id_user' => '5',
                'nama_ormawa' => 'MENWA',
                'kontak_ormawa' => '628',
                'desc_ormawa' => 'Resimen Mahasiswa',
            ],
        ];

        $this->db->table('ormawa')->insertBatch($data);
    }
}
