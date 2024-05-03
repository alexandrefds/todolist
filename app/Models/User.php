<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
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
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    //TODO:CRUD

    /**
     * @param array $data
     * @return void
     */
    public static function userCreate(array $userData): void
    {
        $user = new User($userData);
        $user->save();
    }

    /**
     * @param int $userId
     * @return User
     */
    public static function userGetById(int $userId): User
    {
        return self::findOrFail($userId);
    }

    /**
     * @param int $userId
     * @param array $userData
     * @return void
     */
    public static function userUpdate(int $userId, array $userData): void
    {
        $user = self::findOrFail($userId);
        $user->update($userData);
    }

    /**
     * @param int $userId
     * @return void
     */
    public static function userDelete(int $userId): void
    {
        $user = User::findOrFail($userId);
        $user->delete();
    }
}
