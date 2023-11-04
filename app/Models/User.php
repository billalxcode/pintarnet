<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function generateEmail($name) {
        $prefix = Str::of($name)->replace(' ', '')->lower();
        return $prefix . '@smkn1maja.sch.id';
    }

    public function ruangan() {
        return $this->belongsTo(Ruangan::class, 'id', 'user_id');
    }

    public function scopeEmail(Builder $query, string $email) {
        $query->where('email', $email);
    }

    public static function createUser(
        string $name = ""
    ) {
        $user = static::where('name', $name);
        if (!$user->exists()) {
            $email = static::generateEmail($name);
            $collection = User::factory()->create([
                'name' => $name,
                'email' => $email
            ]);
            $collection->assignRole('ruangan');
            return $collection;
        } else {
            return $user->get();
        }
    }
}
