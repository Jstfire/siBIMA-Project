<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Lpj extends Migration
{
    public function up()
    {
        $this->forge->addField(
            [
                'id_lpj' => [
                    'type' => 'INT',
                    'constraint' => 10,
                    'auto_increment' => true,
                ],
                'id_kegiatan' => [
                    'type' => 'INT',
                    'constraint' => 10,
                ],
                'id_user' => [
                    'type' => 'INT',
                    'constraint' => 10,
                ],
                'url_file' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ]
            ]
        );
        $this->forge->addPrimaryKey('id_lpj');
        $this->forge->addForeignKey('id_user', 'users', 'id_user');
        $this->forge->createTable('lpj');
    }

    public function down()
    {
        $this->forge->dropTable('lpj');
    }
}
