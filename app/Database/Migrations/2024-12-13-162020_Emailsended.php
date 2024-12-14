<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Emailsended extends Migration
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
            'emailsended' => [
                'type' => 'VARCHAR',
                'constraint' => '250',
                'null' => true,
            ],
            'idartikel' => [
                'type' => 'VARCHAR',
                'constraint' => '11',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);  // Menjadikan kolom 'id' sebagai primary key
        $this->forge->createTable('emailsended');  // Membuat tabel 'emailsended'

    }

    public function down()
    {
        $this->forge->dropTable('emailsended');
    }
}
