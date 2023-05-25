<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    public $incrementing = false;
    protected $table = "cart_details";
    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('CartID', '=', $this->getAttribute('CartID'))
            ->where('FoodID', '=', $this->getAttribute('FoodID'));

        return $query;
    }
    use HasFactory;

    public function cartHeader(){
        return $this->belongsTo(CartHeader::class, 'CartID', 'CartID');
    }

    public function food(){
        return $this->belongsTo(Food::class, 'FoodID', 'FoodID');
    }
}

