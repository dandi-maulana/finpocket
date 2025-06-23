<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $data = category::paginate(10);
        return view('pages.category', compact('data'));
    }
}