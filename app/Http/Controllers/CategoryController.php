<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $data = category::orderBy('created_at', 'desc')->get();
        return view('pages.category', compact('data'));
    }
}