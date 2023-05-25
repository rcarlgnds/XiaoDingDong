<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Food extends Model
{
    public $incrementing = false;
    protected $table = 'foods';
    protected $primaryKey = 'FoodID';
    use HasFactory;

    public function foodType(){
        return $this->belongsTo(FoodType::class, 'FoodTypeID', 'FoodTypeID');
    }

    public function transactionDetail(){
        return $this->hasMany(TransactionDetail::class, 'FoodID', 'FoodID');
    }

    public function cartDetail(){
        return $this->hasMany(CartDetail::class, 'FoodID', 'FoodID');
    }
}
