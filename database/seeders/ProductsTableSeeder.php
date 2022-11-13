<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
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
                'product_code' => 'SKULSKILNP',
                'product_name' => 'So klin pewangin',
                'price' => 15000,
                'currency' => 'IDR',
                'discount' => 10,
                'dimension' => '13 cm x 10 cm',
                'unit' => 'PCS',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'product_code' => 'SKULSKILNA',
                'product_name' => 'Ekonomi power liquid',
                'price' => 20000,
                'currency' => 'IDR',
                'discount' => 10,
                'dimension' => '15 cm x 10 cm',
                'unit' => 'PCS',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
            [
                'product_code' => 'SKULSKILNC',
                'product_name' => 'ale ale',
                'price' => 5000,
                'currency' => 'IDR',
                'discount' => 5,
                'dimension' => '5 cm x 10 cm',
                'unit' => 'PCS',
                'created_at' => new \DateTime,
                'updated_at' => null,
            ],
        ];

        DB::table('products')->insert($data);
    }
}
