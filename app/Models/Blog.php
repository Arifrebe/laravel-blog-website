<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author_id',
        'category_id',
        'description',
        'tags',
        'content',
        'slug',
        'is_published',
        'cover_image',
    ];

    protected $casts = [
        'tags' => 'array',
    ];


    // Listen for the "creating" event
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {
            // Generate slug from the title attribute
            $blog->slug = Str::slug($blog->title);
        });
    }

    // Define the relationship with User
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id')->select('id', 'username', 'profile'); ;
    }

    // Define the relationship with Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id')->latest();
    }

}
