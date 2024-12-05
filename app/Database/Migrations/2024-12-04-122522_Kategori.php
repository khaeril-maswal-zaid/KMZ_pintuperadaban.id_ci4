<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKategoriTable extends Migration
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
            'kategori' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],
            'icon' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true, // Bisa null jika tidak ada icon
            ],
        ]);
        $this->forge->addKey('id', true); // Primary key
        $this->forge->createTable('kategori'); // Membuat tabel kategori
    }

    public function down()
    {
        $this->forge->dropTable('kategori'); // Menghapus tabel kategori jika rollback
    }
}
