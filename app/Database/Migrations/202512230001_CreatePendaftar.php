<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePendaftar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nama' => [ 'type' => 'VARCHAR', 'constraint' => 255 ],
            'no_wa' => [ 'type' => 'VARCHAR', 'constraint' => 50, 'null' => true ],
            'tanggal_lahir' => [ 'type' => 'DATE', 'null' => true ],
            'asal_sekolah' => [ 'type' => 'VARCHAR', 'constraint' => 255, 'null' => true ],
            'kelas' => [ 'type' => 'VARCHAR', 'constraint' => 50, 'null' => true ],
            'nama_orangtua' => [ 'type' => 'VARCHAR', 'constraint' => 255, 'null' => true ],
            'wa_orangtua' => [ 'type' => 'VARCHAR', 'constraint' => 50, 'null' => true ],
            'alamat_rumah' => [ 'type' => 'TEXT', 'null' => true ],
            'program' => [ 'type' => 'VARCHAR', 'constraint' => 100, 'null' => true ],
            'created_at' => [ 'type' => 'DATETIME', 'null' => true ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('pendaftar');
    }

    public function down()
    {
        $this->forge->dropTable('pendaftar');
    }
}
