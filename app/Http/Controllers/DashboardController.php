<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\category;
use App\Models\transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $data_user = User::count();
        $data_category = category::count();
        $data_transaction = transaction::count();
        $withdraw = transaction::where('withdraw', '0')-> count();
        $deposit = transaction::where('deposit', '0')-> count();

        $total_withdraw = transaction::sum('withdraw');
        $total_deposit = transaction::sum('deposit');

        return view('pages.dashboard', [
            'data_user' =>  $data_user,
            'data_category' => $data_category,
            'data_transaction' => $data_transaction,
            'withdraw' => $withdraw,
            'deposit' => $deposit,
            'total_withdraw' => $total_withdraw,
            'total_deposit' => $total_deposit,
        ]);
    }
}
