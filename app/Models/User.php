<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes;

    public function company(): BelongsTo {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    protected $fillable = [
        'name',
        'surname',
        'email',
        'phone',
        'password',
        'company_id',
    ];

  
    protected $hidden = [
        'password',
        'company_id',
        'remember_token',
    ];

  
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
