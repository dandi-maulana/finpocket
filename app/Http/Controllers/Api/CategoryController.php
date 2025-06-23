<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Category = Category::all();
        return response()->json([
            'status' => true,
            'message' => 'Category list',
            'data' => $Category,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_category' =>  'required|string',
            'category_balance' =>  'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $Category = category::create($request->all());

        return response()->json([
            'status' => true,
            'message' => 'User created successfully',
            'data' => $Category
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Category = Category::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Category show',
            'data' => $Category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'name_category' =>  'string',
            'category_balance' =>  'integer',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $Category = Category::findOrFail($id);
        $Category->update($request->all());
        return response()->json([
            'status' => true,
            'message' =>  'Category updated successfully',
            'data' => $Category
        ], 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Category = Category::findOrFail($id);
        $Category->delete();
        return response()->json([
            'status' => true,
            'message' => 'Category deleted successfully',
        ],204);
    }
}
