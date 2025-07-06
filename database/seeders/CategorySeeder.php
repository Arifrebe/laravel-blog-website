<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Category::count() == 0) {
            $categories = [
                'Masakan', 'Agama', 'Bola',
                'Musik'
            ];
    
            foreach ($categories as $category) {
                Category::create([
                    'name'  => $category,
                ]);
            }
        }else{
            $this->command->info('⚠️ Sudah ada kategori di database!');
        }
    }
}
