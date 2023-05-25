<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartHeader extends Model
{
    public $incrementing = false;
    protected $table = "cart_headers";
    protected $primaryKey = "CartID";
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class, 'UserID', 'UserID');
    }

    public function cartDetail(){
        return $this->hasMany(CartDetail::class, 'CartID', 'CartID');
    }
}
