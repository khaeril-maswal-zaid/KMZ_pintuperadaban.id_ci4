<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Endors extends Migration
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
            'hrefsourcelef' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'wa' => [
                'type' => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],
            'sourcechat' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'chat' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,

            ],
            'hrefsourceright' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,

            ],
            'imgsourceleft' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'idbrand' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'imgsourceright' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
            'brand' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);  // Menjadikan kolom 'id' sebagai primary key
        $this->forge->createTable('endors');  // Membuat tabel 'endors'

    }

    public function down()
    {
        $this->forge->dropTable('endors');
    }
}
