<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UPK extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_upk' => [
                'type' => 'INT',
                'constraint' => 10,
            ],
            'desc_upk' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addPrimaryKey('id_upk');
        $this->forge->createTable('upk');
    }

    public function down()
    {
        $this->forge->dropTable('upk');
    }
}
