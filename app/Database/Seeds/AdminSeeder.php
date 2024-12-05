<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama' => 'User Default', 'foto' => 'ppa.png'],
            ['nama' => 'Winda Yuliana', 'foto' => 'kmz.png'],
            ['nama' => 'Khaeril Maswal Zaid', 'foto' => 'alzaid.png'],
        ];

        // Insert data ke tabel kategori
        $this->db->table('admin')->insertBatch($data);
        //php spark db:seed AdminSeeder
    }
}
