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
                    'null' => true,
                ],
                'link_proposal' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                    'null' => true,
                ],
                'nama_proposal' => [
                    'type' => 'VARCHAR',
                    'constraint' => 255,
                ],
                'untuk_wadir' => [
                    'type' => 'boolean',
                    'default' => false,
                ],
                'acc_upk' => [
                    'type' => 'int',
                    'default' => 2,
                ],
                'acc_baak' => [
                    'type' => 'int',
                    'default' => 2,
                ],
                'acc_wadir' => [
                    'type' => 'int',
                    'default' => 2,
                    'null' => true,
                ],
            ]
        );
        $this->forge->addPrimaryKey('id_proposal');
        $this->forge->addForeignKey('id_user', 'users', 'id_user');
        $this->forge->createTable('proposal');
    }

    public function down()
    {
        $this->forge->dropTable('proposal');
    }
}
