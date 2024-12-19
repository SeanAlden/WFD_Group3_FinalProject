<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->insert([
            'name' => 'Sean Admin',
            'email' => 'sean_admin@gmail.com',
            'phone' => '081211111111',
            'profile_image' => 'profile_images/computer_shop.png', 
            'usertype' => 'admin',
            'email_verified_at' => Carbon::now(),
            'password' => Hash::make('S3344nAld3n.1771'), 
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
