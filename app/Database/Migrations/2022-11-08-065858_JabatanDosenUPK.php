<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class JabatanDosenUPK extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_jabatan' => [
                'type' => 'VARCHAR',
                'constraint' => 10,
            ],
            'nama_jabatan' => [
                'type'           => 'VARCHAR',
                'constraint'     => 255,
            ],
        ]);
        $this->forge->addPrimaryKey('id_jabatan', true);
        $this->forge->createTable('jabatan_dosen_upk');
    }

    public function down()
    {
        $this->forge->dropTable('jabatan_dosen_upk');
    }
}
