<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
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
        'profile_picture',
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
            'email' => 'encrypted',
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // getters / setters / relations
    public function getEmailAttribute($value)
    {
        return $value ? decrypt($value, false) : null;
    }

    public function historyPoints(): HasMany {
        return $this->hasMany(HistoryPoint::class)->latest()->limit(5);
    }

    // envy custom
    public function isSystem() {
        return "@EnvySystem" === $this->handle;
    }
}
