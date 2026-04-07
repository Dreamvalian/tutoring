<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFotoToPengajar extends Migration
{
    public function up()
    {
        $this->forge->addColumn('pengajar', [
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
                'after' => 'no_hp'
            ]
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('pengajar', 'foto');
    }
}
