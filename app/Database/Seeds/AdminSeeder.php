<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['nama' => 'Editor Ppc', 'foto' => 'ppa.png', 'username' => 'editor@pintuperadaban.com', 'password' => '$2y$10$T7k54D8DL2rQPaJ0zeBEvOC3NSE2raGMcZqQqg3UMWwTEaKOiehnq'],
            ['nama' => 'Khaeril Maswal Zaid', 'foto' => 'kmz.png',  'username' => 'muhammadkhaerilzaid@gmail.com', 'password' => '$2y$10$T7k54D8DL2rQPaJ0zeBEvOC3NSE2raGMcZqQqg3UMWwTEaKOiehnq'],
        ];

        // Insert data ke tabel kategori
        $this->db->table('admin')->insertBatch($data);
        //php spark db:seed AdminSeeder
    }
}
