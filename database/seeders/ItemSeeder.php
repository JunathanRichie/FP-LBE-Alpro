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
                'image' => 'laptop.jpg'
            ],
            [
                'id_item' => '8 123456 789013',
                'nama_item' => 'Indomie Kari Ayam',
                'stock_item' => 100,
                'harga_item' => 3000,
                'image' => 'laptop.jpg'
            ],
            [
                'id_item' => '8 123456 789014',
                'nama_item' => 'Kopi Kapal Api',
                'stock_item' => 100,
                'harga_item' => 5000,
                'image' => 'laptop.jpg'
            ],
            [
                'id_item' => '8 123456 789015',
                'nama_item' => 'Teh Sosro',
                'stock_item' => 100,
                'harga_item' => 4000,
<<<<<<< HEAD
                'image' => 'laptop.jpg'
=======
                'image' => 'teh-sosro.png'
>>>>>>> 5bbedb781e1bb2f2cd8d5a89946bb2702f61e304
            ],
            [
                'id_item' => '8 123456 789016',
                'nama_item' => 'Kacang Dua Kelinci 375gr',
                'stock_item' => 100,
                'harga_item' => 15000,
                'image' => 'laptop.jpg'
            ],
            [
                'id_item' => '8 123456 789017',
                'nama_item' => 'Chitato Rasa Ayam Bakar 68gr',
                'stock_item' => 100,
                'harga_item' => 10000,
                'image' => 'laptop.jpg'
            ],
            [
                'id_item' => '8 123456 789018',
                'nama_item' => 'Ultra Milk Full Cream 1000ml',
                'stock_item' => 100,
                'harga_item' => 15000,
                'image' => 'laptop.jpg'
            ],
            [
                'id_item' => '8 123456 789019',
                'nama_item' => 'Kopi ABC Susu 190ml',
                'stock_item' => 100,
                'harga_item' => 6000,
                'image' => 'laptop.jpg'
            ],
            [
                'id_item' => '8 123456 789020',
                'nama_item' => 'Glico Biscuit Pocky Box 47gr',
                'stock_item' => 100,
                'harga_item' => 9190,
                'image' => 'laptop.jpg'
                // promo beli 2 lebih hemat jadi 14.990
            ],
            [
                'id_item' => '8 123456 789021',
                'nama_item' => 'So Klin Softergent Bubuk Bag 1,5kg',
                'stock_item' => 100,
                'harga_item' => 38490,
                'image' => 'laptop.jpg'
                // promo 25% jadi 28.500
            ],
            [
                'id_item' => '8 123456 789022',
                'nama_item' => 'Samyang Mi Goreng 2xSpciy Hot Chicken 140gr',
                'stock_item' => 100,
                'harga_item' => 25590,
                'image' => 'laptop.jpg'
                // beli 2 gratis 1 
            ]
        ]);
    }
}
