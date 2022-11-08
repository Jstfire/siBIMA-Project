<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Mahasiswa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_mahasiswa' => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'id_ukm' => [
                'type'           => 'varchar',
                'constraint'     => 10,
                'null' => true,
            ],
            'id_ormawa' => [
                'type'           => 'varchar',
                'constraint'     => 10,
                'null' => true,
            ],
            'id_bidang_divisi' => [
                'type'           => 'varchar',
                'constraint'     => 10,
                'null' => true,
            ],
            'nama_mahasiswa' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'kelas_mahasiswa' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'angkatan_mahasiswa' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'jabatan_mahasiswa' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
        ]);
        $this->forge->addPrimaryKey('id_mahasiswa', true);
        $this->forge->addForeignKey('id_ormawa', 'ormawa', 'id_ormawa');
        $this->forge->addForeignKey('id_ukm', 'ukm', 'id_ukm');
        $this->forge->addForeignKey('id_bidang_divisi', 'bidang_divisi', 'id_bidang_divisi');
        $this->forge->createTable('mahasiswa');
    }

    public function down()
    {
        $this->forge->dropTable('mahasiswa');
    }
}
