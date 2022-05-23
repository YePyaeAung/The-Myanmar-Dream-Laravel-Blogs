<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */
    // protected $guarded = [];
    // protected $fillable = [
        //     'name',
        //     'username',
        //     'email',
        //     'password',
        // ];
        
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
        public function blogs()
        {
            return $this->hasMany(Blog::class);
        }
    // Acessor
        
    // laravel version 8
    // public function getNameAttribute($value)
    // {
    //     return ucwords($value);
    // }
        // laravel version 9
        protected function name(): Attribute
        {
            return Attribute::make(
                get: fn ($value) => ucwords($value),
            );
        }
    // Mutator
    
    //laravel version 8
    // public function setPasswordAttribute($value)
    // {
    //     $this->attributes['password'] = bcrypt($value);
    // }
    
    // laravel version 9            
    protected function password(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value,
            set: fn ($value) => bcrypt($value),
        );
    }
    public function subscribedBlogs()
    {
        return $this->belongsToMany(Blog::class);
    }
    public function isSubscribed($blog)
    {
        return (auth()->user()->subscribedBlogs && auth()->user()->subscribedBlogs->contains('id', $blog->id));
    }
}
            