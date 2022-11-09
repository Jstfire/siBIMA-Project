<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Dosen extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            'id_user' => [
                'type' => 'INT',
                'constraint' => 5,
            ],
            'nama_dosen' => [
                'type' => 'varchar',
                'constraint' => 255,
            ],
            'id_jabatan' => [
                'type' => 'varchar',
                'constraint' => 255
            ],
            'nip_dosen' => [
                'type' => 'varchar',
                'constraint' => 255
            ]
        ]);
        $this->forge->addPrimaryKey('id_user', true);
        $this->forge->createTable('dosen');
    }

    public function down()
    {
        //
        $this->forge->dropTable('dosen');
    }
}
