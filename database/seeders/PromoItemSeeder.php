<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromoItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('promo_items')->insert([
            [
                // glico
                'id_promo' => 1,
                'aktif' => true,
                'mn_beli' => 2,
                'diskon' => 3390,
                'id_item' => '8 123456 789012'
            ],
            [
                // samyang
                'id_promo' => 2,
                'aktif' => true,
                'mn_beli' => 2,
                'diskon' => 25590,
                'id_item' => '8 123456 789022'
            ],
            [
                // so klin
                'id_promo' => 3,
                'aktif' => true,
                'mn_beli' => 1,
                'diskon' => 9990,
                'id_item' => '8 123456 789021'
            ]
        ]);
    }
}
