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
                'id_kegiatan' => [
                    'type' => 'INT',
                    'constraint' => 10,
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
            ]
        );
        $this->forge->addPrimaryKey('id_proposal');
        $this->forge->addForeignKey('id_ormawa', 'ormawa', 'id_ormawa');
        $this->forge->addForeignKey('id_ukm', 'ukm', 'id_ukm');
        $this->forge->addForeignKey('id_bidang_divisi', 'bidang_divisi', 'id_bidang_divisi');
        $this->forge->createTable('proposal');
    }

    public function down()
    {
        $this->forge->dropTable('proposal');
    }
}
