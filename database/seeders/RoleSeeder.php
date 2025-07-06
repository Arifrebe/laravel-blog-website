<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['id'=> 1, 'name' => 'Admin'], 
            ['id'=> 2, 'name' =>'Author'], 
            ['id'=> 3, 'name' =>'User']
        ];

        if (Role::count() == 0) {
            foreach ($roles as $role) {
                Role::create([
                    'id' => $role['id'],
                    'name' => $role['name']
                ]);
            }
            $this->command->info('✅ Role berhasil dimasukkan!');
        } else {
            $this->command->info('⚠️ Sudah ada role di database!');
        }
    }
}
