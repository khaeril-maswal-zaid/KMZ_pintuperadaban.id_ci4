<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Viewerspage extends Migration
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
            'deteksi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'date' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'idartikel' => [
                'type' => 'VARCHAR',
                'constraint' => '11',
                'null' => true,
            ],

        ]);

        $this->forge->addKey('id', true);  // Menjadikan kolom 'id' sebagai primary key
        $this->forge->createTable('viewerspage');  // Membuat tabel 'artikel'
    }

    public function down()
    {
        $this->forge->dropTable('viewerspage');
    }
}
