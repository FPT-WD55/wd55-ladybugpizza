<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Product;
use App\Models\Topping;
use Illuminate\Database\Seeder;

class CartItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $carts = Cart::all();
        $products = Product::all();
        $attributes = Attribute::all();
        $randomAttributes = $attributes->random()->id;
        $attributesArray = [];
        foreach ($randomAttributes as $attribute) {
            if ($attribute->values->isNotEmpty()) {
                $value = $attribute->values->random()->id;
                $attributesArray[$attribute->slug] = $value;
            }
        }
        $toppings = Topping::all();
        $items = [];

        for ($i = 0; $i < 100; $i++) {
            $items[] = [
                'cart_id' => $carts->random()->id,
                'product_id' => $products->random()->id,
                'price' => rand(100, 500) * 1000,
                'attributes' => json_encode($attributesArray),
                'toppings' => json_encode($toppings->random(rand(1, 17))->pluck('id')->toArray()), // Số lượng topping ngẫu nhiên từ 1 đến 3
                'discount_price' => rand(100, 500) * 1000,
                'quantity' => rand(1, 5),
                'amount' => rand(100, 500) * 1000,
            ];
        }

        CartItem::insert($items);
    }
}
