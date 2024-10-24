<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            LogSeeder::class,
            // ChatSeeder::class,
            CategorySeeder::class,
            AttributeSeeder::class,
            MembershipRankSeeder::class,
            MembershipSeeder::class,
            OrderStatusSeeder::class,
            ProductSeeder::class,
            ToppingSeeder::class,
            CartSeeder::class,
            CartItemSeeder::class,
            CartItemAttributeSeeder::class,
            CartItemToppingSeeder::class,
            PaymentMethodSeeder::class,
            PromotionSeeder::class,
            OrderSeeder::class,
            BannerSeeder::class,
            EvaluationSeeder::class, 
            EvaluationImageSeeder::class,
            PageSeeder::class,
            // ShippingSeeder::class,
            TransactionSeeder::class,
            InvoiceSeeder::class,
            ComboDetailSeeder::class,
            FavoriteSeeder::class,
            FAQSeeder::class,
            UserSettingSeeder::class,
        ]); 
    }
}
