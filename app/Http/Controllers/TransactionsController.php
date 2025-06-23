<?php

namespace App\Http\Controllers;

use App\Models\transaction;
use Illuminate\Http\Request;

class TransactionsController extends Controller
{
    public function index() {
        $data = transaction::orderBy('created_at', 'desc')->paginate(15);
        return view('pages.transaction', compact('data'));
    }
}