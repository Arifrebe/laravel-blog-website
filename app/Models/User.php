<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable ;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'profile',
        'background',
        'password',
        'role_id',
        'facebook',
        'instagram',
        'twitter',
        'description',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function blogs() {
        return $this->hasMany(Blog::class, 'author_id');
    }
    
    public function comments(){    
        return $this->hasMany(Comment::class);
    }

    public function setPasswordAtrribute($value) {
        if (!empty($value)) {
            $this->attributes['password'] = strlen($value) === 60 && preg_match('/^\$2y\$/', $value)
                ? $value
                : Hash::make($value);
        }
    }

    protected function profile(): Attribute
    {
        return Attribute::get(function ($value) {
            return $value ? 'storage/' . $value : 'image/default-profile.png';
        });
    }

    protected function background(): Attribute
    {
        return Attribute::get(function ($value) {
            return $value ? 'storage/' . $value : 'image/blank_image.jpg';
        });
    }
}
