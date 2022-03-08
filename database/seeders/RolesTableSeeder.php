<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Admin'
        ]);

        Role::create([
            'name' => 'Editor'
        ]);
        
        Role::create([
            'name' => 'Viewer'
        ]);
        
        Role::create([
            'name' => 'Guest'
        ]);
    }
}
