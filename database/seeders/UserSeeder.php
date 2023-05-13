<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => Str::random(10),
            'number_phone' => '097362738271',
            'email' => Str::random(10) . '@gmail.com',
            // 'password' => 'superman'
            'password' => bcrypt('superman'),
        ]);
        // \App\Models\User::factory(1)->create();

        // \App\Models\User::factory()->create([
        // 'name' => Str::random(10),
        // 'number_phone' => '097362738271',
        // 'email' => Str::random(10) . '@gmail.com',
        // 'password' => Hash::make('password'),
        // ]);
    }
}
