<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = "transaction_details";
    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('TransactionID', '=', $this->getAttribute('TransactionID'))
            ->where('FoodID', '=', $this->getAttribute('FoodID'));

        return $query;
    }
    use HasFactory;

    public function food(){
        return $this->belongsTo(Food::class, 'FoodID', 'FoodID');
    }

    public function transactionHeader(){
        return $this->belongsTo(TransactionHeader::class, 'TransactionID', 'TransactionID');
    }
}
