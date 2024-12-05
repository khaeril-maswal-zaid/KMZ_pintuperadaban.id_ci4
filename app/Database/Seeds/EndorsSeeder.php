<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class EndorsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['hrefsourcelef' => '', 'wa' => '', 'sourcechat' => '', 'chat' => '', 'hrefsourceright' => '', 'imgsourceleft' => '', 'idbrand' => '', 'imgsourceright' => '', 'brand' => ''],
            ['hrefsourcelef' => '', 'wa' => '', 'sourcechat' => '', 'chat' => '', 'hrefsourceright' => '', 'imgsourceleft' => '', 'idbrand' => '', 'imgsourceright' => '', 'brand' => ''],
            ['hrefsourcelef' => '', 'wa' => '', 'sourcechat' => '', 'chat' => '', 'hrefsourceright' => '', 'imgsourceleft' => '', 'idbrand' => '', 'imgsourceright' => '', 'brand' => ''],
            ['hrefsourcelef' => '', 'wa' => '', 'sourcechat' => '', 'chat' => '', 'hrefsourceright' => '', 'imgsourceleft' => '', 'idbrand' => '', 'imgsourceright' => '', 'brand' => ''],
            ['hrefsourcelef' => '', 'wa' => '', 'sourcechat' => '', 'chat' => '', 'hrefsourceright' => '', 'imgsourceleft' => '', 'idbrand' => '', 'imgsourceright' => '', 'brand' => ''],
            ['hrefsourcelef' => '', 'wa' => '', 'sourcechat' => '', 'chat' => '', 'hrefsourceright' => '', 'imgsourceleft' => '', 'idbrand' => '', 'imgsourceright' => '', 'brand' => ''],
        ];

        // Insert data ke tabel endors
        $this->db->table('endors')->insertBatch($data);
        //php spark db:seed EndorsSeeder
    }
}
