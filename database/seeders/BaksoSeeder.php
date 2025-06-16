<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BaksoSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('baksos')->insert([
            [
                'nama' => 'Bakso Urat',
                'jenis' => 'Sapi',
                'harga' => 15000,
                'ukuran' => 'Sedang',
                'isi' => 'Urat Sapi',
                'tingkat_pedas' => 'Tidak Pedas',
                'topping' => 'Daun Bawang',
                'kuah' => 'Kaldu Sapi',
                'image' => 'images/baksos/default.jpg',
                'stok' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Bakso Telur',
                'jenis' => 'Sapi',
                'harga' => 17000,
                'ukuran' => 'Sedang',
                'isi' => 'Telur Puyuh',
                'tingkat_pedas' => 'Tidak Pedas',
                'topping' => 'Seledri',
                'kuah' => 'Kaldu Ayam',
                'image' => 'images/baksos/default.jpg',
                'stok' => 18,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Bakso Jumbo',
                'jenis' => 'Sapi',
                'harga' => 20000,
                'ukuran' => 'Besar',
                'isi' => 'Daging Sapi',
                'tingkat_pedas' => 'Sedang',
                'topping' => 'Bawang Goreng',
                'kuah' => 'Kaldu Sapi',
                'image' => 'images/baksos/default.jpg',
                'stok' => 15,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama' => 'Bakso Biasa',
                'jenis' => 'Sapi',
                'harga' => 12000,
                'ukuran' => 'Kecil',
                'isi' => 'Daging Sapi',
                'tingkat_pedas' => 'Tidak Pedas',
                'topping' => 'Daun Bawang',
                'kuah' => 'Kaldu Sapi',
                'image' => 'images/baksos/default.jpg',
                'stok' => 12,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
