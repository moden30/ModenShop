<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Kế thừa User để hỗ trợ xác thực
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Sanctum\HasApiTokens;

/**
 * @method static find(mixed $name)
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

//    public mixed $phanQuyen;
    protected $table = 'khach_hangs';

//    const ROLE_ADMIN = '2';
//    const ROLE_USER = '1';

    protected $fillable = [
        'name',
        'email',
        'password',
        'ten_khach_hang',
        'so_dien_thoai',
        'phan_quyen_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

}
