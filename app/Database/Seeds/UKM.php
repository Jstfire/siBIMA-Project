<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UKM extends Seeder
{
    public function run()
    {
        //
        $data = [
            [
                'id_ukm' => 'UMK001',
                'id_ormawa' => 'OM002',
                'id_user' => '9',
                'nama_ukm' => 'UKM Kerohanian',
                'kontak_ukm' => '628',
                'desc_ukm' => '',
            ],
            [
                'id_ukm' => 'UMK002',
                'id_ormawa' => 'OM002',
                'id_user' => '10',
                'nama_ukm' => 'UKM Kesenian',
                'kontak_ukm' => '628',
                'desc_ukm' => '',
            ],
            [
                'id_ukm' => 'UMK003',
                'id_ormawa' => 'OM002',
                'id_user' => '11',
                'nama_ukm' => 'UKM Kewirausahaan',
                'kontak_ukm' => '628',
                'desc_ukm' => '',
            ],
            [
                'id_ukm' => 'UMK004',
                'id_ormawa' => 'OM002',
                'id_user' => '12',
                'nama_ukm' => 'UKM Media Kampus',
                'kontak_ukm' => '628',
                'desc_ukm' => '',
            ],
            [
                'id_ukm' => 'UMK005',
                'id_ormawa' => 'OM002',
                'id_user' => '13',
                'nama_ukm' => 'UKM Olahraga',
                'kontak_ukm' => '628',
                'desc_ukm' => '',
            ],
            [
                'id_ukm' => 'UMK006',
                'id_ormawa' => 'OM002',
                'id_user' => '14',
                'nama_ukm' => 'UKM Pendidikan dan Kebudayaan',
                'kontak_ukm' => '628',
                'desc_ukm' => '',
            ],
            [
                'id_ukm' => 'UMK007',
                'id_ormawa' => 'OM002',
                'id_user' => '15',
                'nama_ukm' => 'UKM PMKL',
                'kontak_ukm' => '628',
                'desc_ukm' => '',
            ],
        ];

        $this->db->table('ukm')->insertBatch($data);
    }
}
