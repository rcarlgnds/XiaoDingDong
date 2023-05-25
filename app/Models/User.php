<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    public $incrementing = false;
    protected  $primaryKey = 'UserID';
    protected $fillable = [
        'UserName',
        'UserEmail',
        'UserPassword',
        'remember_me'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'UserPassword',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getAuthPassword() {
        return $this->UserPassword;
    }

    public function transactionHeader(){
        return $this->hasMany(TransactionHeader::class, 'UserID', 'UserID');
    }

    public function cartHeader(){
        return $this->hasMany(CartHeader::class, 'UserID', 'UserID');
    }
}
