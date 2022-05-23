<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "Admin",
            'username' => "admin",
            'avatar' => "https://www.business2community.com/wp-content/uploads/2017/08/blank-profile-picture-973460_640.png",
            'is_admin' => true,
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => 'admin12345',
            'remember_token' => Str::random(10),
        ]);
    }
}
