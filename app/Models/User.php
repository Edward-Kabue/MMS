<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Filament\Panel;
use App\Models\Lead;
use App\Models\Post;
use App\Models\Tasks;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Filament\Models\Contracts\FilamentUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

//Authenticatable is a trait that is used to authenticate users
//Restrict admin access to filament panel

class User extends Authenticatable implements FilamentUser
{
    //use HasFactory trait which is a factory for creating model instances
    //use HasApiTokens trait which is used to issue API tokens to users
    //use Notifiable trait which is used to send notifications to users
    
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'is_admin',
        'name',
        'email',
        'password',
       
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
        'password' => 'hashed',
    ];
    //relationships
    //A user has many tasks
    public function tasks()
    {
        return $this->hasMany(Tasks::class);
    }
    //A user has many posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    //A user has many leads
    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
    public function canAccessPanel(Panel $panel): bool
    {
        return $this->is_admin;
    }
}
