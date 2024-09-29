<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Role;
use App\Models\Address;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();
        $faker = Faker::create();

        $usersData = [
            [
                'username' => 'quandohong28',
                'role_id' => 3,
                'email' => 'quandohong28@gmail.com',
                'fullname' => 'Đỗ Hồng Quân',
                'phone' => '0362303364',
                'password' => Hash::make('quandohong28@gmail.com'),
                'google_id' => null,
                'date_of_birth' => '2004-04-28',
                'gender' => 1,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username' => 'blackwhilee04',
                'role_id' => 3,
                'email' => 'blackwhilee04@gmail.com',
                'fullname' => 'Lê Văn Thành',
                'phone' => '0382606012',
                'password' => Hash::make('blackwhilee04@gmail.com'),
                'google_id' => null,
                'date_of_birth' => '2004-07-13',
                'gender' => 1,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username' => 'duynguyenhuu2004',
                'role_id' => 3,
                'email' => 'duynguyenhuu2004@gmail.com',
                'fullname' => 'Nguyễn Hữu Duy',
                'phone' => '0372881768',
                'password' => Hash::make('duynguyenhuu2004@gmail.com'),
                'google_id' => null,
                'date_of_birth' => '2004-05-20',
                'gender' => 1,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username' => 'trantrunghieu422',
                'role_id' => 3,
                'email' => 'trantrunghieu422@gmail.com',
                'fullname' => 'Trần Chung Hiếu',
                'phone' => '0326239019',
                'password' => Hash::make('trantrunghieu422@gmail.com'),
                'google_id' => null,
                'date_of_birth' => '2004-04-22',
                'gender' => 1,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username' => 'vohuutuan04',
                'role_id' => 3,
                'email' => 'vohuutuan04@gmail.com',
                'fullname' => 'Võ Hữu Tuấn',
                'phone' => '0799123089',
                'password' => Hash::make('vohuutuan04@gmail.com'),
                'google_id' => null,
                'date_of_birth' => '2004-04-04',
                'gender' => 1,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username' => 'nguynhuyen111',
                'role_id' => 3,
                'email' => 'nguynhuyen111@gmail.com',
                'fullname' => 'Nguyễn Thị Huyền',
                'phone' => '0982381200',
                'password' => Hash::make('nguynhuyen111@gmail.com'),
                'google_id' => null,
                'date_of_birth' => '2004-11-11',
                'gender' => 2,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'username' => 'tranthihaaaa9423',
                'role_id' => 3,
                'email' => 'tranthihaaaa9423@gmail.com',
                'fullname' => 'Trần Thị Hà',
                'phone' => '0395730904',
                'password' => Hash::make('tranthihaaaa9423@gmail.com'),
                'google_id' => null,
                'date_of_birth' => '2004-07-13',
                'gender' => 2,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        foreach ($usersData as $data) {
            $user = User::create($data);

            Address::create([
                'user_id' => $user->id,
                'title' => $faker->name,
                'phone' => $user->phone,
                'province' => $faker->state,
                'district' => $faker->city,
                'ward' => $faker->city,
                'detail_address' => $faker->address,
                'lng' => $faker->longitude,
                'lat' => $faker->latitude,
                'is_default' => true,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }
}