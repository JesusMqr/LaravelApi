<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'jdev',
            'email' => 'jdev@example.com',
            'password' => Hash::make('password'),
        ]);
        User::factory()->create([
            'name' => 'jadmin',
            'email' => 'jadmin@example.com',
            'password' => Hash::make('password'),
        ]);
    }
}
