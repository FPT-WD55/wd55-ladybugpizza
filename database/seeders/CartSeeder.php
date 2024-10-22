<?php

namespace Database\Seeders;

use App\Models\Cart;
use App\Models\ProductAttribute;
use App\Models\Topping;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::all();
        $carts = [
            [
                'user_id' => $users->random()->id,
                'price' => rand(100, 500) * 1000,
                'discount_price' => rand(100, 500) * 1000,
            ],
            [
                'user_id' => $users->random()->id,
                'price' => rand(100, 500) * 1000,
                'discount_price' => rand(100, 500) * 1000,
            ],
            [
                'user_id' => $users->random()->id,
                'price' => rand(100, 500) * 1000,
                'discount_price' => rand(100, 500) * 1000,
            ],
        ];

        Cart::insert($carts);
    }
}
