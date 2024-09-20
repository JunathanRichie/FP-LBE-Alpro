<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('transactions')->insert([
            [
                'id_transaction' => 1,
                'total_harga' => 67800,
                'tgl_transaksi' => '2024-09-18 02:26:23',
                'paid' => true,
                'id_user' => 1,
            ],
            [
                'id_transaction' => 2,
                'total_harga' => 67800,
                'tgl_transaksi' => '2024-09-18 02:26:23',
                'paid' => true,
                'id_user' => 2,
            ],
            [
                'id_transaction' => 3,
                'total_harga' => 67800,
                'tgl_transaksi' => '2024-09-18 02:26:23',
                'paid' => true,
                'id_user' => 3,
            ]
        ]);
    }
}
