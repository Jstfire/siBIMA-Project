<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Ormawa extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_ormawa' => [
                'type'           => 'varchar',
                'constraint'     => 10,
            ],
            'id_user' => [
                'type'           => 'INT',
                'constraint'     => 5,
            ],
            'nama_ormawa' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'kontak_ormawa' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'desc_ormawa' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addPrimaryKey('id_ormawa', true);
        $this->forge->addForeignKey('id_user', 'users', 'id_user');
        $this->forge->createTable('ormawa');

        
    }

    public function down()
    {
        $this->forge->dropTable('ormawa');
    }
}
