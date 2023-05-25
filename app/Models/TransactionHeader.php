<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionHeader extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = "transaction_headers";
    protected $primaryKey = "TransactionID";
    use HasFactory;

    public function transactionDetail(){
        return $this->hasMany(TransactionDetail::class, 'TransactionID', 'TransactionID');
    }

    public function user(){
        return $this->belongsTo(User::class, 'UserID', 'UserID');
    }
}
