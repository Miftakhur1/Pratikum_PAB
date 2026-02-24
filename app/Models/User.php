<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser; // 1. Import interface
use Filament\Panel; // 2. Import class Panel
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements FilamentUser // 3. Implementasikan interface
{
    use HasFactory, Notifiable, HasRoles, HasApiTokens;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * 4. Tambahkan fungsi ini agar diizinkan masuk ke panel
     */
    public function canAccessPanel(Panel $panel): bool
    {
        // Di server production, ini akan mengizinkan semua user yang terdaftar untuk login.
        // Jika ingin lebih ketat (misal: hanya email tertentu), ganti jadi:
        // return str_ends_with($this->email, '@yourdomain.com');
        return true; 
    }
}