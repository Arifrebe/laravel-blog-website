<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $existingAdmin = User::where('role_id', 1)->first();

        if (!$existingAdmin) {
            // Profile image
            $profileSourcePath = public_path('image/admin-profile.jpg');
            $uniqueProfileName = Str::uuid() . '_profile.webp';
            $profileDestinationDir = storage_path('app/public/user/profiles');
            $profileDestinationPath = $profileDestinationDir . '/' . $uniqueProfileName;

            // Buat folder jika belum ada
            if (!File::exists($profileDestinationDir)) {
                File::makeDirectory($profileDestinationDir, 0755, true);
            }

            // Background image
            $backgroundSourcePath = public_path('image/img_2.jpeg');
            $uniqueBackgroundName = Str::uuid() . '_background.jpeg';
            $backgroundDestinationDir = storage_path('app/public/user/backgrounds');
            $backgroundDestinationPath = $backgroundDestinationDir . '/' . $uniqueBackgroundName;

            // Buat folder jika belum ada
            if (!File::exists($backgroundDestinationDir)) {
                File::makeDirectory($backgroundDestinationDir, 0755, true);
            }

            // Salin file jika sumbernya ada
            if (File::exists($profileSourcePath)) {
                File::copy($profileSourcePath, $profileDestinationPath);
            } else {
                $this->command->error("❌ File profile tidak ditemukan di: $profileSourcePath");
            }

            if (File::exists($backgroundSourcePath)) {
                File::copy($backgroundSourcePath, $backgroundDestinationPath);
            } else {
                $this->command->error("❌ File background tidak ditemukan di: $backgroundSourcePath");
            }

            // Buat admin user
            User::create([
                'name'          => 'BlogkuAdmin',
                'username'      => 'BlogkuAdmin',
                'email'         => 'blogkuadmin@gmail.com',
                'password'      => Hash::make('Admin123@'),
                'profile'       => 'user/profiles/' . $uniqueProfileName,
                'background'    => 'user/backgrounds/' . $uniqueBackgroundName,
                'role_id'       => 1,
                'description'   => 'Admin Blogku',
            ]);
        } else {
            $this->command->info('⚠️ Sudah ada admin di database!');
        }
    }

}
