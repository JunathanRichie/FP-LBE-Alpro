<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use App\Models\Store;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id_user' => 1,
                'nama_user' => 'Mathias Adya Diwangkara Suganda',
                'email' => '5025231015@gmail.com',
                'no_telp' => null,
                'password' => 'mathiasganteng'
            ],
            [
                'id_user' => 2,
                'nama_user' => 'Gerry Nicholas',
                'email' => '5025231017@gmail.com',
                'no_telp' => '081234567890',
                'password' => 'gerryganteng'
            ],
            [
                'id_user' => 3,
                'nama_user' => 'Junathan Richie',
                'email' => '5025231019@gmail.com',
                'no_telp' => '081234567890',
                'password' => 'richieganteng'
            ],
            [
                'id_user' => 4,
                'nama_user' => 'Vinsario Shentana',
                'email' => '5025231094@gmail.com',
                'no_telp' => null,
                'password' => 'vinsaganteng'
            ]
        ]);
    }
}
