<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Answer;
use App\Models\User_quiz;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'email',
        'is_admin',
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
    public static function boot(): void
    {
        parent::boot();
        static::creating(function(User $user){
        $user->password=Hash::make($user->password);
        });
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // public function posts(){
    //     return $this->hasMany(Post::class);
    // }
     public function userQuizzes()
{
    return $this->hasMany(User_Quiz::class);
}
public function answers()
{
    return $this->hasManyThrough(Answer::class, User_quiz::class);
}
public function points()
{
return $this->hasMany(Point::class);
}

}