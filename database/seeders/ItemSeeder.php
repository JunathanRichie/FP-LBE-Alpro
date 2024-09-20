<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items')->insert([
            [
                'id_item' => '8 123456 789012',
                'nama_item' => 'Indomie Goreng',
                'stock_item' => 100,
                'harga_item' => 2500,
                'image' => 'indomie-goreng.jpg'
            ],
            [
                'id_item' => '8 123456 789013',
                'nama_item' => 'Indomie Kari Ayam',
                'stock_item' => 100,
                'harga_item' => 3000,
                'image' => 'indomie-kari-ayam.jpg'
            ],
            [
                'id_item' => '8 123456 789014',
                'nama_item' => 'Kopi Kapal Api',
                'stock_item' => 100,
                'harga_item' => 5000,
                'image' => 'kopi-kapal-api.jpg'
            ],
            [
                'id_item' => '8 123456 789015',
                'nama_item' => 'Teh Sosro',
                'stock_item' => 100,
                'harga_item' => 4000,
                'image' => 'teh-sosro.png'
            ],
            [
                'id_item' => '8 123456 789016',
                'nama_item' => 'Kacang Dua Kelinci 375gr',
                'stock_item' => 100,
                'harga_item' => 15000,
                'image' => 'kacang-dua-kelinci.jpg'
            ],
            [
                'id_item' => '8 123456 789017',
                'nama_item' => 'Chitato Rasa Ayam Bakar 68gr',
                'stock_item' => 100,
                'harga_item' => 10000,
                'image' => 'chitato-ayam-bakar.jpg'
            ],
            [
                'id_item' => '8 123456 789018',
                'nama_item' => 'Ultra Milk Full Cream 1000ml',
                'stock_item' => 100,
                'harga_item' => 15000,
                'image' => 'ultra-milk-full-cream.jpg'
            ],
            [
                'id_item' => '8 123456 789019',
                'nama_item' => 'Kopi ABC Susu 190ml',
                'stock_item' => 100,
                'harga_item' => 6000,
                'image' => 'kopi-abc-susu.jpg'
            ],
            [
                'id_item' => '8 123456 789020',
                'nama_item' => 'Glico Biscuit Pocky Box 47gr',
                'stock_item' => 100,
                'harga_item' => 9190,
                'image' => 'glico-biscuit-pocky.jpg'
                // promo beli 2 lebih hemat jadi 14.990
            ],
            [
                'id_item' => '8 123456 789021',
                'nama_item' => 'So Klin Softergent Bubuk Bag 1,5kg',
                'stock_item' => 100,
                'harga_item' => 38490,
                'image' => 'so-klin-softergent.jpg'
                // promo 25% jadi 28.500
            ],
            [
                'id_item' => '8 123456 789022',
                'nama_item' => 'Samyang Mi Goreng 2xSpciy Hot Chicken 140gr',
                'stock_item' => 100,
                'harga_item' => 25590,
                'image' => 'samyang-2xspicy.jpg'
                // beli 2 gratis 1 
            ]
        ]);
    }
}
