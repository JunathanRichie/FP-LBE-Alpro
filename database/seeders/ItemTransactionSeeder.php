<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemTransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('items_transactions')->insert([
            [
                'id_transaction' => 1,
                'id_item' => '8 123456 789012',
                'kuantitas' => 1
            ],
            [
                'id_transaction' => 2,
                'id_item' => '8 123456 789022',
                'kuantitas' => 3
                
            ],
            [
                'id_transaction' => 3,
                'id_item' => '8 123456 789021',
                'kuantitas' => 1
            ],
            [
                'id_transaction' => 1,
                'id_item' => '8 123456 789013',
                'kuantitas' => 2
            ],
            [
                'id_transaction' => 2,
                'id_item' => '8 123456 789014',
                'kuantitas' => 4
            ]
        ]);
    }
}
