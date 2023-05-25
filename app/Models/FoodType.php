<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodType extends Model
{
    public $incrementing = false;
    protected $table = 'food_types';
    protected $primaryKey = 'FoodTypeID';
    use HasFactory;

    public function food(){
        return $this->hasMany(Food::class, 'FoodTypeID', 'FoodTypeID');
    }
}
