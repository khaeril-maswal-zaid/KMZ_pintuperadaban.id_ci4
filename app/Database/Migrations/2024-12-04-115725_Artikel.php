<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Artikel extends Migration
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
            'tanggal' => [
                'type' => 'DATE',  // Tipe data untuk tanggal (YYYY-MM-DD)
            ],
            'yposting' => [
                'type' => 'INT',
                'constraint' => 4,
                'default' => 0,  // Default nilai
            ],
            'waktu' => [
                'type' => 'TIME',  // Tipe data waktu (HH:MM:SS)
            ],
            'time' => [
                'type' => 'INT',  // Untuk waktu lengkap (tanggal + waktu)
                'null' => true,  // Bisa null
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '255',  // Slug biasanya berupa teks panjang
                'unique' => true,  // Menjamin slug tidak duplikat
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => '255',  // Judul biasanya teks dengan panjang tertentu
            ],
            'description' => [
                'type' => 'TEXT',  // Deskripsi panjang, bisa lebih dari 255 karakter
            ],
            'srcimg' => [
                'type' => 'VARCHAR',
                'constraint' => '255',  // Menyimpan URL atau path gambar
                'null' => true,  // Bisa kosong jika tidak ada gambar
            ],
            'picture' => [
                'type' => 'VARCHAR',
                'constraint' => '255',  // Nama gambar, path relatif atau URL
                'null' => true,
            ],
            'oleh' => [
                'type' => 'VARCHAR',
                'constraint' => '100',  // Nama penulis
            ],
            'kategori' => [
                'type' => 'VARCHAR',
                'constraint' => '50',  // Nama kategori
                'default' => 'news',  // Default level adalah 1
            ],
            'level' => [
                'type' => 'VARCHAR',
                'constraint' => '50',  // Menyimpan level (misalnya, level 1 untuk artikel biasa, level 2 untuk yang lebih penting, dll)
                'default' => 'news',  // Default level adalah 1
            ],
            'artikel' => [
                'type' => 'TEXT',  // Isi artikel, bisa sangat panjang
            ],
            'visit' => [
                'type' => 'INT',
                'constraint' => 11,  // Jumlah kunjungan
                'default' => 0,  // Default 0 kunjungan
            ],
            'view' => [
                'type' => 'INT',
                'constraint' => 11,  // Jumlah tampilan
                'default' => 0,  // Default 0 tampilan
            ],
        ]);
        $this->forge->addKey('id', true);  // Menjadikan kolom 'id' sebagai primary key
        $this->forge->createTable('artikel');  // Membuat tabel 'artikel'
    }


    public function down()
    {
        $this->forge->dropTable('artikel');
    }
}
