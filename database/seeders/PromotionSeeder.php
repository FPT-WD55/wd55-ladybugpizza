<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Promotion;
use App\Models\User;
use App\Models\PromotionUser;
use Carbon\Carbon;

class PromotionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $users = User::pluck('id')->toArray(); // Lấy ID của tất cả người dùng

        for ($i = 0; $i < 100; $i++) {
            $discount_type = rand(1, 2);
            $discount_value = $discount_type == 1 ? rand(1, 100) : rand(50000, 100000);

            $now = Carbon::now();

            // Tạo mới một khuyến mãi
            $promotion = Promotion::create([
                'code' => $faker->unique()->word,
                'description' => $faker->sentence,
                'discount_type' => $discount_type,
                'discount_value' => $discount_value,
                'start_date' => $now,
                'end_date' => $now->addDays(90),
                'quantity' => rand(1, 100),
                'min_order_total' => rand(100, 500) * 1000,
                'max_discount' => rand(100, 500) * 1000,
                'is_global' => 2,
                'rank_id' => null,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            foreach ($users as $user) {
                // Tạo mới bản ghi liên kết giữa khuyến mãi và người dùng
                PromotionUser::create([
                    'promotion_id' => $promotion->id, // Sử dụng ID của khuyến mãi đã tạo
                    'user_id' => $user,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}
