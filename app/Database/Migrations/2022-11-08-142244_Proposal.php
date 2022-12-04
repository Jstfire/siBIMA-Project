<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Proposal extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id_proposal' => [
                    'type' => 'INT',
                    'constraint' => 10,
                    'auto_increment' => true,
                ],
                'id_user' => [
                    'type' => 'INT',
                    'constraint' => 10,
                    'default' => null,
                ],
                'id_kegiatan' => [
                    'type' => 'INT',
                    'constraint' => 10,
                    'default' => null,
                ],
                'id_lpj' => [
                    'type' => 'INT',
                    'constraint' => 10,
                    'default' => null,
                ],
                'id_ukm' => [
                    'type'           => 'VARCHAR',
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
                'link_proposal' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],
                'nama_proposal' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],
                'untuk_wadir' => [
                    'type' => 'bool',
                    'default' => false,
                ],
                'acc_upk' => [
                    'type' => 'bool',
                    'default' => false,
                ],
                'acc_baak' => [
                    'type' => 'bool',
                    'default' => false,
                ],
                'acc_wadir' => [
                    'type' => 'bool',
                    'default' => false,
                    'null' => true,
                ],
            ]
        );
        $this->forge->addPrimaryKey('id_proposal');
        $this->forge->addForeignKey('id_ormawa', 'ormawa', 'id_ormawa');
        $this->forge->addForeignKey('id_ukm', 'ukm', 'id_ukm');
        $this->forge->addForeignKey('id_user', 'users', 'id_user');
        $this->forge->addForeignKey('id_bidang_divisi', 'bidang_divisi', 'id_bidang_divisi');
        $this->forge->addForeignKey('id_kegiatan', 'kegiatan', 'id_kegiatan');
        $this->forge->addForeignKey('id_lpj', 'lpj', 'id_lpj');
        $this->forge->createTable('proposal');
    }

    public function down()
    {
        $this->forge->dropTable('proposal');
    }
}
