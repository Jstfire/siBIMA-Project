<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ukm extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ukm' => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
            ],
            'id_ormawa' => [
                'type'           => 'VARCHAR',
                'constraint'     => 10,
            ],
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'nama_ukm' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'kontak_ukm' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'default' => null,
            ],
            'desc_ukm' => [
                'type' => 'TEXT',
                'default' => null,
            ],
        ]);
        $this->forge->addPrimaryKey('id_ukm', true);
        $this->forge->addForeignKey('id_ormawa', 'ormawa', 'id_ormawa');
        $this->forge->addForeignKey('id_user', 'users', 'id_user');
        $this->forge->createTable('ukm');
    }

    public function down()
    {
        $this->forge->dropTable('ukm');
    }
}
