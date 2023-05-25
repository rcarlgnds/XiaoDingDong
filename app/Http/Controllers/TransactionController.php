<?php

namespace App\Http\Controllers;

use App\Models\TransactionHeader;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function viewTransactionHistory()
    {

        $transactions = TransactionHeader::where('UserID', session('user')->getAttributes()['UserID'])->simplePaginate(5);
        return view('pages.profile.transactionhistory', ['transactions'=>$transactions]);
    }

}
