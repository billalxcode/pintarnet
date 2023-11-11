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

    private static function cleanEmail($name)
    {
        $cleaned = preg_replace('/[^a-zA-Z0-9.-]/', '', $name);
        return $cleaned;
    }

    private static function generateUniqueCode($length)
    {
        return Str::lower(Str::random($length));
    }

    private static function removeAcademicTitle($name)
    {
        $academicTitles = [
            "s.pd", "s.t", "a.md", "a.ma", "a.p", "s.a.b", "s.a.p",
            "s.kom", "s.pd.jas", "s.th.i", "s.th.l", "s.tr.k", "s.th",
            "s.tr.k", "s.s", "s.pi"
        ];
        $name = Str::of($name)->lower();
        foreach ($academicTitles as $title) {
            if ($name->is('*' . $title)) {
                $name = $name->replaceEnd($title, '');
            } else if ($name->is('*' . $title . '.')) {
                $name = $name->replaceEnd($title . '.', '');
            }
            if ($name->is('*, ') || $name->is('*,')) {
                $name = $name->replaceEnd(',', '');
                $name = $name->replaceEnd(' ', '');
            }
        }
        return $name;
    }

    private static function removeTitle($name)
    {
        $titles = [
            "h.",
            "hj."
        ];
        $name = Str::of($name)->lower();
        foreach ($titles as $title) {
            if ($name->is($title . '*')) {
                $name = $name->replaceFirst($title, '');
            }
            if ($name->is(' *')) {
                $name = $name->replaceFirst(' ', '');
            }
        }
        return $name;
    }

    public static function generateEmail($name, $unique = false)
    {
        // [',', '/', '\\', '@', '#', '$', '`', '%', '^', '&', '*', '(', ')', '+', '=']
        $name = Str::of($name)->lower();
        $domain = request()->getHost();

        // filter string
        $name = static::removeTitle($name);
        $name = static::removeAcademicTitle($name);
        if ($name->wordCount() == 1 || $unique) {
            $name = $name->replace(' ', '.');
            $unique_code = static::generateUniqueCode(5);
            return $name . '.' . $unique_code . '@' . $domain;
        } else {
            $name = $name->replace(' ', '.');
            return $name . '@' . $domain;
        }
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class, 'id', 'user_id');
    }

    public function scopeEmail(Builder $query, string $email)
    {
        $query->where('email', $email);
    }

    public static function createUser(
        string $name = ""
    ) {
        $user = static::where('name', $name);

        if (!$user->exists()) {
            $email = static::generateEmail($name, true);
            $user = static::where('email', $email);
            if ($user->exists()) {
                $email = static::generateEmail($name, true);
            }
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
