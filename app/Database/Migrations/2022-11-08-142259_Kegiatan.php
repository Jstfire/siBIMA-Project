<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Kegiatan extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_kegiatan' => [
                'type' => 'INT',
                'constraint' => 10,
                'auto_increment' => true,
            ],
            'id_ukm' => [
                'type'  => 'VARCHAR',
                'constraint'     => 10,
                'null' => true,
            ],
            'id_ormawa' => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
                'null' => true,
            ],
            'id_bidang_divisi' => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
                'null' => true,
            ],
            'id_proposal' => [
                'type' => 'INT',
                'constraint' => 10,
                'null' => true,
            ],
            'id_lpj' => [
                'type' => 'INT',
                'constraint' => 10,
                'null' => true,
            ],
            'tanggal_kegiatan' => [
                'type'       => 'DATE',
            ],
            'jam_kegiatan' => [
                'type' => 'TIME',
            ],
            'tahun_ajaran_kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'bulan_kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'tempat_kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'penanggung_jawab_kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'kontak_penanggung_jawab_kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'nama_kegiatan' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'jam_mulai' => [
                'type' => 'time'
            ],
            'jam_akhir' => [
                'type' => 'time'
            ],
            'penyelenggara' => [
                'type' => 'varchar',
                'constraint' => 255
            ]
        ]);
        $this->forge->addPrimaryKey('id_kegiatan', true);
        $this->forge->addForeignKey('id_ormawa', 'ormawa', 'id_ormawa');
        $this->forge->addForeignKey('id_ukm', 'ukm', 'id_ukm');
        $this->forge->addForeignKey('id_bidang_divisi', 'bidang_divisi', 'id_bidang_divisi');
        $this->forge->addForeignKey('id_proposal', 'proposal', 'id_proposal');
        $this->forge->addForeignKey('id_lpj', 'lpj', 'id_lpj');
        $this->forge->createTable('kegiatan');
    }

    public function down()
    {
        $this->forge->dropTable('kegiatan');
    }
}
