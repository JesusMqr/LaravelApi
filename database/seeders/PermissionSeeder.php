<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'name' => 'create-post',
            'display_name' => 'Create Posts', // optional
            'description' => 'create new blog posts', // optional
        ]);
        
        Permission::create([
            'name' => 'edit-user',
            'display_name' => 'Edit Users', // optional
            'description' => 'edit existing users', // optional
        ]);
    }
}
