<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'user' => 'Smit',
                'password' => '_smlt_OK',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ];

        DB::table('login')->insert($data);
    }
}
