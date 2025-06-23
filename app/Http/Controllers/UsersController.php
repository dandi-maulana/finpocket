<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(){
        $data = User::orderBy('created_at', 'desc')->paginate(10);
        return view('pages.users', compact('data'));
    }

    public function store(){
        // Your store logic here
    }
}