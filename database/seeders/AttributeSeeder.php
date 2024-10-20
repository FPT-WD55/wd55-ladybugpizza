<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Models\Category;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $attibutes = [
            'Loại đế' => [
                'Dày',
                'Mỏng',
            ],
            'Kích thước' => [
                'Size S',
                'Size M',
                'Size L',
            ],
            'Sốt' => [
                'Kem béo Alfredo',
                'Kem Carbonara',
                'Cà chua Marinara',
                'Nấm',
                'Húng quế Pesto',
                'Không sốt',
            ]
        ];

        foreach ($attibutes as $name => $values) {
            $attribute = Attribute::create([
                'name' => $name,
                'status' => 1,
                'category_id' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);

            foreach ($values as $value) {
                AttributeValue::create([
                    'attribute_id' => $attribute->id,
                    'value' => $value,
                    'quantity' => rand(0, 100),
                    'price' => 2,
                    'price_type' => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}
