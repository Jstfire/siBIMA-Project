<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BidangDivisiUKM extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_bidang_divisi' => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
            ],
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'id_ukm' => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
            ],
            'id_ormawa' => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
            ],
            'nama_bidang_divisi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'kontak_bidang_divisi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'default' => null,
            ],
            'desc_ormawa' => [
                'type' => 'TEXT',
                'default' => null,
            ],
        ]);
        $this->forge->addPrimaryKey('id_bidang_divisi', true);
        $this->forge->addForeignKey('id_user', 'users', 'id_user');
        $this->forge->addForeignKey('id_ormawa', 'ormawa', 'id_ormawa');
        $this->forge->addForeignKey('id_ukm', 'ukm', 'id_ukm');
        $this->forge->createTable('bidang_divisi');
    }

    public function down()
    {
        $this->forge->dropTable('bidang_divisi');
    }
}
