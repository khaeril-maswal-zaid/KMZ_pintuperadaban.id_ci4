<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['kategori' => 'Teologi', 'icon' => 'icon-teologi.png'],
            ['kategori' => 'Filsafat', 'icon' => 'icon-filsafat.png'],
            ['kategori' => 'Ekonomi', 'icon' => 'icon-ekonomi.png'],
            ['kategori' => 'Sosial', 'icon' => 'icon-sosial.png'],
            ['kategori' => 'Politik', 'icon' => 'icon-politik.png'],
            ['kategori' => 'News', 'icon' => 'icon-opini.png'],
            ['kategori' => 'Opini', 'icon' => 'icon-opini.png'],
            ['kategori' => 'The Story', 'icon' => 'icon-sosial.png'],
        ];

        // Insert data ke tabel kategori
        $this->db->table('kategori')->insertBatch($data);
        //php spark db:seed KategoriSeeder
    }
}
