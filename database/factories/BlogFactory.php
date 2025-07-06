<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition()
    {
        $title = $this->faker->sentence;
        $htmlContent = '<p>' . $this->faker->text(400) . '</p>';

        $numParagraphs = $this->faker->numberBetween(3, 6);
        for ($i = 0; $i < $numParagraphs; $i++) {
            $htmlContent .= '<p>' . $this->faker->paragraph . '</p>';
        }

        // Nama file unik
        $uniqueFileName = Str::uuid() . '_' . Str::slug($title) . '.webp';

        // Path sumber dan tujuan
        $fileSourcePath = public_path('image/default-blog.png');
        $fileDestinationPath = storage_path('app/public/blog/cover-images/' . $uniqueFileName);

        // Salin file jika sumber ada
        if (File::exists($fileSourcePath)) {
            File::ensureDirectoryExists(dirname($fileDestinationPath));
            File::copy($fileSourcePath, $fileDestinationPath);

            // Jika berhasil disalin, pakai path dari storage
            $coverImage = 'blog/cover-images/' . $uniqueFileName;
        } else {
            // Jika file tidak ditemukan, fallback ke URL online
            $coverImage = 'https://picsum.photos/800/600';
        }

        return [
            'title'         => $title,
            'description'   => $this->faker->paragraph,
            'tags'          => $this->faker->words(3),
            'content'       => $htmlContent,
            'category_id'   => $this->faker->numberBetween(1, 4),
            'author_id'     => 1,
            'is_published'  => 1,
            'cover_image'   => $coverImage,
        ];
    }
}
