<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Auth\Passwords\CanResetPassword;

use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, CanResetPassword;

    /**
     * Kolom yang bisa diisi (mass assignable).
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role' // role = admin, inventory, sales, front_office
    ];

    /**
     * Kolom yang disembunyikan ketika model di-serialize.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Casting otomatis untuk kolom tertentu.
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Akses role langsung dengan format string.
     * Contoh: $user->role akan mengembalikan 'admin' atau 'sales'.
     */
    protected function role(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $value,
            set: fn($value) => strtolower($value)
        );
    }

    /**
     * Cek apakah user memiliki role tertentu.
     */
    public function hasRole(string $role): bool
    {
        return strtolower($this->role) === strtolower($role);
    }
}
