<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Langganan extends Migration
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
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '255',  // Menyimpan URL atau path gambar
                'null' => true,  // Bisa kosong jika tidak ada gambar
            ]
        ]);

        $this->forge->addKey('id', true);  // Menjadikan kolom 'id' sebagai primary key
        $this->forge->createTable('langganan');  // Membuat tabel 'langganan'

    }

    public function down()
    {
        $this->forge->dropTable('langganan');
    }
}
